<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Models\Order;
use App\Models\Product;
use App\Services\Cart;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function __construct(private Cart $cart)
    {
    }

    public function show(): View|RedirectResponse
    {
        $items = $this->cart->items();

        if ($items->isEmpty()) {
            return redirect()->route('bag');
        }

        return view('pages.checkout', [
            'items' => $items,
            'subtotal' => $this->cart->subtotal($items),
            'shipping' => $this->cart->shipping($items),
            'total' => $this->cart->total($items),
            'countries' => CheckoutRequest::COUNTRIES,
            'paymentMethods' => Order::PAYMENT_METHODS,
        ]);
    }

    public function store(CheckoutRequest $request): RedirectResponse
    {
        $raw = $this->cart->raw();

        if ($raw === []) {
            return redirect()->route('bag');
        }

        // Блокируем строки товаров, перепроверяем остатки и цены и списываем склад атомарно.
        $order = DB::transaction(function () use ($raw, $request) {
            $products = Product::active()->whereKey(array_keys($raw))->lockForUpdate()->get()->keyBy('id');

            $lines = [];
            $problems = [];
            foreach ($raw as $id => $qty) {
                $product = $products->get($id);
                if (! $product) {
                    $problems[] = 'One of the items is no longer available.';
                    continue;
                }
                if ($product->stock < $qty) {
                    $problems[] = "Only {$product->stock} × “{$product->name}” left in stock.";
                    continue;
                }
                $lines[] = [$product, $qty];
            }

            if ($problems !== []) {
                throw ValidationException::withMessages(['cart' => $problems]);
            }

            $subtotal = round(array_sum(array_map(fn ($l) => (float) $l[0]->price * $l[1], $lines)), 2);
            $shipping = Cart::SHIPPING;

            $order = Order::create($request->safe()->except('terms') + [
                'status' => 'pending',
                'subtotal' => $subtotal,
                'shipping' => $shipping,
                'total' => $subtotal + $shipping,
            ]);

            foreach ($lines as [$product, $qty]) {
                $order->items()->create([
                    'product_id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'qty' => $qty,
                    'total' => round((float) $product->price * $qty, 2),
                ]);
                $product->decrement('stock', $qty);
            }

            return $order;
        });

        $this->cart->clear();
        // показываем страницу заказа только тому, кто его оформил
        $request->session()->push('orders', $order->number);

        return redirect()->route('checkout.success', $order);
    }

    public function success(Order $order): View
    {
        abort_unless(in_array($order->number, session('orders', []), true), 404);

        return view('pages.order-success', ['order' => $order->load('items')]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\Cart;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function __construct(private Cart $cart)
    {
    }

    public function index(): View
    {
        $items = $this->cart->items();

        return view('pages.bag', [
            'items' => $items,
            'subtotal' => $this->cart->subtotal($items),
            'shipping' => $this->cart->shipping($items),
            'total' => $this->cart->total($items),
        ]);
    }

    public function add(Request $request, Product $product): RedirectResponse
    {
        abort_unless($product->is_active, 404);

        if ($product->stock < 1) {
            return back()->with('cart_error', 'Sorry, this item is out of stock.');
        }

        $qty = (int) ($request->validate(['qty' => 'nullable|integer|min:1|max:99'])['qty'] ?? 1);
        $this->cart->add($product, $qty);

        return back()->with('cart_status', "“{$product->name}” added to your bag.");
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $qty = (int) $request->validate(['qty' => 'required|integer|min:0|max:99'])['qty'];
        $this->cart->update($product, $qty);

        return redirect()->route('bag');
    }

    public function remove(Product $product): RedirectResponse
    {
        $this->cart->remove($product);

        return redirect()->route('bag');
    }
}

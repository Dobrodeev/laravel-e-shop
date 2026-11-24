<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Collection;

/**
 * Корзина в сессии: хранит [product_id => количество].
 * Цены всегда берутся из БД, в сессии их нет.
 */
class Cart
{
    private const KEY = 'cart';

    public const SHIPPING = 5;

    public function __construct(private Session $session)
    {
    }

    /** @return array<int, int> */
    public function raw(): array
    {
        return $this->session->get(self::KEY, []);
    }

    public function add(Product $product, int $qty = 1): void
    {
        $items = $this->raw();
        $this->put($product, ($items[$product->id] ?? 0) + $qty);
    }

    public function update(Product $product, int $qty): void
    {
        $qty < 1 ? $this->remove($product) : $this->put($product, $qty);
    }

    public function remove(Product $product): void
    {
        $items = $this->raw();
        unset($items[$product->id]);
        $this->session->put(self::KEY, $items);
    }

    public function clear(): void
    {
        $this->session->forget(self::KEY);
    }

    public function count(): int
    {
        return array_sum($this->raw());
    }

    public function isEmpty(): bool
    {
        return $this->raw() === [];
    }

    /**
     * Позиции корзины с актуальными товарами.
     * Товары, которые удалили или скрыли, из корзины выбрасываются.
     *
     * @return Collection<int, object{product: Product, qty: int, total: float}>
     */
    public function items(): Collection
    {
        $raw = $this->raw();
        if ($raw === []) {
            return collect();
        }

        $products = Product::active()->whereKey(array_keys($raw))->get()->keyBy('id');

        if ($products->count() !== count($raw)) {
            $this->session->put(self::KEY, array_intersect_key($raw, $products->all()));
        }

        return $products->map(fn (Product $p) => (object) [
            'product' => $p,
            'qty' => $raw[$p->id],
            'total' => round((float) $p->price * $raw[$p->id], 2),
        ])->values();
    }

    public function subtotal(?Collection $items = null): float
    {
        return round(($items ?? $this->items())->sum('total'), 2);
    }

    public function shipping(?Collection $items = null): float
    {
        return ($items ?? $this->items())->isEmpty() ? 0 : self::SHIPPING;
    }

    public function total(?Collection $items = null): float
    {
        $items ??= $this->items();

        return $this->subtotal($items) + $this->shipping($items);
    }

    /** Количество ограничено остатком на складе. */
    private function put(Product $product, int $qty): void
    {
        $qty = min($qty, $product->stock);
        $items = $this->raw();

        if ($qty < 1) {
            unset($items[$product->id]);
        } else {
            $items[$product->id] = $qty;
        }

        $this->session->put(self::KEY, $items);
    }
}

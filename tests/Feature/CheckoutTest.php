<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CheckoutTest extends TestCase
{
    use RefreshDatabase;

    private function validData(array $overrides = []): array
    {
        return $overrides + [
            'first_name' => 'Marina',
            'last_name' => 'Ivanova',
            'email' => 'marina@example.com',
            'phone' => '+7 900 000-00-00',
            'country' => 'Russia',
            'city' => 'Moscow',
            'address' => 'Tverskaya 1',
            'postcode' => '101000',
            'payment_method' => 'cod',
            'terms' => '1',
        ];
    }

    public function test_empty_cart_redirects_to_bag(): void
    {
        $this->get('/checkout')->assertRedirect(route('bag'));
        $this->post('/checkout', $this->validData())->assertRedirect(route('bag'));
        $this->assertDatabaseCount('orders', 0);
    }

    public function test_checkout_page_shows_cart(): void
    {
        $product = Product::factory()->create(['price' => 20, 'stock' => 5]);
        $this->post(route('bag.add', $product), ['qty' => 2]);

        $this->get('/checkout')->assertOk()
            ->assertSee($product->name)
            ->assertSee('x2')
            ->assertSeeInOrder(['Subtotal', '$40', 'Shipping', '$5', 'Total', '$45']);
    }

    public function test_order_is_placed(): void
    {
        $a = Product::factory()->create(['price' => 20, 'stock' => 5]);
        $b = Product::factory()->create(['price' => 12.5, 'stock' => 3]);
        $this->post(route('bag.add', $a), ['qty' => 2]);
        $this->post(route('bag.add', $b), ['qty' => 1]);

        $response = $this->post('/checkout', $this->validData());

        $order = Order::with('items')->sole();
        $response->assertRedirect(route('checkout.success', $order));

        $this->assertSame('pending', $order->status);
        $this->assertSame('52.50', $order->subtotal);
        $this->assertSame('57.50', $order->total);
        $this->assertCount(2, $order->items);
        $this->assertDatabaseHas('order_items', ['order_id' => $order->id, 'name' => $a->name, 'qty' => 2, 'total' => 40]);

        // склад списан, корзина очищена
        $this->assertSame(3, $a->fresh()->stock);
        $this->assertSame(2, $b->fresh()->stock);
        $this->assertSame([], session('cart', []));

        $this->get(route('checkout.success', $order))->assertOk()->assertSee($order->number);
    }

    public function test_validation_errors(): void
    {
        $product = Product::factory()->create(['stock' => 5]);
        $this->post(route('bag.add', $product));

        $this->post('/checkout', $this->validData([
            'email' => 'not-an-email',
            'country' => 'Atlantis',
            'payment_method' => 'bitcoin',
            'terms' => null,
            'first_name' => '',
        ]))->assertSessionHasErrors(['email', 'country', 'payment_method', 'terms', 'first_name']);

        $this->assertDatabaseCount('orders', 0);
        $this->assertSame(5, $product->fresh()->stock);
    }

    public function test_stock_changed_since_adding_to_cart(): void
    {
        $product = Product::factory()->create(['stock' => 5]);
        $this->post(route('bag.add', $product), ['qty' => 4]);

        $product->update(['stock' => 2]); // кто-то купил раньше

        $this->post('/checkout', $this->validData())->assertSessionHasErrors('cart');
        $this->assertDatabaseCount('orders', 0);
        $this->assertSame(2, $product->fresh()->stock);
    }

    public function test_price_is_taken_at_checkout_time(): void
    {
        $product = Product::factory()->create(['price' => 20, 'stock' => 5]);
        $this->post(route('bag.add', $product));
        $product->update(['price' => 25]);

        $this->post('/checkout', $this->validData());

        $this->assertSame('25.00', Order::sole()->items->first()->price);
    }

    public function test_foreign_order_page_is_hidden(): void
    {
        $order = Order::factory()->create();

        $this->get(route('checkout.success', $order))->assertNotFound();
    }
}

<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CartTest extends TestCase
{
    use RefreshDatabase;

    public function test_empty_bag_page(): void
    {
        $this->get('/bag')->assertOk()->assertSee('Your bag is empty');
    }

    public function test_add_product_and_see_totals(): void
    {
        $product = Product::factory()->create(['price' => 20, 'stock' => 10]);

        $this->from('/collection')->post(route('bag.add', $product), ['qty' => 2])
            ->assertRedirect('/collection')
            ->assertSessionHas('cart', [$product->id => 2]);

        $this->get('/bag')
            ->assertOk()
            ->assertSee($product->name)
            ->assertSeeInOrder(['Subtotal', '$40', 'Total', '$45']); // + $5 доставка
    }

    public function test_adding_twice_sums_quantity(): void
    {
        $product = Product::factory()->create(['stock' => 10]);

        $this->post(route('bag.add', $product));
        $this->post(route('bag.add', $product), ['qty' => 3])
            ->assertSessionHas('cart', [$product->id => 4]);
    }

    public function test_quantity_is_limited_by_stock(): void
    {
        $product = Product::factory()->create(['stock' => 3]);

        $this->post(route('bag.add', $product), ['qty' => 10])
            ->assertSessionHas('cart', [$product->id => 3]);
    }

    public function test_out_of_stock_product_is_not_added(): void
    {
        $product = Product::factory()->create(['stock' => 0]);

        $this->post(route('bag.add', $product))
            ->assertSessionHas('cart_error')
            ->assertSessionMissing('cart');
    }

    public function test_inactive_product_cannot_be_added(): void
    {
        $product = Product::factory()->create(['is_active' => false, 'stock' => 5]);

        $this->post(route('bag.add', $product))->assertNotFound();
    }

    public function test_update_and_remove(): void
    {
        $product = Product::factory()->create(['stock' => 10]);
        $this->post(route('bag.add', $product));

        $this->patch(route('bag.update', $product), ['qty' => 5])
            ->assertRedirect(route('bag'))
            ->assertSessionHas('cart', [$product->id => 5]);

        $this->patch(route('bag.update', $product), ['qty' => 0])
            ->assertSessionHas('cart', []);

        $this->post(route('bag.add', $product));
        $this->delete(route('bag.remove', $product))
            ->assertSessionHas('cart', []);
    }

    public function test_invalid_quantity_is_rejected(): void
    {
        $product = Product::factory()->create(['stock' => 10]);

        $this->post(route('bag.add', $product), ['qty' => -1])->assertSessionHasErrors('qty');
        $this->patch(route('bag.update', $product), ['qty' => 'abc'])->assertSessionHasErrors('qty');
    }

    public function test_deactivated_product_disappears_from_bag(): void
    {
        $product = Product::factory()->create(['stock' => 10]);
        $this->post(route('bag.add', $product));

        $product->update(['is_active' => false]);

        $this->get('/bag')->assertOk()->assertSee('Your bag is empty');
    }

    public function test_header_shows_item_count(): void
    {
        $product = Product::factory()->create(['stock' => 10]);
        $this->post(route('bag.add', $product), ['qty' => 3]);

        $this->get('/bag')->assertSee('<span class="header__bag-count">3</span>', false);
    }
}

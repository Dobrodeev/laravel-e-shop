<?php

namespace Tests\Feature;

use App\Filament\Resources\Categories\Pages\ListCategories;
use App\Filament\Resources\Orders\Pages\EditOrder;
use App\Filament\Resources\Orders\Pages\ListOrders;
use App\Filament\Resources\Products\Pages\CreateProduct;
use App\Filament\Resources\Products\Pages\EditProduct;
use App\Filament\Resources\Products\Pages\ListProducts;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    private function admin(): User
    {
        $user = User::factory()->create();
        $user->is_admin = true;
        $user->save();

        return $user;
    }

    public function test_guest_is_redirected_to_login(): void
    {
        $this->get('/admin')->assertRedirect('/admin/login');
    }

    public function test_regular_user_has_no_access(): void
    {
        $this->actingAs(User::factory()->create())->get('/admin')->assertForbidden();
    }

    public function test_admin_pages_render(): void
    {
        $product = Product::factory()->create();
        $order = Order::factory()->create();
        $this->actingAs($this->admin());

        foreach (['/admin', '/admin/products', '/admin/products/create', '/admin/categories', '/admin/orders',
            "/admin/products/{$product->slug}/edit", "/admin/orders/{$order->number}/edit"] as $url) {
            $this->get($url)->assertOk();
        }

        $this->get('/admin/orders/create')->assertNotFound();
    }

    public function test_tables_list_records(): void
    {
        $products = Product::factory()->count(3)->create();
        $categories = Category::factory()->count(2)->create();
        $orders = Order::factory()->count(2)->create();
        $this->actingAs($this->admin());

        Livewire::test(ListProducts::class)->assertCanSeeTableRecords($products);
        Livewire::test(ListCategories::class)->assertCanSeeTableRecords($categories);
        Livewire::test(ListOrders::class)->assertCanSeeTableRecords($orders);
    }

    public function test_create_product_with_categories(): void
    {
        $category = Category::factory()->create();
        $this->actingAs($this->admin());

        Livewire::test(CreateProduct::class)
            ->fillForm([
                'name' => 'Elsa ring',
                'slug' => 'elsa-ring',
                'price' => 30,
                'old_price' => 40,
                'stock' => 7,
                'categories' => [$category->id],
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $product = Product::where('slug', 'elsa-ring')->sole();
        $this->assertTrue($product->is_on_sale);
        $this->assertTrue($product->categories->contains($category));
    }

    public function test_product_validation(): void
    {
        $existing = Product::factory()->create(['slug' => 'taken']);
        $this->actingAs($this->admin());

        Livewire::test(CreateProduct::class)
            ->fillForm(['name' => 'X', 'slug' => 'taken', 'price' => 50, 'old_price' => 40, 'stock' => -1])
            ->call('create')
            ->assertHasFormErrors(['slug' => 'unique', 'old_price', 'stock']);
    }

    public function test_edit_product(): void
    {
        $product = Product::factory()->create(['price' => 10]);
        $this->actingAs($this->admin());

        Livewire::test(EditProduct::class, ['record' => $product->getRouteKey()])
            ->fillForm(['price' => 15])
            ->call('save')
            ->assertHasNoFormErrors();

        $this->assertSame('15.00', $product->fresh()->price);
    }

    public function test_cancelling_order_returns_stock(): void
    {
        $product = Product::factory()->create(['stock' => 3]);
        $order = Order::factory()->create();
        $order->items()->create(['product_id' => $product->id, 'name' => $product->name, 'price' => 10, 'qty' => 2, 'total' => 20]);
        $this->actingAs($this->admin());

        Livewire::test(EditOrder::class, ['record' => $order->getRouteKey()])
            ->fillForm(['status' => 'cancelled'])
            ->call('save')
            ->assertHasNoFormErrors();

        $this->assertSame('cancelled', $order->fresh()->status);
        $this->assertSame(5, $product->fresh()->stock);
    }

    public function test_cancelled_order_cannot_be_reopened(): void
    {
        $order = Order::factory()->create(['status' => 'cancelled']);

        $this->expectException(\DomainException::class);
        $order->update(['status' => 'pending']);
    }

    public function test_make_admin_command(): void
    {
        $this->artisan('shop:admin', ['email' => 'boss@example.com', '--name' => 'Boss', '--password' => 'secret123'])
            ->assertSuccessful();

        $this->assertTrue(User::where('email', 'boss@example.com')->sole()->is_admin);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function show(Product $product): View
    {
        abort_unless($product->is_active, 404);

        $product->load(['images', 'categories']);

        // «You may also like»: товары из тех же категорий
        $related = Product::active()
            ->whereKeyNot($product->id)
            ->whereHas('categories', fn (Builder $q) => $q->whereIn('categories.id', $product->categories->modelKeys()))
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('pages.product', compact('product', 'related'));
    }
}

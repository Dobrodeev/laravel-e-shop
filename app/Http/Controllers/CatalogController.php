<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CatalogController extends Controller
{
    /** Допустимые варианты сортировки: ключ => [подпись, колонка, направление]. */
    public const SORTS = [
        'new' => ['New', 'created_at', 'desc'],
        'price_asc' => ['Price: low to high', 'price', 'asc'],
        'price_desc' => ['Price: high to low', 'price', 'desc'],
    ];

    public const PER_PAGE = 12;

    /** Весь каталог. */
    public function index(Request $request): View
    {
        return $this->render($request, Product::active(), null);
    }

    /** Товары со скидкой. */
    public function sale(Request $request): View
    {
        return $this->render($request, Product::active()->onSale(), null, 'Sale');
    }

    /** Товары категории (включая товары её подкатегорий). */
    public function show(Request $request, Category $category): View
    {
        abort_unless($category->is_active, 404);

        $ids = $category->children()->active()->pluck('id')->push($category->id);
        $query = Product::active()->whereHas('categories', fn (Builder $q) => $q->whereIn('categories.id', $ids));

        return $this->render($request, $query, $category);
    }

    private function render(Request $request, Builder $query, ?Category $category, ?string $title = null): View
    {
        $sort = array_key_exists($request->query('sort'), self::SORTS) ? $request->query('sort') : 'new';
        [, $column, $direction] = self::SORTS[$sort];

        $products = $query->orderBy($column, $direction)->orderBy('id')
            ->paginate(self::PER_PAGE)
            ->withQueryString();

        return view('pages.collection', [
            'category' => $category,
            'title' => $title ?? $category?->name ?? 'Collection',
            'products' => $products,
            'sort' => $sort,
            'sorts' => self::SORTS,
        ]);
    }
}

<?php

namespace App\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

/**
 * Передаёт в шапку и каталог меню коллекций и категорий.
 */
class NavigationComposer
{
    public function compose(View $view): void
    {
        $view->with([
            'navCollections' => $this->childrenOf('collections'),
            'navCategories' => $this->childrenOf('jewelry'),
        ]);
    }

    private function childrenOf(string $slug)
    {
        return Category::active()
            ->whereHas('parent', fn ($q) => $q->where('slug', $slug))
            ->orderBy('sort_order')
            ->get();
    }
}

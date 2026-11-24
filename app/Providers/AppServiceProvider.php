<?php

namespace App\Providers;

use App\Services\Cart;
use App\View\Composers\NavigationComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['partials.header', 'pages.collection'], NavigationComposer::class);
        View::composer('partials.header', fn ($view) => $view->with('cartCount', app(Cart::class)->count()));
    }
}

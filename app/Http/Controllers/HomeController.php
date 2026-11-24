<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $saleProducts = Product::active()->onSale()->latest()->take(8)->get();

        return view('pages.index', compact('saleProducts'));
    }
}

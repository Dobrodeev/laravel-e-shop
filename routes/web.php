<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/collection', [CatalogController::class, 'index'])->name('collection');
Route::get('/collection/{category}', [CatalogController::class, 'show'])->name('category');
Route::get('/sale', [CatalogController::class, 'sale'])->name('sale');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product');

Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/bag', 'pages.bag')->name('bag');
Route::view('/checkout', 'pages.checkout')->name('checkout');
Route::view('/shipping', 'pages.shipping')->name('shipping');
Route::view('/returns', 'pages.returns')->name('returns');
Route::view('/terms', 'pages.terms')->name('terms');

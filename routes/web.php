<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CheckoutController;
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
Route::get('/bag', [CartController::class, 'index'])->name('bag');
Route::post('/bag/{product}', [CartController::class, 'add'])->name('bag.add');
Route::patch('/bag/{product}', [CartController::class, 'update'])->name('bag.update');
Route::delete('/bag/{product}', [CartController::class, 'remove'])->name('bag.remove');
Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/order/{order}', [CheckoutController::class, 'success'])->name('checkout.success');
Route::view('/shipping', 'pages.shipping')->name('shipping');
Route::view('/returns', 'pages.returns')->name('returns');
Route::view('/terms', 'pages.terms')->name('terms');

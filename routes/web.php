<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.index')->name('home');
Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/collection', 'pages.collection')->name('collection');
Route::view('/product', 'pages.product')->name('product');
Route::view('/bag', 'pages.bag')->name('bag');
Route::view('/checkout', 'pages.checkout')->name('checkout');
Route::view('/shipping', 'pages.shipping')->name('shipping');
Route::view('/returns', 'pages.returns')->name('returns');
Route::view('/terms', 'pages.terms')->name('terms');

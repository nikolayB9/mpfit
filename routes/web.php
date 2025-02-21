<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\MainController::class, 'index'])
    ->name('main');

Route::resource('products', \App\Http\Controllers\ProductController::class);

Route::resource('orders', \App\Http\Controllers\ProductController::class);

Route::resource('categories', \App\Http\Controllers\ProductController::class);

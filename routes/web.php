<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\MainController::class, 'index'])
    ->name('main');

Route::resource('products', \App\Http\Controllers\ProductController::class);

Route::resource('orders', \App\Http\Controllers\OrderController::class)
    ->except('show', 'destroy', 'update');

Route::put('orders/{order}/update-status', [\App\Http\Controllers\OrderController::class, 'updateStatus'])
    ->name('orders.update_status');


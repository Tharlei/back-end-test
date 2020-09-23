<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductSearchController;
use App\Http\Controllers\ProductShippingController;

Route::prefix('products')->group(function () {
    Route::get('/search', [ProductSearchController::class, 'show'])->name('product.search');
    Route::get('/{id}/shipping', [ProductShippingController::class, 'show'])->name('product.shipping');

    Route::get('/', [ProductController::class, 'index'])->name('product.index');
    Route::get('/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::post('/', [ProductController::class, 'store'])->name('product.store');
    Route::put('/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
});

<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProductController; 

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

Route::get('/product', [ProductController::class, "index"])-> name ('product.index');
Route::get('/product/create', [ProductController::class, "create"])-> name ('product.create');
Route::post('/product', [ProductController::class, "store"])-> name ('product.store');
Route::get('/product/{product}/edit', [ProductController::class, "edit"])-> name ('product.edit');
Route::put('/product/{product}/update', [ProductController::class, "update"])-> name ('product.update');
Route::delete('/product/{product}/destroy', [ProductController::class, "destroy"])-> name ('product.destroy');


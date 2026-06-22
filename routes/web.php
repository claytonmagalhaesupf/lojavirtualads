<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicProductController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicProductController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/products/new', [ProductsController::class, 'create']);
    Route::post('/products/new', [ProductsController::class, 'store']);

    Route::get('/products', [ProductsController::class, 'index']);

    Route::get('/products/update/{id}', [ProductsController::class, 'edit']);
    Route::post('/products/update/', [ProductsController::class, 'update']);

    Route::get('/products/delete/{id}', [ProductsController::class, 'destroy']);

    Route::get('/suppliers/new', [SupplierController::class, 'create']);
    Route::post('/suppliers/new', [SupplierController::class, 'store']);

    Route::get('/suppliers', [SupplierController::class, 'index']);

    Route::get('/suppliers/update/{id}', [SupplierController::class, 'edit']);
    Route::post('/suppliers/update/', [SupplierController::class, 'update']);

    Route::get('/suppliers/delete/{id}', [SupplierController::class, 'destroy']);
});

require __DIR__ . '/auth.php';

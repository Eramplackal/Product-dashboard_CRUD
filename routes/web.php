<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('master');
});
// Route::get('/table', function () {
//     return view('controllers.products.tables');
// });

Route::get('/table', [ProductController::class, 'index'])->name('products.index');

// Route to show the form for creating a new product
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

// Route to store a newly created product
Route::post('/table', [ProductController::class, 'store'])->name('products.store');

// Route to display a specific product
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// Route to show the form for editing a specific product
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');

// Route to update a specific product
Route::put('/products/{id}/edit', [ProductController::class, 'update'])->name('products.update');

// Route to delete a specific product
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy'); 

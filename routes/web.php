<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product', [ProductController::class, 'loadAllProduct']);

Route::get('/product/add', [ProductController::class, 'loadAddProduct']);

Route::post('product/add', [ProductController::class, 'AddProduct'])->name('AddProduct');

Route::get('product/delete/{id}',[ProductController::class, 'deleteProduct']);

Route::get('product/update/{id}',[ProductController::class, 'loadEditProduct']);

Route::post('product/update/',[ProductController::class, 'EditProduct'])->name('EditProduct');

Route::get('product/search', [ProductController::class, 'search'])->name('searchProduct');

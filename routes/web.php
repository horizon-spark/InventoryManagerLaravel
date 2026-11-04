<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/categories', [CategoryController::class, 'index']);
Route::get('/api/products', [ProductController::class, 'index']);
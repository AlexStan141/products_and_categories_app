<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('categories.index');
});

Route::resource('categories', CategoryController::class);
Route::resource('categories.products', ProductController::class);

<?php

use App\Http\Controllers\Customer\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\CategoryController;

Route::get('/product-details/{id}/{slug}',[ProductController::class ,'singleProductPage'])->name('singleProductPage');

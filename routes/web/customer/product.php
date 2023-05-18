<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Customer\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\CategoryController;

Route::get('/product-details/{id}/{slug}',[ProductController::class ,'singleProductPage'])->name('singleProductPage');

Route::middleware('auth')->group(function () {
    Route::get('/user/profile',[AuthController::class ,'userProfile'])->name('userProfile');
    Route::get('/user/logout',[AuthController::class ,'logout'])->name('logout');
    Route::get('/add-to-card',[ProductController::class ,'addToCardPage'])->name('addToCardPage');
    Route::post('/add-to-card',[ProductController::class ,'addToCard'])->name('addToCard');
    Route::post('/remove-card/{id}',[ProductController::class ,'removeCard'])->name('removeCard');
    Route::get('/checkout',[ProductController::class ,'checkoutPage'])->name('checkoutPage');
    Route::get('/shipping-info',[ProductController::class ,'shippingInfo'])->name('shippingInfo');
    Route::post('/add-info',[ProductController::class ,'addShippingInfo'])->name('addShippingInfo');
});

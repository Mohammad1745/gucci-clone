<?php

use App\Http\Controllers\Customer\AuthController;
use App\Http\Controllers\Customer\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/product-details/{id}/{slug}',[ProductController::class ,'singleProductPage'])->name('singleProductPage');

Route::middleware('user')->group(function () {
    Route::get('/user/profile',[AuthController::class ,'userProfile'])->name('userProfile');
    Route::get('/user/logout',[AuthController::class ,'logout'])->name('logout');
    Route::get('/add-to-card',[ProductController::class ,'addToCardPage'])->name('addToCardPage');
    Route::post('/add-to-card',[ProductController::class ,'addToCard'])->name('addToCard');
    Route::post('/remove-card/{id}',[ProductController::class ,'removeCard'])->name('removeCard');
    Route::get('/checkout',[ProductController::class ,'checkoutPage'])->name('checkoutPage');
    Route::get('/shipping-info',[ProductController::class ,'shippingInfo'])->name('shippingInfo');
    Route::post('/add-info',[ProductController::class ,'addShippingInfo'])->name('addShippingInfo');
    Route::post('/place-order',[ProductController::class ,'placeOrder'])->name('placeOrder');
    Route::get('/pending-order',[ProductController::class ,'pendingOrder'])->name('pendingOrder');
    Route::get('/history',[ProductController::class ,'history'])->name('history');
    Route::get('/user_dashboard',[ProductController::class ,'user_dashboard'])->name('user_dashboard');
    Route::get('/order/confirmation/{id}',[ProductController::class ,'orderConfirmation'])->name('orderConfirmation');
});
Route::post('/search/product',[ProductController::class ,'search'])->name('search');

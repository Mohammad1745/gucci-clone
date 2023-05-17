<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Customer\PageViewController;
use App\Http\Controllers\Customer\ProductController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::get('/user/profile',[AuthController::class ,'userProfile'])->name('userProfile');
    Route::get('/user/logout',[AuthController::class ,'logout'])->name('logout');
   Route::get('/add-to-card',[ProductController::class ,'addToCardPage'])->name('addToCardPage');
    Route::post('/add-to-card',[ProductController::class ,'addToCard'])->name('addToCard');
    Route::post('/remove-card/{id}',[ProductController::class ,'removeCard'])->name('removeCard');
    Route::get('/checkout',[PageViewController::class ,'checkoutPage'])->name('checkout');
});
Route::get('/user/login',[AuthController::class ,'login'])->name('login');
Route::post('/user/login', [AuthController::class, 'processLogin'])->name('processLogin');
Route::get('/user/registration',[AuthController::class ,'registration'])->name('registration');
Route::post('/user/registration',[AuthController::class ,'processRegistration'])->name('processRegistration');

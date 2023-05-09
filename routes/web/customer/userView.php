<?php

use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\PageViewController;
use Illuminate\Support\Facades\Route;

//all the view
Route::get('/',[HomeController::class ,'index'])->name('home');
Route::get('/category',[PageViewController::class ,'categoryPage'])->name('category');
Route::get('/singleProduct',[PageViewController::class ,'singleProductPage'])->name('singleProduct');
Route::get('/add-to-card',[PageViewController::class ,'addToCardPage'])->name('addToCard');
Route::get('/checkout',[PageViewController::class ,'checkoutPage'])->name('checkout');
Route::get('/new-release',[PageViewController::class ,'newReleasePage'])->name('newRelease');
Route::get('/user-profile',[PageViewController::class ,'userProfilePage'])->name('userProfile');
Route::get('/best-sells',[PageViewController::class ,'bestSellsPage'])->name('bestSells');
Route::get('/customer-service',[PageViewController::class ,'customerServicePage'])->name('customerService');
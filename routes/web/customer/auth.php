<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Customer\PageViewController;
use App\Http\Controllers\Customer\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/user/login',[AuthController::class ,'login'])->name('login');
Route::post('/user/login', [AuthController::class, 'processLogin'])->name('processLogin');
Route::get('/user/registration',[AuthController::class ,'registration'])->name('registration');
Route::post('/user/registration',[AuthController::class ,'processRegistration'])->name('processRegistration');

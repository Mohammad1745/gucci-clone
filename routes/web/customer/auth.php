<?php

use App\Http\Controllers\Customer\AuthController;
use Illuminate\Support\Facades\Route;


Route::get('/user/login',[AuthController::class ,'login'])->name('login');
Route::post('/user/login', [AuthController::class, 'processLogin'])->name('processLogin');
Route::get('/user/registration',[AuthController::class ,'registration'])->name('registration');
Route::post('/user/registration',[AuthController::class ,'processRegistration'])->name('processRegistration');
Route::post('/user/verification',[AuthController::class ,'processVerification'])->name('verification');

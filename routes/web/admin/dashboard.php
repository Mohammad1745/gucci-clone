<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard',[DashboardController::class,'index']);
Route::get('/dashboard/addCategory',[DashboardController::class,'showAddCategory'])->name('showAddCategory');
Route::get('/dashboard/allCategory',[DashboardController::class,'allCategory'])->name('allCategory');

Route::get('/dashboard/addSubCategory',[DashboardController::class,'addSubCategory'])->name('addSubCategory');
Route::get('/dashboard/allSubCategory',[DashboardController::class,'allSubCategory'])->name('allSubCategory');

// Add product

Route::get('/dashboard/addProduct',[DashboardController::class,'addProduct'])->name('addProduct');
Route::get('/dashboard/currentOrder',[DashboardController::class,'currentOrder'])->name('currentOrder');
Route::get('/dashboard/completedOrder',[DashboardController::class,'completedOrder'])->name('completedOrder');


// All product

Route::get('/dashboard/allProduct',[DashboardController::class,'allProduct'])->name('allProduct');

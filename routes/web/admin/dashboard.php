<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard',[DashboardController::class,'index']);
Route::get('/dashboard/addCategory',[DashboardController::class,'showAddCategory'])->name('showAddCategory');
Route::get('/dashboard/allCategory',[CategoryController::class,'getAllCategory'])->name('getAllCategory');
Route::post('/dashboard/addCategory',[CategoryController::class,'storeCategory'])->name('storeCategory');
Route::get('/dashboard/editCategory/{id}',[CategoryController::class,'editCategory'])->name('editCategory');
Route::post('/dashboard/editCategory',[CategoryController::class,'updateCategory'])->name('updateCategory');
Route::post('/dashboard/deleteCategory/{id}',[CategoryController::class,'deleteCategory'])->name('deleteCategory');

Route::get('/dashboard/addSubCategory',[DashboardController::class,'addSubCategory'])->name('addSubCategory');
Route::get('/dashboard/allSubCategory',[DashboardController::class,'allSubCategory'])->name('allSubCategory');
Route::get('/dashboard/currentOrder',[DashboardController::class,'currentOrder'])->name('currentOrder');
Route::get('/dashboard/completedOrder',[DashboardController::class,'completedOrder'])->name('completedOrder');

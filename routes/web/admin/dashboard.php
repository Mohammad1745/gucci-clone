<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard',[DashboardController::class,'index']);
Route::get('/dashboard/addCategory',[DashboardController::class,'showAddCategory'])->name('showAddCategory');
Route::get('/dashboard/allCategory',[CategoryController::class,'getAllCategory'])->name('getAllCategory');
Route::post('/dashboard/addCategory',[CategoryController::class,'storeCategory'])->name('storeCategory');
Route::get('/dashboard/editCategory/{id}',[CategoryController::class,'editCategory'])->name('editCategory');
Route::post('/dashboard/editCategory',[CategoryController::class,'updateCategory'])->name('updateCategory');
Route::post('/dashboard/deleteCategory/{id}',[CategoryController::class,'deleteCategory'])->name('deleteCategory');

Route::get('/dashboard/addSubCategory',[SubCategoryController::class,'addSubCategory'])->name('addSubCategory');
Route::post('/dashboard/addSubCategory',[SubCategoryController::class,'storeSubCategory'])->name('storeSubCategory');
Route::get('/dashboard/allSubCategory',[SubCategoryController::class,'allSubCategory'])->name('allSubCategory');
Route::get('/dashboard/editSubCategory/{id}',[subCategoryController::class,'editSubCategory'])->name('editSubCategory');
Route::post('/dashboard/updateSubCategory',[subCategoryController::class,'updateSubCategory'])->name('updateSubCategory');
Route::post('/dashboard/deleteSubCategory/{id}',[subCategoryController::class,'deleteSubCategory'])->name('deleteSubCategory');

// Add product

Route::get('/dashboard/addProduct',[ProductController::class,'addProduct'])->name('addProduct');
Route::get('/dashboard/addProduct/selectCategory',[ProductController::class,'selectCategory'])->name('selectCategory');
Route::get('/dashboard/currentOrder',[DashboardController::class,'currentOrder'])->name('currentOrder');
Route::get('/dashboard/completedOrder',[DashboardController::class,'completedOrder'])->name('completedOrder');


// All product

Route::get('/dashboard/allProduct',[DashboardController::class,'allProduct'])->name('allProduct');

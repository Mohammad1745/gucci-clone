<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubcategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard',[DashboardController::class,'index']);
Route::get('/dashboard/addCategory',[DashboardController::class,'showAddCategory'])->name('showAddCategory');
Route::get('/dashboard/allCategory',[CategoryController::class,'getAllCategory'])->name('getAllCategory');
Route::post('/dashboard/addCategory',[CategoryController::class,'storeCategory'])->name('storeCategory');
Route::get('/dashboard/editCategory/{id}',[CategoryController::class,'editCategory'])->name('editCategory');
Route::post('/dashboard/editCategory',[CategoryController::class,'updateCategory'])->name('updateCategory');
Route::post('/dashboard/deleteCategory/{id}',[CategoryController::class,'deleteCategory'])->name('deleteCategory');

Route::get('/dashboard/addSubcategory',[SubcategoryController::class,'addSubcategory'])->name('addSubcategory');
Route::post('/dashboard/addSubcategory',[SubcategoryController::class,'storeSubcategory'])->name('storeSubcategory');
Route::get('/dashboard/allSubcategory',[SubcategoryController::class,'allSubcategory'])->name('allSubcategory');
Route::get('/dashboard/editSubcategory/{id}',[subcategoryController::class,'editSubcategory'])->name('editSubcategory');
Route::post('/dashboard/updateSubcategory',[subcategoryController::class,'updateSubcategory'])->name('updateSubcategory');
Route::post('/dashboard/deleteSubcategory/{id}',[subcategoryController::class,'deleteSubcategory'])->name('deleteSubcategory');

// Add product

Route::get('/dashboard/addProduct',[ProductController::class,'addProduct'])->name('addProduct');
Route::post('/dashboard/addProduct/',[ProductController::class,'storeProduct'])->name('storeProduct');
Route::get('/dashboard/allProduct',[ProductController::class,'allProduct'])->name('allProduct');

Route::get('/dashboard/currentOrder',[DashboardController::class,'currentOrder'])->name('currentOrder');
Route::get('/dashboard/completedOrder',[DashboardController::class,'completedOrder'])->name('completedOrder');


// All product



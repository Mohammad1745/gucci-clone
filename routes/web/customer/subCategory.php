<?php

use App\Http\Controllers\Customer\subCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\CategoryController;

Route::get('/subcategory/{id}/{subCategory}',[subCategoryController::class ,'subCategoryPage'])->name('subCategoryPage');

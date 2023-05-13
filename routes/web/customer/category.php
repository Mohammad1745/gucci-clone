<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\CategoryController;

Route::get('/category/{id}/{slug}',[CategoryController::class ,'categoryPage'])->name('categoryPage');

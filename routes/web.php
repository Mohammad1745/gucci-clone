<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//admin routes
require base_path('routes/web/admin/auth.php');
require base_path('routes/web/admin/dashboard.php');
require base_path('routes/web/admin/category.php');

//customer routes
require base_path('routes/web/customer/auth.php');
require base_path('routes/web/customer/category.php');
require base_path('routes/web/customer/subCategory.php');
require base_path('routes/web/customer/userView.php');

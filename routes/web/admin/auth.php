<?php


use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->as('admin.')->group( function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
});

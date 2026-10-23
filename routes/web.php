<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
| Guests only (logged-in users get redirected to the dashboard)
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1')->name('login.attempt');
});

/*
| Any authenticated user
*/
Route::middleware('auth')->group(function () {
    Route::get('/', fn () => redirect()->route('dashboard'));
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Admin + Product Manager: list, view, create
    Route::middleware('role:admin,product_manager')->group(function () {
        Route::resource('products', ProductController::class)->only(['index', 'create', 'store', 'show']);
    });

    // Admin only: edit, update, delete + user management
    Route::middleware('role:admin')->group(function () {
        Route::resource('products', ProductController::class)->only(['edit', 'update', 'destroy']);
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
    });
});

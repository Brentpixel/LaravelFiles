<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ── Public pages ───────────────────────────────────────────────────────────
Route::get('/',      [TaskController::class, 'welcome'])->name('home');
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');
Route::get('/about', [PageController::class, 'about'])->name('about');

// ── Protected pages ────────────────────────────────────────────────────────
Route::middleware('auth')->group(function () {

    // TSA3 profile page
    Route::get('/profile', [TaskController::class, 'profile'])->name('profile');

    // TFA8 Resource controllers (customers + users)
    Route::resource('customers', CustomerController::class);
    Route::resource('users', UserController::class);

});

// ── Breeze auth routes (login, register, logout, password reset, etc.) ─────
require __DIR__.'/auth.php';

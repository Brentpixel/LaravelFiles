<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ── Public pages ───────────────────────────────────────────────────────────
Route::get('/',      [TaskController::class, 'welcome'])->name('home');
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');
Route::get('/about', [PageController::class, 'about'])->name('about');

// ── Auth routes (Breeze-compatible, manual since Breeze not yet installed) ─
Route::get('/login',  [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.post');
Route::post('/logout',[AuthenticatedSessionController::class, 'destroy'])->name('logout');

// ── Protected pages ────────────────────────────────────────────────────────
Route::middleware('auth')->group(function () {

    // TSA3 profile page
    Route::get('/profile', [TaskController::class, 'profile'])->name('profile');

    // TFA8 Resource controllers (customers + users)
    Route::resource('customers', CustomerController::class);
    Route::resource('users', UserController::class);

});

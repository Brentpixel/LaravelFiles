<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\PageController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;

// ── TSA3: Tasks for Today Management System ────────────────────────────────
Route::get('/',        [TaskController::class, 'welcome'])->name('home');
Route::get('/tasks',   [TaskController::class, 'index'])->name('tasks');
Route::get('/profile', [TaskController::class, 'profile'])->name('profile');

// ── TSA3: Static About page (identifies developer) ─────────────────────────
Route::get('/about',   [PageController::class, 'about'])->name('about');

// ── TSA1 / TSA2: Existing pages (preserved) ───────────────────────────────
Route::get('/customers', [CustomerController::class, 'index'])->name('customers');
Route::get('/users',     [UserController::class,     'index'])->name('users');

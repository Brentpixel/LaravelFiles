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

// ── TFA7: Customers CRUD ──────────────────────────────────────────────────
Route::get('/customers',              [CustomerController::class, 'index'])->name('customers');
Route::get('/customers/create',       [CustomerController::class, 'create'])->name('customers.create');
Route::post('/customers',             [CustomerController::class, 'store'])->name('customers.store');
Route::get('/customers/{customer}/edit',  [CustomerController::class, 'edit'])->name('customers.edit');
Route::put('/customers/{customer}',       [CustomerController::class, 'update'])->name('customers.update');

// ── TFA7: Users CRUD + Avatar Upload ─────────────────────────────────────
Route::get('/users',              [UserController::class, 'index'])->name('users');
Route::get('/users/create',       [UserController::class, 'create'])->name('users.create');
Route::post('/users',             [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit',  [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}',       [UserController::class, 'update'])->name('users.update');

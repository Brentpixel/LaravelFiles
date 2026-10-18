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

Route::get('/',         [PageController::class,     'home'])->name('home');
Route::get('/about',    [PageController::class,     'about'])->name('about');
Route::get('/customers',[CustomerController::class, 'index'])->name('customers');
Route::get('/users',    [UserController::class,     'index'])->name('users');

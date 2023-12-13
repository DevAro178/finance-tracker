<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FinanceTrackerController;

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

// Route for homepage via controller FinanceTrackerController index function
Route::get('/', [FinanceTrackerController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/login', [authController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [authController::class, 'authenticate'])->name('login.authenticate')->middleware('guest');
Route::get('/register', [authController::class, 'register'])->name('register')->middleware('guest');
Route::post('/register', [authController::class, 'store'])->name('register.store')->middleware('guest');
Route::get('/logout', [authController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/profile', [FinanceTrackerController::class, 'profile'])->name('profile')->middleware('auth');

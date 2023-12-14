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

// Authentication Routes
Route::get('/login', [authController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [authController::class, 'authenticate'])->name('login.authenticate')->middleware('guest');
Route::get('/register', [authController::class, 'register'])->name('register')->middleware('guest');
Route::post('/register', [authController::class, 'store'])->name('register.store')->middleware('guest');
Route::get('/logout', [authController::class, 'logout'])->name('logout')->middleware('auth');
// Application Routes
Route::get('/', [FinanceTrackerController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/profile', [FinanceTrackerController::class, 'profile'])->name('profile')->middleware('auth');
// Settings Route for Account and Categories listing
Route::get('/settings', [FinanceTrackerController::class, 'settings'])->name('settings')->middleware('auth');
// Account Routes
Route::get('/add/account', [FinanceTrackerController::class, 'addAccount'])->name('add.account')->middleware('auth');
Route::post('/add/account', [FinanceTrackerController::class, 'storeAccount'])->name('add.account.store')->middleware('auth');
Route::get('/edit/account/{id}', [FinanceTrackerController::class, 'editAccount'])->name('edit.account')->middleware('auth');
Route::put('/edit/account/{id}', [FinanceTrackerController::class, 'updateAccount'])->name('edit.account.update')->middleware('auth');
Route::delete('/delete/account/{id}', [FinanceTrackerController::class, 'deleteAccount'])->name('delete.account')->middleware('auth');

// Category Routes
Route::get('/add/category', [FinanceTrackerController::class, 'addCategory'])->name('add.category')->middleware('auth');
Route::post('/add/category', [FinanceTrackerController::class, 'storeCategory'])->name('add.category.store')->middleware('auth');
Route::get('/edit/category/{id}', [FinanceTrackerController::class, 'editCategory'])->name('edit.category')->middleware('auth');
Route::put('/edit/category/{id}', [FinanceTrackerController::class, 'updateCategory'])->name('edit.category.update')->middleware('auth');
Route::delete('/delete/category/{id}', [FinanceTrackerController::class, 'deleteCategory'])->name('delete.category')->middleware('auth');

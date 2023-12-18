<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\authController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FinanceTrackerController;
use App\Http\Controllers\TransactionController;

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

// index: Used for displaying a listing of the resource.
// create: Used for showing a form to create a new resource.
// store: Used for storing a newly created resource in storage.
// show: Used for displaying a specific resource.
// edit: Used for showing a form to edit an existing resource.
// update: Used for updating an existing resource in storage.
// destroy: Used for removing a specific resource from storage.


// Guest Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [authController::class, 'login'])->name('login');
    Route::post('/login', [authController::class, 'authenticate'])->name('login.authenticate');
    Route::get('/register', [authController::class, 'register'])->name('register');
    Route::post('/register', [authController::class, 'store'])->name('register.store');
});

// Authentication Routes
Route::middleware('auth')->group(function () {
    Route::get('/logout', [authController::class, 'logout'])->name('logout');
    Route::get('/', [FinanceTrackerController::class, 'index'])->name('dashboard');
    Route::get('/profile', [FinanceTrackerController::class, 'profile'])->name('profile');
    Route::get('/settings', [FinanceTrackerController::class, 'settings'])->name('settings');
    Route::get('/billing', [FinanceTrackerController::class, 'billing'])->name('billing');

    // Account Routes
    Route::prefix('account')->group(function () {
        Route::get('/add', [AccountController::class, 'index'])->name('add.account');
        Route::post('/add', [AccountController::class, 'store'])->name('add.account.store');
        Route::get('/edit/{id}', [AccountController::class, 'edit'])->name('edit.account');
        Route::put('/edit/{id}', [AccountController::class, 'update'])->name('edit.account.update');
        Route::delete('/delete/{id}', [AccountController::class, 'destroy'])->name('delete.account');
    });

    // Category Routes
    Route::prefix('category')->group(function () {
        Route::get('/add', [CategoryController::class, 'index'])->name('add.category');
        Route::post('/add', [CategoryController::class, 'store'])->name('add.category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit.category');
        Route::put('/edit/{id}', [CategoryController::class, 'update'])->name('edit.category.update');
        Route::delete('/delete/{id}', [CategoryController::class, 'destroy'])->name('delete.category');
    });

    // Transaction Routes
    Route::prefix('transaction')->group(function () {
        Route::get('/', [TransactionController::class, 'show'])->name('transaction');
        Route::get('/add', [TransactionController::class, 'index'])->name('add.transaction');
        Route::post('/add', [TransactionController::class, 'store'])->name('add.transaction.store');
        // Route::get('/edit/{id}', [FinanceTrackerController::class, 'edit'])->name('edit.transaction');
        // Route::put('/edit/{id}', [FinanceTrackerController::class, 'update'])->name('edit.transaction.update');
        // Route::delete('/delete/{id}', [FinanceTrackerController::class, 'destroy'])->name('delete.transaction');
    });
});

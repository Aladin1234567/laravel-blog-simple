<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/artikel/{slug}', [ArticleController::class, 'show'])->name('article.show');

Route::get('/kategori/{slug}', [ArticleController::class, 'byCategory'])->name('category.show');

// Auth Routes
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    Route::resource('articles', ArticleController::class)->except('show');
    Route::resource('categories', CategoryController::class);
});

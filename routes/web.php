<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

// Jika buka halaman utama langsung diarahkan ke login
Route::get('/', fn () => redirect('/login'));

// Halaman login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login.process');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard JWT
Route::get('/dashboard-jwt', function () {
    return view('dashboard_jwt');
})->name('dashboard.jwt');

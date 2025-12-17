<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Home page (optional)
Route::get('/', function () {
    return view('welcome');
});

// Signup
Route::get('/signup', fn() => view('signup'))->name('signup.form');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');

// Login
Route::get('/login', fn() => view('login'))->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected dashboard route
Route::get('/dashboard', fn() => view('dashboard'))->middleware('auth');

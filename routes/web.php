<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('welcome');
});

// Register
Route::view('register', 'auth.register')->name('register');
Route::post('register', RegisterController::class)->name('register.store');

// Login
Route::get('login', function () {
    return view('auth.login');
})->name('login');

Route::post('login', LoginController::class)
    ->middleware('throttle:5,1')
    ->name('login.attempt');

// Logout
Route::post('logout', function () {
    Auth::guard('web')->logout();

    Session::invalidate();
    Session::regenerateToken();

    return redirect('/');
})->middleware('auth')
->name('logout');


Route::view('dashboard', 'dashboard')
    ->middleware('auth')
    ->name('dashboard');


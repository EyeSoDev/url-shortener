<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\UrlController;
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

Route::middleware(['auth'])->group(function () {
    Route::post('logout', function () {
        Auth::guard('web')->logout();

        Session::invalidate();
        Session::regenerateToken();

        return redirect('/');
    })->name('logout');

    Route::view('dashboard', 'dashboard')->name('dashboard');

    // URL
    Route::prefix('urls')->name('urls.')->group(function () {
        Route::get('/', [UrlController::class, 'index'])->name('index');
        Route::get('/create', [UrlController::class, 'create'])->name('create');
        Route::post('/', [UrlController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [UrlController::class, 'edit'])->name('edit');
        Route::post('/update', [UrlController::class, 'update'])->name('update');
        Route::delete('/{id}', [UrlController::class, 'destroy'])->name('destroy');
        Route::get('/view/{id}', [UrlController::class, 'show'])->name('show');
    });

    
});

Route::get('/{slug}', [PublicController::class, 'redirect'])->name('redirect');
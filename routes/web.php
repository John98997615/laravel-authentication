<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\GuestMiddleware;
use Illuminate\Support\Facades\Route;


Route::middleware([GuestMiddleware::class])->group(function () {
    Route::get('/', [MainController::class, 'home'])->name('home');
    Route::get('/login', [MainController::class, 'login'])->name('login');
    Route::get('/registration', [MainController::class, 'registration'])->name('registration');

    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/registration', [AuthController::class, 'registration'])->name('registration');
});

Route::get('/profile', [MainController::class, 'profile'])->name('profile')->middleware("auth");
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

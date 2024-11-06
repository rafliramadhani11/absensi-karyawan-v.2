<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'auth'])->name('auth');
});

Route::middleware(['auth'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('app', [UserController::class, 'index'])->name('app');
    Route::get('profile/{user}', [UserController::class, 'profile'])->name('profile');
    Route::patch('profile/update/{user}', [UserController::class, 'profileUpdate'])->name('user.profile.update');
});

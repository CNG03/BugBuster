<?php

use App\Http\Controllers\auth\AccessController;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Route;


Route::middleware([
    'auth:api'
])
    ->name('users.')
    ->namespace('\App\Http\Controllers')
    ->group(function () {
        // Route::post('logout', [AuthController::class, 'logout'])->name('logout');
        // Route::post('refresh', [AuthController::class, 'refresh'])->name('refresh');
        Route::get('/user/profile', [AccessController::class, 'profile'])->name('profile');
        Route::get('/users', [AccessController::class, 'index'])->name('index');
    });

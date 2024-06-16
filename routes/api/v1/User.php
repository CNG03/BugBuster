<?php

use App\Http\Controllers\auth\AccessController;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Route;


Route::middleware([
    'auth:api'
])
    ->name('users.')
    ->namespace('\App\Http\Controllers')
    ->group(function () {
        Route::get('/user/role/{projectId}', [UserController::class, 'getUserRole']);
        Route::get('/user/profile', [UserController::class, 'profile'])->name('profile');
        Route::get('/users', [UserController::class, 'index'])->name('index');
    });

<?php

use App\Http\Controllers\APIControllers\UserController;
use App\Http\Middleware\CustomAuthenticate;
use Illuminate\Support\Facades\Route;

Route::middleware([
    CustomAuthenticate::class
])
    ->name('users.')
    ->namespace('\App\Http\Controllers')
    ->group(function () {
        Route::get('/users/not-in/{project}', [UserController::class, 'getUserForSearch'])->name('getUserForSearch');
        Route::get('/user/role/{projectId}', [UserController::class, 'getUserRole']);
        Route::get('/user/profile', [UserController::class, 'profile'])->name('profile');
        Route::get('/users', [UserController::class, 'index'])->name('index');
    });

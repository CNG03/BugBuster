<?php

// use App\Http\Controllers\AuthController;
// use App\Http\Controllers\UserController;
// use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
// use Illuminate\Support\Facades\Route;


// Route::middleware([])
//     ->name('users.')
//     ->prefix('auth')
//     ->namespace('\App\Http\Controller')
//     ->group(function () {
//         Route::post('login', [AuthController::class, 'login'])->name('login');
//         Route::post('register', [AuthController::class, 'register'])->name('register');
//     });


// Route::middleware(['api'])
//     ->name('users.')
//     ->prefix('auth')
//     ->namespace('\App\Http\Controllers')
//     ->group(function () {
//         Route::post('logout', [AuthController::class, 'logout'])->name('logout');
//         Route::post('refresh', [AuthController::class, 'refresh'])->name('refresh');
//         Route::get('profile', [AuthController::class, 'profile'])->name('profile');
//     });
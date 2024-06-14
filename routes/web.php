<?php

use App\Http\Controllers\auth\AccessController;
use App\Http\Controllers\auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleAuthController;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\auth\ForgotPasswordController;
use App\Http\Middleware\AddAuthorizationHeader;
use App\Http\Middleware\JwtAuthMiddleware;
use Illuminate\Support\Facades\Log;

/*
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// Show form sign-in and sign-up
Route::get('access', [AccessController::class, 'showForm'])->name('access');
Route::get('login', [AccessController::class, 'showForm'])->name('login');

// Register Handle
Route::post('register', [AccessController::class, 'register'])->name('register.post');

// Login Handle
Route::post('login', [AccessController::class, 'login'])->name('login.post');

// Logout Handle
Route::post('logout', [AccessController::class, 'logout'])->middleware(['auth'])->name('logout');

// Continue with google handle
Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/callback', [GoogleAuthController::class, 'callbackGoogle']);

// Reset Password Handle
Route::get('password/forgot', [ForgotPasswordController::class, 'showForgotForm'])->name('password.forgot');
Route::post('password/forgot', [ForgotPasswordController::class, 'sendResetCode'])->name('password.sendResetCode');
Route::get('password/reset', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');

// Ví dụ về nhóm route theo middleware
Route::middleware([
    AddAuthorizationHeader::class,
    JwtAuthMiddleware::class
])->group(function () {
    Route::get('/token', function () {
        return view('layouts.token');
    });

    Route::get('/app', function () {
        return view('layouts.app');
    });

    Route::post('logout', [AccessController::class, 'logout'])->name('logout');
});

// Xác thực email của người dùng 
Route::get('verify-email/{token}', [AccessController::class, 'verifyEmail'])->name('verify.email');

Route::get('/test-log', function () {
    Log::info('Test log message');
    return 'Check the log file.';
});
<?php

use App\Http\Controllers\APIControllers\TestTypeController;
use App\Http\Middleware\CustomAuthenticate;
use Illuminate\Support\Facades\Route;

Route::middleware([
    CustomAuthenticate::class
])
    ->name('testtypes.')
    ->namespace('\App\Http\Controllers')
    ->group(function () {
        Route::get('/testtypes', [TestTypeController::class, 'index'])->name('index');
        Route::get('/testtypes/{testType}', [TestTypeController::class, 'show'])->name('show');
        Route::post('/testtypes', [TestTypeController::class, 'store'])->name('store');
        Route::patch('/testtypes/{testType}', [TestTypeController::class, 'update'])->name('update');
        Route::delete('/testtypes/{testType}', [TestTypeController::class, 'destroy'])->name('delete');
    });

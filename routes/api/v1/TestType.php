<?php

use App\Http\Controllers\APIControllers\TestTypeController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:api'
])
    ->name('testtypes.')
    ->namespace('\App\Http\Controllers')
    ->group(function () {
        Route::get('/testtypes', [TestTypeController::class, 'index'])->name('index');
        Route::get('/testtypes/{testType}', [TestTypeController::class, 'show'])->name('show');
        Route::post('/testtypes', [TestTypeController::class, 'store'])->name('store');
        Route::patch('/testtypes/{tesType}', [TestTypeController::class, 'update'])->name('update');
        Route::delete('/testtypes/{tesType}', [TestTypeController::class, 'destroy'])->name('delete');
    });

<?php

use App\Http\Controllers\TestTypeController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:api'
])
    ->name('testtypes.')
    ->namespace('\App\Http\Controllers')
    ->group(function () {
        Route::get('/testtypes', [TestTypeController::class, 'index'])->name('index');
        Route::get('/testtypes/{test_type}', [TestTypeController::class, 'show'])->name('show');
        Route::post('/testtypes', [TestTypeController::class, 'store'])->name('store');
        Route::patch('/testtypes/{test_type}', [TestTypeController::class, 'update'])->name('update');
        Route::delete('/testtypes/{test_type}', [TestTypeController::class, 'destroy'])->name('delete');
    });
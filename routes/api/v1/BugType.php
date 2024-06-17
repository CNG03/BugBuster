<?php

use App\Http\Controllers\APIControllers\BugTypeController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'api',
])
    ->name('testtypes.')
    ->namespace('\App\Http\Controllers')
    ->group(function () {
        Route::get('/bugtypes', [BugTypeController::class, 'index'])->name('index');
        Route::get('/bugtypes/{bugType}', [BugTypeController::class, 'show'])->name('show');
        Route::post('/bugtypes', [BugTypeController::class, 'store'])->name('store');
        Route::patch('/bugtypes/{bugType}', [BugTypeController::class, 'update'])->name('update');
        Route::delete('/bugtypes/{bugType}', [BugTypeController::class, 'destroy'])->name('delete');
    });

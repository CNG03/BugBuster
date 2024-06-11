<?php

use App\Http\Controllers\BugTypeController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'api',
])
    ->name('testtypes.')
    ->namespace('\App\Http\Controllers')
    ->group(function () {
        Route::get('/bugtypes', [BugTypeController::class, 'index'])->name('index');
        Route::get('/bugtypes/{test_type}', [BugTypeController::class, 'show'])->name('show');
        Route::post('/bugtypes', [BugTypeController::class, 'store'])->name('store');
        Route::patch('/bugtypes/{test_type}', [BugTypeController::class, 'update'])->name('update');
        Route::delete('/bugtypes/{test_type}', [BugTypeController::class, 'delete'])->name('delete');
    });

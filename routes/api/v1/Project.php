<?php

use App\Http\Controllers\APIControllers\ProjectController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\CustomAuthenticate;
use Illuminate\Support\Facades\Route;

Route::middleware([
    CustomAuthenticate::class
])
    ->name('project.')
    ->namespace('\App\Http\Controllers')
    ->group(function () {
        Route::get('/projects', [ProjectController::class, 'index'])->name('index');
        Route::get('/projects/{project}',  [ProjectController::class, 'show'])->name('show');
        Route::post('/projects',  [ProjectController::class, 'store'])->name('store');
        Route::patch('/projects/{project}',  [ProjectController::class, 'update'])->name('update');
        Route::delete('/projects/{project}',  [ProjectController::class, 'destroy'])->name('delete');
    });

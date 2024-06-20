<?php

use App\Http\Controllers\APIControllers\ProjectMemberController;
use App\Http\Middleware\CustomAuthenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\test;
Route::middleware([
    CustomAuthenticate::class
])
    ->name('projectmember.')
    ->namespace('\App\Http\Controllers')
    ->group(function () {
        Route::get('/projectmembers/{project}',  [ProjectMemberController::class, 'show'])->name('show');
        Route::post('/projectmembers/{project}',  [ProjectMemberController::class, 'store'])->name('store');
        Route::patch('/projectmembers/{project}',  [ProjectMemberController::class, 'update'])->name('update');
        Route::delete('/projectmembers/{project}/{projectMember}',  [ProjectMemberController::class, 'destroy'])->name('delete');
    });

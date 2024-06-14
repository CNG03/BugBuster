<?php

use App\Http\Controllers\ProjectMemberController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Resources\ProjectMemberResource;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'api',
    'auth',
    'checkProjectPermissions:MANAGER'
])
    ->name('projectmember.')
    ->namespace('\App\Http\Controllers')
    ->group(function () {
        //Route::get('/projectmembers', [ProjectMemberController::class, 'index'])->name('index');
        Route::get('/projectmembers/{project}',  [ProjectMemberController::class, 'show'])->name('show');
        Route::post('/projectmembers/{project}',  [ProjectMemberController::class, 'store'])->name('store');
        Route::patch('/projectmembers/{project}',  [ProjectMemberController::class, 'update'])->name('update');
        Route::delete('/projectmembers/{project}/{projectMember}',  [ProjectMemberController::class, 'destroy'])->name('delete');
    });
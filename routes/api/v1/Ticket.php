<?php

use App\Http\Controllers\APIControllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:api'
])
    ->name('ticket.')
    ->namespace('\App\Http\Controllers')
    ->group(function () {
        Route::get('/tickets/dashboard', [TicketController::class, 'dashboard'])->name('dashboard');
        Route::get('/tickets/created/{projectId}', [TicketController::class, 'getUserTickets'])->name('userTicket');
        Route::get('/tickets/assigned/{projectId}', [TicketController::class, 'getAssignedTickets'])->name('assignedTicket');
        Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('show');
        Route::post('/tickets', [TicketController::class, 'store'])->name('store');
        Route::post('/tickets/status/{ticket}', [TicketController::class, 'updateStatus'])->name('updateStatus');
        Route::post('/tickets/{ticket}', [TicketController::class, 'update'])->name('update');
        Route::delete('/tickets/{ticket}', [TicketController::class, 'delete'])->name('delete');
    });

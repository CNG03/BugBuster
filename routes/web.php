<?php

use App\Http\Controllers\APIControllers\auth\AccessController;
use App\Http\Controllers\APIControllers\GoogleAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIControllers\auth\ForgotPasswordController;
use App\Http\Controllers\WebControllers\WebTicketController;
use App\Http\Controllers\WebControllers\DashboardController;
use App\Http\Controllers\WebControllers\ProjectDetailController;
use App\Http\Middleware\AddAuthorizationHeader;
use App\Http\Middleware\JwtAuthMiddleware;
use App\Http\Middleware\AdminMiddleware;

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

Route::get('/test', function () {
    return view('layouts.app');
});
Route::get('/tickets', function () {
    return view('layouts.tickets_all');
});

Route::get('/tickets/detail', function () {
    return view('layouts.ticket_detail');
});
Route::get('/profile', function () {
    return view('layouts.profile');
})->name('myProfile');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(AdminMiddleware::class);
Route::get('/project/all_tickets/{projectID}', [WebTicketController::class, 'allTickets'])->name('allTickets')->middleware(AdminMiddleware::class);
Route::get('/project/created_tickets/{projectID}', [WebTicketController::class, 'createdTickets'])->name('createdTickets')->middleware(AdminMiddleware::class);
// Route::post('/project/created_tickets/{projectID}', [WebTicketController::class, 'createTicket'])->name('test')->middleware(AdminMiddleware::class);
Route::get('/project/assigned_tickets/{projectID}', [WebTicketController::class, 'assignedTickets'])->name('assignedTickets')->middleware(AdminMiddleware::class);
Route::post('/project/create_ticket/{projectID}', [WebTicketController::class, 'createTicket'])->name('newTicket')->middleware(AdminMiddleware::class);
Route::post('/project/ticket/status', [WebTicketController::class, 'updateStatus'])->name('updateStatus')->middleware(AdminMiddleware::class);
Route::get('/project/ticket/detail/{ticketID}', [WebTicketController::class, 'ticketDetail'])->name('ticketDetail')->middleware(AdminMiddleware::class);
Route::get('/project/ticket/edit/{ticketID}', [WebTicketController::class, 'editTicket'])->name('editTicket')->middleware(AdminMiddleware::class);
Route::post('/project/ticket/edit/{ticketID}', [WebTicketController::class, 'updateTicket'])->name('updateTicket')->middleware(AdminMiddleware::class);


Route::get('/project/detail/{projectID}', [ProjectDetailController::class, 'index'])->name('projectDetail')->middleware(AdminMiddleware::class);
Route::post('/project/member/{projectID}', [ProjectDetailController::class, 'updateRoleProject'])->name('updateRole')->middleware(AdminMiddleware::class);
Route::post('/project/member/delete/{projectID}', [ProjectDetailController::class, 'removeMemberFromProject'])->name('removeMember')->middleware(AdminMiddleware::class);
Route::post('/project/member/add/{projectID}', [ProjectDetailController::class, 'addMemberFromProject'])->name('addMember')->middleware(AdminMiddleware::class);


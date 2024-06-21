<?php

use App\Http\Controllers\APIControllers\auth\AccessController;
use App\Http\Controllers\APIControllers\GoogleAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIControllers\auth\ForgotPasswordController;
use App\Http\Controllers\WebControllers\UserManagementController;
use App\Http\Controllers\WebControllers\TestManagementController;
use App\Http\Controllers\WebControllers\BugManagementController;
use App\Http\Controllers\WebControllers\ProjectManagementController;
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

Route::get('/profile', function () {
    return view('layouts.profile');
})->name('myProfile')->middleware(AdminMiddleware::class);

Route::get('/project-management', [ProjectManagementController::class, 'index'])->middleware(AdminMiddleware::class);
Route::get('/user-management', [UserManagementController::class, 'index'])->name('users')->middleware(AdminMiddleware::class);
Route::get('/test-management', [TestManagementController::class, 'index'])->name('entities')->middleware(AdminMiddleware::class);
Route::get('/bug-management', [BugManagementController::class, 'index'])->name('entities')->middleware(AdminMiddleware::class);

// Route ve hien thi giao dien dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(AdminMiddleware::class);

// Route hien thi giao dien all tickets
Route::get('/project/all_tickets/{projectID}', [WebTicketController::class, 'allTickets'])->name('allTickets')->middleware(AdminMiddleware::class);

// Route hien thi giao dien nhung tickets ma minh da tao trong mot project 
Route::get('/project/created_tickets/{projectID}', [WebTicketController::class, 'createdTickets'])->name('createdTickets')->middleware(AdminMiddleware::class);

// Route hien thi giao dien nhung tickets ma minh duoc giao trong mot project
Route::get('/project/assigned_tickets/{projectID}', [WebTicketController::class, 'assignedTickets'])->name('assignedTickets')->middleware(AdminMiddleware::class);

// Route hien thi form tao moi mot ticket
Route::post('/project/create_ticket/{projectID}', [WebTicketController::class, 'createTicket'])->name('newTicket')->middleware(AdminMiddleware::class);

// Route cho viec cap nhat status cua mot ticket
Route::post('/project/ticket/status', [WebTicketController::class, 'updateStatus'])->name('updateStatus')->middleware(AdminMiddleware::class);

// Route cho viec hien thi thong tin chi tiet cua mot ticket
Route::get('/project/ticket/detail/{ticketID}', [WebTicketController::class, 'ticketDetail'])->name('ticketDetail')->middleware(AdminMiddleware::class);

// Route cho viec thuc hien edit mot ticket theo ticketID
Route::get('/project/ticket/edit/{ticketID}', [WebTicketController::class, 'editTicket'])->name('editTicket')->middleware(AdminMiddleware::class);

// Route xu ly viec edit mot ticket (handle use controller)
Route::post('/project/ticket/edit/{ticketID}', [WebTicketController::class, 'updateTicket'])->name('updateTicket')->middleware(AdminMiddleware::class);

// Route dung de hien thi thong tin chi tiet cho mot project ton tai trong he thong
Route::get('/project/detail/{projectID}', [ProjectDetailController::class, 'index'])->name('projectDetail')->middleware(AdminMiddleware::class);

// Route dung de xu ly request update Role cua nhung member trong mot project
Route::post('/project/member/{projectID}', [ProjectDetailController::class, 'updateRoleProject'])->name('updateRole')->middleware(AdminMiddleware::class);

// Route dung de xoa di mot thanh vien nao do dang o trong project hien tai
Route::post('/project/member/delete/{projectID}', [ProjectDetailController::class, 'removeMemberFromProject'])->name('removeMember')->middleware(AdminMiddleware::class);

// Route dung de them mot thanh vien vao trong project
Route::post('/project/member/add/{projectID}', [ProjectDetailController::class, 'addMemberFromProject'])->name('addMember')->middleware(AdminMiddleware::class);

// Route xu ly request close project danh cho admin hoac manager
Route::post('/project/close/{projectID}', [ProjectDetailController::class, 'closeProject'])->name('closeProject')->middleware(AdminMiddleware::class);


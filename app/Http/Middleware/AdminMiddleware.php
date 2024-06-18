<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!Session::get('accessToken')) {
            return response()->view('access.access');
        }

        // Kiểm tra xem người dùng có vai trò admin không
        // $user = Auth::user();
        // if ($user->role !== 'ADMIN') { // Giả sử bạn có cột 'role' trong bảng users
        //     return response()->json(['error' => 'Unauthorized.'], 403);
        // }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class AddAuthorizationHeader
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Kiểm tra xem token có tồn tại trong session không
        if ($token = Session::get('accessToken')) {
            // Thêm header 'Authorization' vào request
            $request->headers->set('Authorization', 'Bearer ' . $token);
        }

        return $next($request);
    }
}

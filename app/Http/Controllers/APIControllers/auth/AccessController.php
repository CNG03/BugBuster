<?php

namespace App\Http\Controllers\APIControllers\auth;

use App\Http\Controllers\APIControllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Mail\VerifyEmail;
use App\Repositories\AccessRepository;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Session;

class AccessController extends Controller
{
    public function showForm()
    {
        return view('access.access');
    }

    public function register(RegisterRequest $request, AccessRepository $repository)
    {
        $existingUser = User::where('email', $request->email)->first();

        if ($existingUser) {
            if (!$existingUser->email_verified) {
                $existingUser->token = Str::random(60);
                $existingUser->save();

                Mail::to($existingUser->email)->send(new VerifyEmail($existingUser->token));

                return redirect()->route('access')->with('success', 'Email xác thực đã được gửi lại. Vui lòng kiểm tra email của bạn để xác thực tài khoản!');
            } else {
                return redirect()->back()->withErrors(['email_exit' => 'Email này đã được sử dụng.']);
            }
        } else {
            $user = $repository->register($request->only([
                'name',
                'email',
                'password'
            ]));

            Mail::to($user->email)->send(new VerifyEmail($user->token));

            return redirect()->route('access')->with('success', 'Tạo tài khoản thành công. Vui lòng kiểm tra email của bạn để xác thực tài khoản!');
        }
    }

    public function verifyEmail($token)
    {
        // dd($token);
        $user = User::where('token', $token)->firstOrFail();

        // Xác thực email
        if ($user) {
            $user->email_verified = true;
            $user->token = null;
            $user->save();
            return redirect()->route('access')->with('success', 'Xác thực email thành công. Bây giờ bạn có thể đăng nhập!');
        } else {
            return redirect()->route('access')->with('fault_token', 'xác thực thất bại');
        }
    }

    public function login(LoginRequest $request, AccessRepository $repository)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'invalidLogin' => ['Thông tin đăng nhập không chính xác.'],
            ]);
        }

        $user = JWTAuth::user();

        if (!$user->email_verified) {
            throw ValidationException::withMessages([
                'email_not_verified' => ['Email của bạn chưa được xác thực. Vui lòng kiểm tra email để xác thực.'],
            ]);
        }

        $refreshToken = $repository->createRefreshToken($user);

        Session::put('accessToken', $token);
        Session::put('refreshToken', $refreshToken);
        Session::put('user_id', $user->id);
        Session::put('user_name', $user->name);
        Session::put('user_email', $user->email);

        return redirect()->intended('/app');
    }

    public function logout(Request $request, AccessRepository $repository)
    {
        $user = JWTAuth::user();

        $repository->addToBlacklist($user->refresh_token);

        JWTAuth::invalidate(JWTAuth::getToken());

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('status', 'Đăng xuất thành công');
    }
}

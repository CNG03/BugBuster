<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AccessController extends Controller
{
    public function showForm()
    {
        return view('access.access');
    }

    public function register(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        // Kiểm tra xem người dùng đã tồn tại chưa
        $existingUser = User::where('email', $request->email)->first();

        if ($existingUser) {
            if (!$existingUser->email_verified) {
                // Cập nhật tên và mật khẩu mới
                $existingUser->name = $request->name;
                $existingUser->password = Hash::make($request->password);
                
                // Tạo token mới cho người dùng chưa xác thực
                $existingUser->token = Str::random(60);
                $existingUser->save();

                // Gửi email xác thực mới
                Mail::to($existingUser->email)->send(new VerifyEmail($existingUser->token));

                // Chuyển hướng đến trang thông báo người dùng kiểm tra email
                return redirect()->route('access')->with('success', 'Email xác thực đã được gửi lại. Vui lòng kiểm tra email của bạn để xác thực tài khoản!');
            } else {
                // Nếu email đã xác thực, trả về lỗi
                return redirect()->back()->withErrors(['email_exit' => 'Email này đã được sử dụng.']);
            }
        } else {
            // Tạo người dùng mới và gán token xác thực email
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'email_verified' => false, // Đảm bảo email chưa được xác thực
                'token' => Str::random(60),
            ]);

            // Gửi email xác thực
            Mail::to($user->email)->send(new VerifyEmail($user->token));

            // Chuyển hướng đến trang thông báo người dùng kiểm tra email
            return redirect()->route('access')->with('success', 'Tạo tài khoản thành công. Vui lòng kiểm tra email của bạn để xác thực tài khoản!');
        }
    }

    public function verifyEmail($token)
    {
        $user = User::where('token', $token)->firstOrFail();

        // Xác thực email
        $user->email_verified = true;
        $user->token = null;
        $user->save();

        return redirect()->route('access')->with('success', 'Xác thực email thành công. Bây giờ bạn có thể đăng nhập!');
    }

    public function login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        // Attempt to authenticate the user
        if (Auth::attempt($credentials, $request->remember)) {
            // Check if the user's email is verified
            $user = Auth::user();
            if (!$user->email_verified) {
                Auth::logout();
                throw ValidationException::withMessages([
                    'email_not_verified' => ['Email của bạn chưa được xác thực. Vui lòng kiểm tra email để xác thực.'],
                ]);
            }

            // Regenerate the session to prevent session fixation attacks
            $request->session()->regenerate();

            // Redirect to the intended page or default to '/home'
            return redirect()->intended('/app');
        }

        // If authentication fails, throw a validation exception
        throw ValidationException::withMessages([
            'invalidLogin' => ['Thông tin đăng nhập không chính xác.'],
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate the session to prevent session fixation
        $request->session()->invalidate();

        // Regenerate the CSRF token to prevent CSRF attacks
        $request->session()->regenerateToken();

        return redirect()->route('access')->with('status', 'Successfully logged out');
    }
}

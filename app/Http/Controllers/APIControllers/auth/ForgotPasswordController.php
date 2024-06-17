<?php

namespace App\Http\Controllers\APIControllers\auth;

use App\Http\Controllers\APIControllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;
use App\Mail\ResetPasswordCode;


class ForgotPasswordController extends Controller
{
    public function showForgotForm()
    {
        return view('access.emaiForgotPassword');
    }

    public function sendResetCode(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        $token = rand(100000, 999999);

        DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email],
            [
                'token' => $token,
                'created_at' => Carbon::now()
            ]
        );

        Mail::to($request->email)->send(new ResetPasswordCode($token));
        session(['email' => $request->email]);

        return redirect()->route('password.reset');
    }

    public function showResetForm(Request $request)
    {
        $email = session('email');

        if (!$email) {
            return redirect()->route('Auth.email')->withErrors(['email' => 'Vui lòng nhập email của bạn.']);
        }

        return view('access.resetPassword', ['email' => $email]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'token' => 'required|numeric',
            'password' => 'required|string|min:8|confirmed',
        ]);

        session(['email' => $request->email]);

        $passwordReset = DB::table('password_resets')->where([
            ['email', $request->email],
            ['token', $request->token]
        ])->first();

        if (!$passwordReset) {
            return back()->withErrors(['token_invalid' => 'Mã xác thực không hợp lệ.']);
        }
        if (Carbon::parse($passwordReset->created_at)->addMinutes(2)->isPast()) {
            return back()->withErrors(['token_expired' => 'Mã xác thực đã hết hạn.']);
        }

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        DB::table('password_resets')->where(['email' => $request->email])->delete();
        session()->forget('email');

        return redirect()->route('access')->with('password_reset', 'Mật khẩu đã được thay đổi thành công.');
    }
}

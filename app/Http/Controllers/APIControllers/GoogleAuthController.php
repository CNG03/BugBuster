<?php

namespace App\Http\Controllers\APIControllers;

use App\Http\Controllers\APIControllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Facades\JWTAuth;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {

        try {
            $ggUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            // Xử lý khi người dùng nhấn hủy
            return redirect('/access')->withErrors(['gg_cancel' => 'Bạn đã hủy đăng ký Google.']);
        }

        // Tìm người dùng đã đăng ký
        $user = User::where('email', $ggUser->getEmail())->orWhere('google_id', $ggUser->getId())->first();

        if (!$user) {
            $user = User::create([
                'name' => $ggUser->getName(),
                'email' => $ggUser->getEmail(),
                'google_id' => $ggUser->getId(),
                'avatar' =>  $ggUser->getAvatar(),
                'email_verified' => $ggUser->user['email_verified'],
                'token' => $ggUser->token
            ]);
        }
        Auth::login($user, true); // Đăng nhập người dùng
        $token = JWTAuth::fromUser($user);
        $refreshToken = JWTAuth::claims(['type' => 'refresh'])->fromUser($user);
        $user->refresh_token = $refreshToken;
        $user->save();

        Session::put('accessToken', 'Bearer ' . $token);
        Session::put('refreshToken', $refreshToken);
        Session::put('user_id', $user->id);
        Session::put('user_name', $user->name);
        Session::put('user_email', $user->email);
        Session::put('user_avatar', $user->avatar);
        Session::put('user_role', $user->role);


        return redirect()->intended('/dashboard');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;


class GoogleAuthController extends Controller
{
    public function redirect()  {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()  {
        
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            // Xử lý khi người dùng nhấn hủy
            return redirect('/access')->withErrors(['gg_cancel' => 'Bạn đã hủy đăng ký Google.']);
        }

        // Tìm người dùng đã đăng ký
        $existingUser = User::where('email', $user->getEmail())->orWhere('google_id', $user->getId())->first();

        if ($existingUser) {
            // Cập nhật thông tin nếu cần thiết
            $existingUser->google_id = $user->getId();
            // $existingUser->avatar = $user->getAvatar();
            $existingUser->token = $user->token;
            $existingUser->email_verified = $user->user['email_verified'];
            $existingUser->save();

            Auth::login($existingUser, true);
            return redirect()->intended('/app');
        } else {
            // Tạo tài khoản mới nếu chưa đăng ký
            $newUser = new User;
            $newUser->name = $user->getName();
            $newUser->email = $user->getEmail();
            $newUser->google_id = $user->getId();
            $newUser->avatar = $user->getAvatar();
            $newUser->token = $user->token;
            $newUser->email_verified = $user->user['email_verified'];
            $newUser->save();

            Auth::login($newUser, true);
            return redirect()->intended('/app');
        }
    }
}

<?php

namespace App\Repositories;

use App\Events\Models\User\UserCreated;
use App\Exceptions\GeneralJsonException;
use App\Models\Blacklist;
use App\Models\RefreshToken;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Tymon\JWTAuth\Facades\JWTAuth;

class AccessRepository
{
    /**
     * Check if the email already exists in the database.
     *
     * @param  string  $email
     * @return bool
     */
    public function emailExists(string $email): bool
    {
        return User::where('email', $email)->exists();
    }


    public function register(array $attributes)
    {
        return DB::transaction(function () use ($attributes) {
            $created = User::query()->create([
                'name' => data_get($attributes, 'name'),
                'email' => data_get($attributes, 'email'),
                'email_verified' => false,
                'password' => Hash::make(data_get($attributes, 'password')),
                'token' => Str::random(60),
            ]);

            throw_if(!$created, GeneralJsonException::class, 'không thể đăng ký tài khoản');

            return $created;
        });
    }
    public function changePassword($user, array $attributes)
    {

        $updated = $user->update([
            'password' => Hash::make(data_get($attributes, 'new_password')),
        ]);

        throw_if(!$updated, GeneralJsonException::class, 'Failed to change password');

        return $user;
    }

    public function createRefreshToken(User $user)
    {
        return DB::transaction(function () use ($user) {

            if ($user->refresh_token)
                $this->addToBlacklist($user->refresh_token);

            $refreshToken = JWTAuth::claims(['type' => 'refresh'])->fromUser($user);

            $user->refresh_token = $refreshToken;
            $user->save();

            return $refreshToken;
        });
    }

    public function isInBlacklist($token): bool
    {
        return Blacklist::where('token', $token)->exists();
    }

    public function addToBlacklist($refreshToken)
    {
        Blacklist::create([
            'token' => $refreshToken,
        ]);
    }
}

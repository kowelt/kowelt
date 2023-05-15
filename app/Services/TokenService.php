<?php

namespace App\Services;

use App\Models\User;
use App\Models\VerifyToken;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class TokenService
{
    public static function generateToken($user_id): string
    {
        $token = Str::uuid()->toString();

        VerifyToken::create([
            'user_id' => $user_id,
            'token' => $token,
        ]);

        return $token;
    }

/*    public static function generateResetPasswordToken($email)
    {
        $token = Str::uuid()->toString();
        $user = User::where('email', $email)->first();

        VerifyToken::create([
            'user_id' => $user->id,
            'token' => $token,
        ]);

        return $token;
    }*/

    public static function checkTokenValidity($token): bool
    {
        return false;
    }

    public static function checkRecaptchaTokenValidity($recaptcha_token): bool
    {
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('recaptcha.recaptcha_secret_key'),
            'response' => $recaptcha_token,
        ]);

        return $response->json('success');
    }
}

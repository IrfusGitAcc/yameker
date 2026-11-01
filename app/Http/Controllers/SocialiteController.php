<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\AppUser;
use Illuminate\Support\Facades\Auth;


class SocialiteController extends Controller
{
    public function googleSignIn()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = AppUser::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'password' => bcrypt(uniqid())
            ]
        );

        Auth::login($user);

        return redirect()->intended('/');
    }
}

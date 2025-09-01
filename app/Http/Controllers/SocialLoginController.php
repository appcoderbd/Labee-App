<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\SocialLoginProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    // Social Login rediact

    public function redirect(SocialLoginProvider $provider){

        // dd($provider);
        return Socialite::driver($provider->value)->redirect();
    }

    public function callback(SocialLoginProvider $provider){

        $userProvider = Socialite::driver($provider->value)->user();

        // dd($userProvider);
        $existUser = User::where('email', $userProvider->getEmail())->first();

        if($existUser){

            $existUser->update([
                'provider_name' => $provider->value,
                'provider_id' => $userProvider->getEmail()
            ]);

            Auth::login($existUser, true);
            return to_route('dashboard');
        }

        $user = User::create([
            'name' => $userProvider->getName(),
            'email' => $userProvider->getEmail(),
            'provider_name' => $provider->value,
            'provider_id' => $userProvider->getId()
        ]);

        Auth::login($user, true);
        return to_route('dashboard');


    }


}

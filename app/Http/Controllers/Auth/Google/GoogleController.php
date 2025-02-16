<?php

namespace App\Http\Controllers\Auth\Google;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();
        $user = User::where('email', $googleUser->getEmail())->first();

        if (!$user) {
            $user = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'password' => bcrypt(Str::random(24)),
            ]);

            // Pastikan peran "User" sudah ada di database
            if (!Role::where('name', 'User')->exists()) {
                Role::create(['name' => 'User']);
            }

            // Berikan peran "User" secara otomatis
            $user->assignRole('User');
        }

        Auth::login($user);

        return redirect()->route('frontend.landing-page');
    }
}

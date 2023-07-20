<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Throwable;

class SocialLoginController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            $provider_user = Socialite::driver($provider)->user();

            $user = User::where([
                'provider' => $provider,
                'provider_id' => $provider_user->id,
            ])->first();


            if (!$user) {
                // Get the default role for new users from the database
                $defaultRoleName = getSetting('default_new_user_role');

                // Get the role instance with the given name
                $defaultRole = Role::where('name', $defaultRoleName)->first();

                $user = User::create([
                    'name' => $provider_user->name,
                    'email' => $provider_user->email,
                    'profile_photo' => $provider_user->avatar,
                    'password' => Hash::make(Str::random(12)),
                    'email_verified_at' => \Carbon\Carbon::now(),
                    'provider' => $provider,
                    'provider_id' => $provider_user->id,
                    'provider_token' => $provider_user->token,
                ]);

                $user->assignRole($defaultRole);
            }

            Auth::login($user);

            return redirect()->route('home');
        } catch (Throwable $e) {
            return redirect()->route('login')->withErrors([
                'email' => $e->getMessage()
            ]);
        }
    }
}

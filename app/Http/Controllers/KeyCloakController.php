<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Exception;
use Socialite;
use App\Models\User;

class KeyCloakController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('keycloak')->redirect();
    }

    public function callback()
    {
        $remote_user = Socialite::driver('keycloak')->user();

        $user = User::updateOrCreate([
            'keycloak_id' => $remote_user->id,
        ], [
            'name' => $remote_user->name,
            'email' => $remote_user->email,
            'refresh_token' => $remote_user->refreshToken,
            'last_visit_at' => now(),
        ]);
        $user->increment('visits');

        Auth::login($user, $remember = true);

        return redirect('/');
    }
}

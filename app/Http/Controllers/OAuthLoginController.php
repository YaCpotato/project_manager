<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Socialite;
use Auth;
use App\Project;

class OAuthLoginController extends Controller
{
    public function getGoogleAuth($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function authGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
        $user = User::firstOrNew(['email' => $googleUser->email]);
        if (!$user->exists) {
            $user['name'] = $googleUser->getNickname() ?? $googleUser->getName() ?? $googleUser->getNick();
            $user['email'] = $googleUser->email;
            $user['google_name'] = $googleUser->getNickname() ?? $googleUser->getName() ?? $googleUser->getNick();
            $user->save();
        }
        Auth::login($user);

        $projects = Project::all();
        $user = Auth::user();
        return view('project/index', compact('projects','user'));
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class OathController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $user_socilite = Socialite::driver($provider)->user();

        $user = User::updateOrCreate([
            'github_id' => $user_socilite->id,
        ], [
            'name' => $user_socilite->name,
            'email' => $user_socilite->email,
        ]);
    }
}

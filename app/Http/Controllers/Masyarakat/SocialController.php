<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
class SocialController extends Controller
{
     public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        // $authUser = $this->findOrCreateUser($user, $provider);

        // Auth::guard('masyarakat')->login($authUser, true);

        dd('123');
        return 1;
    }
}

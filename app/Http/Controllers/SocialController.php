<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class SocialController extends Controller
{
    public function redirect($service)
    {
        return Socialite::driver($service)->redirect();
    }


    public function callback($service,Request $request)
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $finduser = User::where('email',$user->email)->first();

            if ($finduser) {
                Auth::login($finduser);
                return redirect()->intended('Home');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);

                Auth::login($newUser);
                return redirect()->intended('Home');
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}

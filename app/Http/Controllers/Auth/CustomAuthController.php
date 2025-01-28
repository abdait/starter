<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CustomAuthController extends Controller
{

    public function adult(){
        return view ('CustomAuth.index');
    }

    public function site(){
        return view ('CustomAuth.site');
    }

    public function admin(){
        return view ('CustomAuth.admin');
    }

    public function login(){
        return view ('auth.adminlogin');
    }

    public function checklogin(Request $request)
    {
        
    
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/admins');
        }
    
        return back()->withInput($request->only('email'));
    }
    
}

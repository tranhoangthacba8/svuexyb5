<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }
    public function submitLogin(Request $request)
    {
        $username =  $request->input('login-email');
        $password =  $request->input('login-password');

        if (Auth::attempt([
            'email' => $username,
            'password' => $password,
        ])) {
            $user = User::where('email', $username)->first();
            Auth::login($user);

            return redirect()->route('report.index');
        }else{
            return redirect()->route('login');
        }
    }

}

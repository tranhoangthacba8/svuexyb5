<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register()
    {
        return view('register');
    }
    public function submitRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'tel' => 'numeric',
            'password' => 'required|min:8'
        ], [


            'email.email' => 'Không đúng định dạng',
            'email.required' => 'Email không được để trống',
            'tel.numeric' => 'Chỉ được nhập số'
        ]);

        $register = new User();
        $register->fill($request->all());
        $register->save();

        return redirect()->route('login');
    }
}

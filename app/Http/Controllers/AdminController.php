<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->only('email', 'password');

        $validate = Validator::make($data, [
            'email' => 'required|email|max:255',
            'password' => 'required|string|max:200'
        ]);

        if ($validate->fails()) {
            return redirect('login')->withErrors($validate)->withInput();
        }

        if (!Auth::attempt($data)) {
            return redirect('login')->with('error', 'invalid email or password');
        }

        return redirect('/dashboard');
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}

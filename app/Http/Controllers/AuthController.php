<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    function index(Request $request)
    {
        return view('auth.login');
    }

    function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        } else {
            return redirect('login')->with('fail', 'Incorrect credentials');
        }
    }
    
    function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Logout successfully');
    }

    function registerView(Request $request)
    {
        return view('auth.register');
    }

    function register(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|min:5',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = strtolower($request->email);
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('login')->with('success', 'Account created successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class authController extends Controller
{
    // Login routes controller function
    public function login()
    {
        return view('auth.login');
    }
    public function authenticate(Request $request)
    {
        // dd($request->all());
        $formFields = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('message', 'Welcome back');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    // Register routes controller function
    public function register()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'username' => ['required', 'min:3', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        $user = User::Create($formFields);
        auth()->login($user);
        return redirect()->route('dashboard')->with('message', 'Your account has been created');
    }
    public function logout(Request $request)
    {
        $request->session()->invalidate();
        auth()->logout();
        return redirect()->route('login')->with('message', 'You have been logged out');
    }
}

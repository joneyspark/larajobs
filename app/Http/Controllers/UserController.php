<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // User Registration
    public function create()
    {
        return view('users.register');
    }

    // Store User
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|min:6|confirmed',
        ]);

        // Hash password
        $validateData['password'] = bcrypt($validateData['password']);

        $user = User::create($validateData);

        // Login
        auth()->login($user);

        return redirect('/')->with('message', 'Your user has been created');
    }

    // Logout User
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out');
    }

    // Show Login Form
    public function login()
    {
        return view('users.login');
    }

    // authenticate
    public function authenticate(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($validateData)) {
            $request->session()->regenerateToken();
            return redirect('/');
        }

        return redirect('/login')->with('message', 'Invalid credentials');
    }
}

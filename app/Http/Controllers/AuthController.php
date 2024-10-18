<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Display the registration form
    public function register()
    {
        return view('auth.register');
    }

    // Handle the registration
    public function registerSave(Request $request)
    {
        // Validate input fields
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create the user with hashed password
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'type' => '0' // Default type for users
        ]);

        // Redirect to login page after successful registration
        return redirect()->route('login')->with('success', 'Account created successfully.');
    }

    // Display the login form
    public function login()
    {
        return view('auth.login');
    }

    // Handle the login
    public function loginAction(Request $request)
    {
        // Validate input fields
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();

        // Attempt to log the user in
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }

        // Regenerate session for security
        $request->session()->regenerate();

        // Redirect based on user type
        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin/home');
        } else {
            return redirect()->route('home');
        }
    }

    // Handle the logout
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        return redirect('/login');
    }

    // Display the user profile (optional)
    public function profile()
    {
        return view('userprofile');
    }
}

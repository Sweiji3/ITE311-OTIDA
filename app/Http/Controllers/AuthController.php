<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
   
    public function register()
    {
        return view('auth.register');
    }

    public function storeRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',

            'email' => 'required|email|unique:users,email',

            'password' => 'required|min:8|confirmed',
        ]);


        User::create([
            'name' => $request->name,

            'email' => $request->email,

            'password' => bcrypt($request->password),

            // Every newly registered account starts as Student
            'role' => 'student',
        ]);


        return redirect()
            ->route('login')
            ->with('success', 'Registration successful! You can now login.');
    }


    public function login()
    {
        return view('auth.login');
    }


    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',

            'password' => 'required',
        ]);


        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()
                ->route('dashboard')
                ->with('success', 'Welcome back!');
        }


        return back()
            ->withErrors([
                'email' => 'The email or password is incorrect',
            ])
            ->withInput($request->only('email'));
    }


    public function dashboard()
    {
        $user = Auth::user();

        return view('auth.dashboard', [
            'user' => $user,
            'role' => $user->role,
        ]);
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->with('success', 'You have been logged out successfully.');
    }
}

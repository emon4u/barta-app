<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    public function registerView(): View
    {
        return view('auth.register');
    }

    public function registerUser(UserStoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $user = DB::table("users")->insertGetId([
            "first_name" => $validated['first_name'],
            "last_name" => $validated['last_name'],
            "username" => $validated['username'],
            "email" => $validated['email'],
            "password" => Hash::make($validated['password']),
            "created_at" => now(),
        ]);

        if ($user) {
            return redirect('/login')->with('register_success', 'Registration successful! Please login.');
        }
    }

    public function loginView(): View
    {
        return view('auth.login');
    }

    public function loginUser(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            "email" => ['required', 'email'],
            "password" => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors([
            'login_fail' => 'The provided credentials do not match our records.',
        ]);
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}

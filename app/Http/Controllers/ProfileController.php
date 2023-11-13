<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function viewProfile(): View|RedirectResponse
    {
        $user = Auth::user();

        if ($user) {
            return view('profile.view', ['user' => $user]);
        } else {
            return redirect('404');
        }
    }

    public function editProfile(): View|RedirectResponse
    {
        $user = Auth::user();

        if ($user) {
            return view('profile.edit', ['user' => $user]);
        } else {
            return redirect('404');
        }
    }

    public function updateProfile(UserUpdateRequest $request)
    {
        $validated = $request->validated();

        $userUpdateData = [
            "first_name" => $validated['first_name'],
            "last_name" => $validated['last_name'],
            "username" => $validated['username'],
            "email" => $validated['email'],
            "bio" => $validated['bio'],
            "password" => Hash::make($validated['password']),
            'updated_at' => now(),
        ];

        return redirect('/profile')->with('update_success', 'Profile updated successful!.');
    }
}

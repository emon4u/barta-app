<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    public function updateProfile(UserUpdateRequest $request): RedirectResponse
    {
        $user_id = Auth::id();

        try {
            $validated = $request->validated();

            $updatedData = [
                "first_name" => $validated['first_name'],
                "last_name" => $validated['last_name'],
                "username" => $validated['username'],
                "email" => $validated['email'],
                "updated_at" => now(),
            ];

            if ($validated['password']) {
                $updatedData['password'] = Hash::make($validated['password']);
            }

            if ($validated['bio']) {
                $updatedData['bio'] = $validated['bio'];
            }

            DB::table('users')->where('id', $user_id)->update($updatedData);

            return redirect('/profile')->with('update_success', 'Profile updated successful!.');
        } catch (QueryException $e) {
            if ($e->errorInfo[1] === 1062) {
                return redirect('/edit-profile')->with('update_error', 'Username or email already exists.');
            }

            return redirect('/edit-profile')->with('update_error', 'An error occurred while updating the profile.');
        }
    }
}

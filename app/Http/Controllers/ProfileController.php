<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        return view('user.pages.profile.show');
    }

    public function edit()
    {
        return view('user.pages.profile.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'nullable|string|max:20|unique:users,nim,' . Auth::id(),
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'faculty' => 'nullable|string',
            'major' => 'nullable|string',
            'semester' => 'nullable|string',
        ]);

        Auth::user()->update($request->only([
            'name', 'nim', 'email', 'phone', 'address', 'faculty', 'major', 'semester'
        ]));

        return redirect()->route('profile.show')->with('success', 'Profile berhasil diperbarui!');
    }
}

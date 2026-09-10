<?php

namespace App\Http\Controllers;

class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();

        $tripCount = $user->trips()->count();

        return view('profile.show', compact('user', 'tripCount'));
    }
}

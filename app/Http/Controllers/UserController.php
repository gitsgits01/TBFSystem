<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    

    public function showProfile($id)
    {
        $user = User::find($id);
        return view('profile.show', compact('user'));
    }

    public function editProfile($id)
    {
        $user = User::find($id);
        return view('profile.edit', compact('user'));
    }

    public function updateProfile(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        // Update other profile-related fields

        $user->save();

        return redirect()->route('profile.show', $id)->with('success', 'Profile updated successfully');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserController extends Controller
{
    public function changePassword(){
        return view('changepassword');
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
            'confirm_password'=>'required|same:new_password',
        ]);
    
        //$user = Auth::user();
        $user = User::auth();
        // Verify current password
        if (!Hash::check($request->input('current_password'), $user->password)) {
            return back()->withErrors(['current_password' => 'The provided current password is incorrect.']);
        }
    
        // Update password
        $user->update([
            'password' => Hash::make($request->input('new_password')),
        ]);
        //$user->save();
        return redirect()->route('login')->with('success', 'Password changed successfully!');
    }

    public function delete($id){
        $user=User::find($id);
        $user->delete();
        return redirect()->route('login')->with('Status','Account Deleted Successfully.');
    }

}

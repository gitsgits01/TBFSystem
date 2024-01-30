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
    $current_password=Hash::check($request->current_password,auth()->user()->password);
        if($current_password){
        User::findOrFail(Auth::user()->id)->update([
            'password'=> Hash::make($request->password),
        ]);
        return redirect()->route('login')->with('success','Password Changed');
    }else{
        return redirect()->back()->with('error','Current Password doesnot match with the old password');





        // $user = Auth::user();
        // // Verify current password
        // if (Hash::check($request->current_password,auth()-> $user->password)) {

        // $update=user::whereId(auth()->id())->update([
        //     'password'=>Hash::make($request->new_password)]);
        //     if( $update ){
        //         return redirect()->back()->with('success','Password changed successfully');
        //     }
        //     return redirect()->back()->with('error','Password Changed failed');
        
        //Update password
       
        // if (Hash::check($request->current_password,auth()-> $user->password)) {
        
        //     auth()->$user->update([
        //         'password' => Hash::make($request->input('new_password')),
        //     ]);
        //     return redirect()->route('login')->with('success', 'Password changed successfully!');
    

        // }else{
        //     return redirect()->back()->withErrors(['error' => 'The provided current password is incorrect.']);

        // }

        }
    }

        


    public function confirm_deletion(){
        return view('confirm_deletion');
    }
    public function delete(Request $request){
        $request->validate([
            'password' => 'required',
        ]);

        $user=Auth::user();
        $delete =user::whereId(auth()->id())->delete([
            
            
        ]);
        return redirect()->route('cancel');
    }
    // public function profile(User $user)
    // {
    //     return view('userprofile', compact('user'));
    // }
}


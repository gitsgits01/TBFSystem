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
    // $current_password=Hash::check($request->current_password,auth()->user()->password);
    //     if($current_password){
    //     User::findOrFail(Auth::user()->id)->update([
    //         'password'=> Hash::make($request->password),
    //     ]);
    //     return redirect()->route('login')->with('success','Password Changed');
    // }else{
    //     return redirect()->back()->with('error','Current Password doesnot match with the old password');


        $user=$request->user();
        if(!Hash::check($request->current_password,$user->password)){
            return redirect()->back()->with('message','Current passowrd id incorrect');
        }
        $user->password=Hash::make($request->new_password);
        if($user->save()){
            return redirect()->route('login')->with('messsage','Password changed successfully');
        }
        else{
            return redirect()->back()->with('message','Error Occured');
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
     // if(Hash::check($request->input('password'),$user->password)){
        //     $user->delete();
        
        // Auth::logout(); //logout the user after deletion
        // return redirect('/')->with('success','Account deleted successfully');
        // }
        // return redirect()->back()->with('error','PAssword verification failed. Please try again.');

        // $user=User::find($id);
        // $user->delete();
        return redirect()->route('login')->with('Status','Account Deleted Successfully.');
    }
    // public function profile(User $user)
    // {
    //     return view('userprofile', compact('user'));
    // }
}


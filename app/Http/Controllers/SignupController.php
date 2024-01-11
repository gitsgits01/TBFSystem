<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class SignupController extends Controller
{
    public function form(){
        return view('signup');
    }
   
    public function signup(Request $request)
{
     $request->validate(
        [
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'dob' => 'required|date',
        'address' => 'required|string|max:255',
        'password' => 'required|min:8',
        'confirm_password' => 'required|same:password',
        ]
    );
    return $request->input();
    //$validator = Validator::make($request->all(), $validatedData);
    //return view('signup');
    //return redirect()->back()->withErrors($validator)->withInput();

    // Create user or perform other logic
}
}

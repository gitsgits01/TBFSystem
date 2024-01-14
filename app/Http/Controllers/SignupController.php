<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Error;


class SignupController extends Controller
{
    public function form(){
        return view('signup');
    }
    // public function home(){
    //     return view('index');
    // }
   
    public function store(Request $request)
{
     $request->validate(
        [
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'address' => 'required|string|max:255',
        'gender' =>'required|:Male,Female,Other',
        'dob' => 'required|date',
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

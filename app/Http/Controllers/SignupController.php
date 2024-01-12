<?php

namespace App\Http\Controllers;

use App\Models\User;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth\Auth;
use Illuminate\Support\Facades\DB;



class SignupController extends Controller
{
    public function form(){
        return view('signup');
    }
    // public function home(){
    //     return view('index');
    // }
   
    public function signup(Request $request)
{
     $validatedData=$request->validate(
        [
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'dob' => 'required|date',
        'address' => 'required|string|max:255',
        'gender'=>'required',

        'password' => 'required|min:8',
        'confirm_password' => 'required|same:password',
        ]
    );
    // $query=DB::table('user')->insert([
    //     'name'->$request->input('name'),
    //     'email'->$request->input('email'),
    //     'dob'->$request->input('dob'),
    //     'address'->$request->input('address'),
    //     'gender'->$request->input('gender'),
    //     'password'->$request->input('password')


    // ]);

    //return $request->input();
    $validator = Validator::make($request->all(), $validatedData);
    $user=User::insert([
        'name'=>$validator['name'],
        'email'=>$validator['email'],
        'gender'=>$validator['gender'],
        'password'=>bcrypt($validator['password']),
        'address'=>$validator['address'],
        'dob'=>$validator['dob'],
    ]);
    // User::create($request->all());
    // return redirect()->route('login')->with('success','user created successfully.');

    // //login user here
    // if(auth()->attempt($request->only('email','password'))){
    //     return redirect('/dashboard');
    // }
    //     return redirect()->back()->withErrors('Error');


    // Create user or perform other logic
}
}

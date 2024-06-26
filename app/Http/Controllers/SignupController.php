<?php

namespace App\Http\Controllers;

use App\Models\User;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\app\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Redirect;



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
        'dob' => 'required|date',
        'gender'=>'required|in:male,female,other',
        'password' => 'required|min:8',
        'confirm_password' => 'required|same:password',
        ]
    );


    // $validator = Validator::make($request->all(), $validatedData);
    $user=User::create([
        'name'=>$request['name'],
        'email'=>$request['email'],
        'address'=>$request['address'],
        'dob'=>$request['dob'],
        'gender'=>$request['gender'],
        'password'=>bcrypt($request['password']),
    ]);
    $user->save();
    //$user=new User($request->all());
   
      
return redirect()->route('login')->with('success','User Created Successfully ');

    // //login user here
    // if(auth()->attempt($request->only('email','password'))){
    //     return redirect('dashboard');
    // }
    //      return redirect()->back()->withErrors('Error');


}
}

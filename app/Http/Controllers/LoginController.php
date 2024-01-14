<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function form(){
        return view('login');
    }
    public function logout(){
        session()->flush();
        auth()->logout();
        return redirect('login');
    }

    
    public function login(Request $request)
{
    // Validate the login request
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Attempt to log the user in
    if (auth()->attempt($credentials)) {
        // Authentication successful, redirect to dashboard or desired page
        return redirect('/dashboard');
    }

    // Authentication failed, redirect back with error message
    return redirect()->back()->withInput()->withErrors(['email','password' => 'Invalid credentials']);
}

    // public function aboutus(){
    //     return view('aboutus');
    // }
}

<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

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
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Attempt to log the user in
        if (auth()->attempt($credentials)) {
            // Authentication successful, redirect to dashboard or desired page
                return redirect()->route('dashboard');
    
        }else{
        // Authentication failed, redirect back with error message
        return redirect()->back()->withInput()->withErrors(['email','password' => 'Invalid credentials']);
        }
    }

    // Validate the login request
    
    // }
}

<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function form(){
        return view('login');
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

    public function logout(Request $request)

    {
        // if(Session::has('email')){
        //     Session::pull('email');
        // }
        Session()->flush();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
        

    
}

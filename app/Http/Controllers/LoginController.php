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
        if($credentials){
           
             // Attempt to log the user in
        if (auth()->attempt($credentials)) {

            Session()->put('email', $credentials);
            Session()->put('password', $credentials);
            // Authentication successful, redirect to dashboard or desired page
                return redirect()->route('dashboard');
    
        }
        }
    
       else{
        // Authentication failed, redirect back with error message
        return redirect()->back()->withInput()->withErrors(['email','password' => 'Invalid credentials']);
        }
    }

    public function logout():RedirectResponse

    {
        // if(Session::has('email')){
        //     Session::pull('email');
        // }
        Session()->forget('email');
        Session()->forget('password');
        Auth::logout();

        return redirect('login');
    }
        

    
}

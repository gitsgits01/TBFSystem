<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Redirect;

class DashboardController extends Controller
{
    
    
    public function __invoke()
    {
        if(Auth::check())
        {
            return view('dashboard');
        }
        else{
            return redirect()->route('login')->withSuccess('Login first');
        }
        
        
        // // Authorize the "update" ability for the current user on the given post
        // $this->authorize('update', $post);
    
        // // Update the post
        // $post->update($request->all());
    
        // return redirect()->route('posts.index');
    }
    public function crepost(){
        return view('create_post');
    }
    
    
}

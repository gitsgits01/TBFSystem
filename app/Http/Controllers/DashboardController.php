<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    
    public function __invoke()
    {
        return view('dashbord');
        // // Authorize the "update" ability for the current user on the given post
        // $this->authorize('update', $post);
    
        // // Update the post
        // $post->update($request->all());
    
        // return redirect()->route('posts.index');
    }
    
    
}

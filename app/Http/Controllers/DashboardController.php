<?php

namespace App\Http\Controllers;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Redirect;
use App\Http\Requests;
use App\Models\Post;
use App\Models\User;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestPayloadValueResolver;

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
    public function crepost(Request $request)
    {   
        $user=Auth::user();
        $userid=$user->id;
        $username=$user->name;

        $post = new Post;
        $post->title = $request->title;
        $post->user_id=$userid;
        $post->user_name=$username;
        // $image=$request->image;
        // $name=$image->getClientOriginalName();
        // $image->storeAs('public/uploadedpost',$name);
        // $post->image = $name;

        $image=time().'.'.$request->image->extension();
        $request->image->move(public_path('uploadedpost'),$image);
        $path="/uploadedpost/".$image;
        $post->image=$path;
        $post->save();
        return redirect()->route('dashboard')->with('success','Post Created');
    }
    public function chatify(){
        return view('chatify');
    }

    public function userprofile(){
        $user=Auth::user();
        $userid=$user->id;
        $username=$user->name;
        $data=Post::where('user_id','=',$userid)->get();
        $schedule=Schedule::where('user_id','=',$userid)->get();
        return view('userprofile',compact('data','schedule'));

    }
    
    public function search(Request $requeest)
    {
        $search=$request['search'] ?? "";
        if($search !=""){
            $user=User::where('name','=',$search)->get();
        }
        else{
            //return redirect()->back()->with('search','not found');
            $user=User::all();
        }
        // $data=compact('user','search');
        return view('search',compact('user','search'));
    }
}



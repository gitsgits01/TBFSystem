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

        // $user = Auth::user();
        // $posts=Post::where('user_id, $userid')->latest()->get();
        // $schedules=Schedule::where('user_id,$userid')->latest()->get();
        // return view("dashboard",compact('posts','schedules'));
        // if(Auth::guest())
        // {
        //     $user=Auth::user();
        //     $userid=$user->id;
        //     $username=$user->name;
        //     $data=Post::where('user_id','=',$userid)->get();
        //     $schedule=Schedule::where('user_id','=',$userid)->get();
        //     return view('dashboard',compact('data','schedule'));
        //     // return view('dashboard');
        // }
        // else{
        //     return redirect()->route('login')->withSuccess('Login first');
        // }
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

    
    public function search(Request $request)
    {
        $search=$request['search'] ?? "";
        if($search !=""){
            $user=User::where('name','LIKE',"%$search%")->get();
        }
        else{
            //return redirect()->back()->with('search','not found');
            $user=User::all();
        }
        // $data=compact('user','search');
        return view('search',compact('user','search'));
    }

    public function userprofileshow($id){
        $user=User::find($id);
        // $userid=$user->id;
        // $username=$user->name;
        // $data=Post::where('user_id','=',$userid)->get();
        // $schedule=Schedule::where('user_id','=',$userid)->get();
        if(!$user){
            abort('not found');
        }
        return view('userprofileshow', compact('user'));

    }

    public function showTimeline(){
        $posts=Post::all();
        $schedule=Schedule::all();
        return view('dashboard',compact('posts','schedule'));
    }

}




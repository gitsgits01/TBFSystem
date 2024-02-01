<?php

namespace App\Http\Controllers;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Redirect;
use App\Http\Requests;
use App\Models\Destination;
use App\Models\Post;
use App\Models\User;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestPayloadValueResolver;

class DashboardController extends Controller
{
    
    
    public function __invoke()
    {
        if(Auth::check())
        {
            $user=Auth::user();
            $userid=$user->id;
            $username=$user->name;
            $data=Post::where('user_id','=',$userid)->get();
            $schedule=Schedule::where('user_id','=',$userid)->get();
            return view('dashboard',compact('data','schedule'));
            // return view('dashboard');
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

    // public function userprofileshow($id){
    //     $userid=User::find($id); // Get the 'id' parameter from the request
    //     $user=User::where('id','=',$userid)->get();
    //      // Use find instead of where to get a single user by ID
    //     //dd($user);
    //     $posts = Post::where('user_id', '=', $userid)->get();
    //     $schedules = Schedule::where('user_id', '=', $userid)->get();
    
    //     return view('userprofileshow', compact('user', 'posts', 'schedules'));

    // }

    public function userprofileshow(Request $request){
        $userId = $request->get('id'); // Get the 'id' parameter from the request

        $user = User::find($userId); // Use find instead of where to get a single user by ID
        //dd($user);
        $posts = Post::where('user_id', '=', $userId)->get();
        $schedules = Schedule::where('user_id', '=', $userId)->get();
    
        return view('userprofileshow', compact('user', 'posts', 'schedules'));

    }

    public function showTimeline(){
        $posts=Post::all();
        $schedule=Schedule::all();
        return view('dashboard',compact('posts','schedule'));
    }

    public function addDestination(Request $request){
        $user=Auth::user();
        $userid=$user->id;
        $username=$user->name;
        
        $destination = new Destination;
        $destination->Place = $request->place;
        $destination->user_id=$userid;
        $destination->user_name=$username;
        $destination->save();
        return redirect()->route('dashboard')->with('success',"Successfully added");
    }
}




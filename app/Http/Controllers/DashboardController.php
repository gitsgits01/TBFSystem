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
use App\Models\Follower;
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
        $data=Post::where('user_id','=',$userid)->orderBy('created_at', 'desc')->get();
        $schedule=Schedule::where('user_id','=',$userid)->orderBy('created_at', 'desc')->get();

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

    public function userprofileshow($id) {
        $user = User::find($id);
        
        if(!$user) {
            return redirect()->route('dashboard')->with('error', 'User not found');
        }
    
        // Retrieve posts and schedules only if $user is not null
        $posts = $user->posts()->get(); // Retrieve posts related to the user
        $schedules = $user->schedules()->get(); // Retrieve schedules related to the user
        
    
        return view('userprofileshow', [
            'user' => $user,
            'posts' => $posts,
            'schedules' => $schedules,
            // 'isFollowing' => $isFollowing
        ]
        );
    }
    

    // public function userprofileshow(Request $request){
    //     $userId = $request->get('id'); // Get the 'id' parameter from the request

    //     $user = User::find($userId); // Use find instead of where to get a single user by ID
    //     //dd($user);
    //     $posts = Post::where('user_id', '=', $userId)->get();
    //     $schedules = Schedule::where('user_id', '=', $userId)->get();
    
    //     return view('userprofileshow', compact('user', 'posts', 'schedules'));

    // }

    public function showTimeline(Request $request){
        
        $posts = Post::orderBy('created_at', 'desc')->get();
        $schedule = Schedule::orderBy('created_at', 'desc')->get();

        // $posts=Post::all();
        // $schedule=Schedule::all();
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
        $user->User::getDestinations()->attach($destination->id);
        return redirect()->route('dashboard')->with('success',"Successfully added");
    }
}



 // $p_id = $user->id;

        // // Get posts related to the user
        // $posts = Post::where('user_id', $p_id)->get();

        // // Get schedules related to the user
        // $schedules = Schedule::where('user_id', $p_id)->get();
        // $posts = $user->posts;
        // $schedules = $user->schedules;
        // // $p_id=$user->pluck('id');
        // // $posts=Post::select('id')->where('id','=',$p_id)->get();
        // // $schedules=Schedule::select('id')->where('id','=',$p_id)->get();
<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ScheduleController extends Controller
{
    public function schedule(){
        return view('schedule');
    }
    public function store(Request $request){
        $user=Auth::user();
        $userid=$user->id;
        $username=$user->name;
       
        $posts=Schedule::create([
            'location'=>$request['location'],
            'destination'=>$request['destination'],
            'date'=>$request['date'],
            'days'=>$request['days'],
            'user_id'=> $userid,
            'user_name'=>$username,
           
        ]);
        //$user=new User($request->all());
          $posts->save();
    return redirect()->route('dashboard')->with('success','Post Created');
       
    }
    // public function postDelete(Post $post){
    //     $post=Post::find('id');
    //     //$post->delete();
    //     if($post){
    //         $post->delete();
    //         return redirect()->back()->with('success','Post Deleted.');
    //     }
    //     else{
    //         return redirect()->back()->with('error','Error occured.');
 
    //     }
    //     //return redirect()->back()->with('success','Post Deleted.');
    // }

    public function postDelete($id){
        $post=Post::find($id);
        if(!$post){
            return redirect()->back()->with('error','POst not found');
        }
        if(Auth::id() !== $post->user_id){
            return redirect()->back()->with('error','Unauthorized access');
        }
        $post->delete();
        return redirect()->back()->with('success','Post Deleted.');

    }


    public function scheduleDelete($id){
       $schedule=Schedule::find($id);
       if(!$schedule){
        return redirect()->back()->with('error','Schedule not found');
    }
    if(Auth::id() !== $schedule->user_id){
        return redirect()->back()->with('error','Unauthorized access');
    }
    $schedule->delete();
    return redirect()->back()->with('success','Schedule Deleted.');
    
    }

    

}

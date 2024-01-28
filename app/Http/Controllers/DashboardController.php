<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Redirect;
use App\Http\Requests;
use App\Models\Post;
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
        $post->description = $request->description;
        $post->user_id=$userid;
        $post->user_name=$username;
        $image=$post->image;
        if($request['image']){
                    $imagename=time().'.'.$request['image']->getClientOriginalExtension();
                    $request->image->move('postimage',$imagename);
                    $post->image= $imagename;
                } 
        // $post=Post::create([
        //     'title'=>$request['title'],
        //     'description'=>$request['description'],
        //     'user_id'=>$userid,
        //    'user_name'=>$username,

        //     'image'=>$request['image']
        //     if($request['image']){
        //         $imagename=time().'.'.$request['image']->getClientOriginalExtension();
        //         $request->image->move('postimage',$imagename);
        //         $post->image= $imagename;
        //     } 
           
        //     $request->validate([
        //         'image'=>['required','jpeg','png'],
        //     ])
        //     ]);
        $post->save();

        
        return redirect()->route('dashboard')->with('success','Post Created');

        
        // return view('create_post');
    }
    public function chatify(){
        return view('chatify');
    }
    
    public function userprofile(){
        return view('userprofile');
    }
}

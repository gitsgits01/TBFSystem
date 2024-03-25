<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use Illuminate\Http\Request;
use App\Models\User;

class FollowerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' =>'required',
        ]);
            $user = $request->user();
            $follower = Follower::where('user_id',$request->user_id)
                                ->where('following_id',$user->id)
                                ->first();
            if(!$follower)
                {
                    $follower = new Follower();
                    $follower->user_id=$request->user_id;
                    $follower->following_id=$request->user->id;
                        if($follower->save())
                            {
                                return redirect()->back()->with('message','Following user');
                            }else{
                                if($follower->delete())
                                {
                                    return redirect ()->back()->with('message','Unfollowed User');
                                }                   
            
                                }               
            
                }
            
    }

    /**
     * Display the specified resource.
     */
    public function show(Follower $follower)
    {
        $user = auth()->user(); // Get the currently authenticated user
        $followers = $user->followers; // Retrieve the followers of the user

        return view('userprofile', compact('followers'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Follower $follower)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Follower $follower)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Follower $follower)
    {
        //
    }

    public function showFollowings()
    {
        $user = auth()->user(); // Get the currently authenticated user
        $followings = $user->followings; // Retrieve the followings of the user

        return view('userprofile', compact('followings'));
    }

}

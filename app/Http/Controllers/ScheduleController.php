<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
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

}

<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function schedule(){
        return view('schedule');
    }
    public function store(Request $request){
        $posts=Schedule::create([
            'location'=>$request['location'],
            'destination'=>$request['destination'],
            'date'=>$request['date'],
            'days'=>$request['days']
        ]);
        //$user=new User($request->all());
          $posts->save();
    return redirect()->route('dashboard')->with('success','Post Created');
       
    }
    public function show(){
        $posts=Schedule::latest()->get();
        return view('scheduleshow',['posts'=>$posts]);

}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

class TravelController extends Controller
{
    public function recommendUser(Request $request){

        $user=Auth::user();
        $userid=$user->id;

        $latest_schedule=Schedule::where('user_id','=',$userid)->orderBy('created_at', 'desc')->first();
        $destination=$latest_schedule->destination;
        //$destination_date=$latest_schedule->date;

        $today=date("d/m/y");

        $schedule = Schedule::where('destination','=',$destination)
        ->where('user_id','!=',$userid)
        ->where('date','<',$today)
        ->orderBy('created_at', 'desc')->get();
    
        if($schedule->isEmpty()){

            return view('notification') -> with('Error', 'No schedules found with same destination.');
        }
        

        return view('notification', compact('schedule'));

    }
}

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
        $destination_date=$latest_schedule->date;

        $schedule = Schedule::where('destination','=',$destination)->orderBy('created_at', 'desc')->get();
        // $date_range = [
        //     Carbon::parse($destination_date)->subDays(7), // Example: 7 days before the destination date
        //     Carbon::parse($destination_date)->addDays(7)   // Example: 7 days after the destination date
        // ];
        if($schedule->isEmpty()){

            return view('notification') -> with('Error', 'No schedules found with same destination.');
        }

        return view('notification', compact('schedule'));

    }
}

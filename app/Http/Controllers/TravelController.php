<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;

class TravelController extends Controller
{
    public function recommendUser(Request $request){
        $destination = $request['destination']??"";
        $destination_date=$request['date']??"";
        // if($destination == ""){
        //     return view('notification') -> with('Error');
        // }
        $search = Schedule::where("destination","=",$destination)->get();

        return view('notification', compact('search'));

    }
}

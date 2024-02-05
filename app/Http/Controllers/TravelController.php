<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;

class TravelController extends Controller
{
    public function recommenduser(Request $request){
        $destination = $request['destination']??"";
        $destination_date=$request['date']??"";
        if($destination != ""){
            $search = Schedule::where("destination","=",$destination)->get();
            
        }

    }
}

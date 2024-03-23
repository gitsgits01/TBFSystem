<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\User;

class TravelController extends Controller
{
    public function recommendUser(Request $request){
        $schedule = Schedule::orderBy('created_at', 'desc')->get();
        return view('notification',compact('schedule'));
    }
}

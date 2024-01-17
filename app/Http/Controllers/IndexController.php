<!-- page for checking different backgrounimages popup itself but not implemented -->
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller

{
    
    public function index(){
        $backgroundImages=[
            'photos/backg1.jpg',
            'photos/back2.jpg',
            'photos/back3.jpg',
         
        ];
        return view('index',compact('backgroundImages'));
    }
    //
}

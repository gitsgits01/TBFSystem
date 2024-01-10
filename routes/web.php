<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/sigup',[SignupController::class,'form'])->name('signup');
Route::post('/signup',[SignupController::class,'signup'])->name('signup.store');
Route::get('/login',[LoginController::class,'form'])->name('login');
//Route::get('/about',[LoginController::class,'aboutus'])->name('aboutus');

// Route::get('/aboutus',function(){
//     return view('aboutus');
// });
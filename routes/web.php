<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use App\Models\User;

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
// Route::get('/home', function () {
//     return view('index');
// })->name('home');
// Route::get('/home',[SignupController::class,'home'])->name('home');

Route::get('/sigup',[SignupController::class,'form'])->name('signup');
Route::post('/signup',[SignupController::class,'signup'])->name('signup.store');
Route::get('/login',[LoginController::class,'form'])->name('login');





Route::post('/signup',function(){
     $user= new User();
     $user->name = request('name');
     $user->email = request('email');
     $user->address = request('address');
     $user->dob = request('dob');
     $user->gender = request('gender');
     $user->password = request('password');
     $user->save();
 });
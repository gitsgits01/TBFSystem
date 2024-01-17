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
})->name('cancel');


// Route::get('/profile', function () {
//     return view('userprofile');
// });

Route::group(['middleware'=>'guest'],function(){
Route::get('/sigup',[SignupController::class,'form'])->name('signup');
Route::post('/signup',[SignupController::class,'store'])->name('signup.store');
Route::get('/login',[LoginController::class,'form'])->name('login');
Route::post('/login',[LoginController::class,'login'])->name('login'); //baki xa banauna 
});

Route::group(['middleware'=>'auth'],function(){
Route::get('/logout', [LoginController::class, 'logout'])->name('logout'); //this too

});

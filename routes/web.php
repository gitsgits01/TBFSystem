<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MessageController;
use Illuminate\Auth\Events\Login;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
// use App\Http\Controllers\IndexController;
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


// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

// Route::get('/',[IndexController::class,'index']);

Route::group(['middleware'=>'guest'],function(){
Route::get('/sigup',[SignupController::class,'form'])->name('signup');
Route::post('/signup',[SignupController::class,'store'])->name('signup.store');
Route::get('/login',[LoginController::class,'form'])->name('login');
Route::post('/login',[LoginController::class, 'login'])->name('login.store');
});
Route::get('/dashboard',DashboardController::class,'__invoke')->name('dashboard');


Route::group(['middleware'=>'auth'],function(){
    // Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

});

Route::middleware(['auth'])->group(function () {
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
});


// Route::post('/signup',function(){
//     $user= new User();
//     $user->name = request('name');
//     $user->email = request('email');
//     $user->address = request('address');
//     $user->dob = request('dob');
//     $user->gender = request('gender');
//     $user->password = request('password');
//     $user->save();
// });
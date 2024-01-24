<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\LogoutController;
use Illuminate\Auth\Events\Login;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use app\Http\Controllers\Auth;
use App\Http\Controllers\ScheduleController;
use  App\Http\Middleware;
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



// Route::get('/',[IndexController::class,'index']);

Route::group(['middleware'=>'guest'],function(){
Route::get('/signup',[SignupController::class,'form'])->name('signup');
Route::post('/signup',[SignupController::class,'store'])->name('signup.store');
Route::get('/login',[LoginController::class,'form'])->name('login');
Route::post('/login',[LoginController::class, 'login'])->name('login.store');
});
//Route::get('/dashboard',DashboardController::class,'__invoke')->name('dashboard');


Route::group(['middleware'=>'web'],function(){

    Route::get('/dashboard',DashboardController::class.'@__invoke')->name('dashboard');
    //Route::get('/create-post',DashboardController::class,'crepost')->name('create-post');
    Route::get('/logout', [LoginController::class,'logout'])->name('logout');
    Route::get('/schedule', [ScheduleController::class,'schedule'])->name('schedule');
});
Route::middleware(['auth'])->group(function () {
    
    Route::post('/send-message',[ChatController::class, 'sendMessage']);
    Route::get('/dashboard',DashboardController::class.'@__invoke')->name('dashboard');

    // Route::get('/message', [MessageController::class, 'index'])->name('message.index');
    // Route::get('/message/{userId}', [MessageController::class, 'show'])->name('message.show');
    // Route::post('/message', [MessageController::class, 'store'])->name('message.store');
    

});
Route::resource('schedules','ScheduleController');



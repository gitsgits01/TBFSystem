<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Events\Login;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use app\Http\Controllers\Auth;
use App\Http\Controllers\ScheduleController;
use  App\Http\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
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



Route::group(['middleware'=>'auth'],function(){
    Route::get('/schedule', [ScheduleController::class,'schedule'])->name('schedule');
    Route::get('/schedule/create',[ScheduleController::class,'create'])->name('schedule.create');
    Route::post('/schedule',[ScheduleController::class,'store'])->name('schedule.store');
    Route::get('/Schedules',[ScheduleController::class,'show'])->name('show');

    Route::get('/dashboard',DashboardController::class.'@__invoke')->name('dashboard');
    Route::get('/dashboard/userprofile',[DashboardController::class,'userprofile'])->name('userprofile');

    Route::get('/logout', [LoginController::class,'logout'])->name('logout');
    //Route::get('/create_post', [DashBoardController::class,'post'] );
    Route::post('/create_post', [DashboardController::class,'crepost'])->name('create_post');

    Route::get('/changepassword',[UserController::class,'changePassword'] )->name('changepassword');
    Route::post('/updatepassword', [UserController::class,'updatePassword'])->name('updatepassword');

   Route::get('/confirm-deletion',[UserController::class,'confirm_deletion'])->name('confirm_deletion');
   Route::post('/account/delete',[UserController::class,'delete'])->name('delete.account');
});
Route::middleware(['auth'])->group(function () {
    
    Route::post('/send-message',[ChatController::class, 'sendMessage']);
    Route::get('/dashboard',DashboardController::class.'@__invoke')->name('dashboard');
    // Route::get('/chatify',DashboardController::class.'@chatify')->name('Chatify');

    // Route::get('/message', [MessageController::class, 'index'])->name('message.index');
    // Route::get('/message/{userId}', [MessageController::class, 'show'])->name('message.show');
    // Route::post('/message', [MessageController::class, 'store'])->name('message.store');
    

});
//Route::get('/reset', [UserController::class,'resetPassword'])->name('reset');

//Reset the password
Route::get('/forgot-password', function () {
    return view('resetpassword');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
 
    $status = Password::sendResetLink(
        $request->only('email')
    );
 
    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
         $users = User::where('id', '!=', $user->id)->get();
         //dd($users);
        $conversations = Message::getUserConversations($user->id);
        // $receivedMessages = Message::where('receiver_id', $user->id)->get();
        // $sentMessages = Message::where('sender_id', $user->id)->get();

        return view('message', compact('users','conversations'));
    }

    
    public function show($userId)
    {
        // Retrieve the conversation between the logged-in user and the specified user
        $conversation = Message::getUserConversations(Auth::id(), $userId);

        return view('messageshow', compact('conversation'));
    }

    public function store(Request $request)
    {
        // Check if the user is authenticated
    if (Auth::check()) {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required',
        ]);
        
        Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Message sent successfully!');
    } else {
        // Handle the case when the user is not authenticated
        // Redirect to login or handle it according to your application logic
        return redirect()->route('login')->with('error', 'Please log in to send messages.');
    }
    }
}

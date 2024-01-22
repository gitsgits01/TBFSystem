<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return view('chat');
    }

    public function sendMessage(Request $request)
    {
        $message = $request->input('message');

        // Broadcast the message to a "chat" channel
        broadcast(new \App\Events\ChatMessage($message));

        return response()->json(['status' => 'Message sent']);
    }
}

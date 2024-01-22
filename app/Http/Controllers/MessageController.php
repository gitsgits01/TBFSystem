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

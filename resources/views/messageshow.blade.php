@extends('message')

@section('content')
    <h1>Message Conversation</h1>

    <div>
    <h2>Conversation with {{ $name }}</h2>

    @foreach ($conversation->messages as $message)
        <p>
            {{ $message->sender->name }} ({{ $message->created_at }}):<br>
            {{ $message->message }}
        </p>
    @endforeach

    <!-- Form to send a new message -->
    <form action="{{ route('message.store') }}" method="post">
        @csrf
        <input type="hidden" name="receiver_id" value="{{ $conversation->sender->id === Auth::id() ? $conversation->receiver->id : $conversation->sender->id }}">       
        <label for="message">Message:</label>
        <textarea name="message" id="message" rows="4" cols="50"></textarea>
        <br>
        <button type="submit">Send</button>
    </form>
    </div>

@endsection

@extends('dashbord')

@section('content')
    <h1>Messages</h1>

    <!-- Display received messages -->
    <h2>Received Messages</h2>
    @foreach ($receivedMessages as $message)
        <p>From: {{ $message->sender->name }} - {{ $message->created_at }}<br>{{ $message->message }}</p>
    @endforeach

    <!-- Display sent messages -->
    <h2>Sent Messages</h2>
    @foreach ($sentMessages as $message)
        <p>To: {{ $message->receiver->name }} - {{ $message->created_at }}<br>{{ $message->message }}</p>
    @endforeach

    <!-- Form to send a new message -->
    <h2>Send a Message</h2>
    <form action="{{ route('messages.store') }}" method="post">
        @csrf
        <label for="receiver_id">To:</label>
        <select name="receiver_id" id="receiver_id">
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        <br>
        <label for="message">Message:</label>
        <textarea name="message" id="message" rows="4" cols="50"></textarea>
        <br>
        <button type="submit">Send Message</button>
    </form>
@endsection

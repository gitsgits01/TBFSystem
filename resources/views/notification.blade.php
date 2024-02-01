
@section('content')
    <h1>Matching Trips</h1>

    @foreach($recommendedUsers as $user)
        <p>User: {{ $user->user->name }}, Destination: {{ $user->destination }}, Departure Date: {{ $user->departure_date }}</p>
    @endforeach
@endsection
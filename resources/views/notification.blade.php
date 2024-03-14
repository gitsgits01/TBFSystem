
{{-- @extends('dashboard') --}}
@section('content')
<div class="container">
    <h1>Suggested Users</h1>
    @csrf
    @if($search !="")
        <ul>
            @foreach($search as $suggestedUser)
                <li>{{ $suggestedUser->name }} can be your travel buddy</li>
                <!-- Display other suggested user details as needed -->
            @endforeach
        </ul>
    @else
        <p>No suggested users at the moment.</p>
    @endif
</div>

@endsection
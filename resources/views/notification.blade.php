
{{-- @extends('dashboard') --}}
@section('content')
<div class="container">
    <h1>Suggested Users</h1>

    @if($topSimilarUsers > 0)
        <ul>
            @foreach($topSimilarUsers as $suggestedUser)
                <li>{{ $suggestedUser->name }}</li>
                <!-- Display other suggested user details as needed -->
            @endforeach
        </ul>
    @else
        <p>No suggested users at the moment.</p>
    @endif
</div>

@endsection
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Suggested Users</title>
    <style>
        ul a{
            text-decoration: none;
            
        }
        a:hover{
            color: cornflowerblue;
        }
        
    </style>
</head>
<body>
    <div class="container">
        @csrf
        @if(isset($schedule))
            <ul>
                @foreach($schedule as $suggestedUser)
                   <a href="{{route('profile', $suggestedUser->user_id)}}"><b> {{ $suggestedUser->user_name}}</b></a> can be your travel buddy to <b>{{$suggestedUser->destination}}</b><br/>
                    <!-- Display other suggested user details as needed -->
                @endforeach
            </ul>
        @else
            <p>No suggested users at the moment.</p>
        @endif
    </div>
</body>
</html>
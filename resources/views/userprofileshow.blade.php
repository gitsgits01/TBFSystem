<!doctype html>
<html lang="en">
  <head>
    <title>{{$user->name}}'s Profile </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="stylesheet" href="{{asset('css/user.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="profile-container">
        {{-- <i class="fa-solid fa-user"></i> --}}
        
      
        <div class="user-details">
           
            <p>{{$user->name}}</p> 
            <p>{{$user->dob}}</p>
            <a href="{{route('dashboard')}}">Dashboard</a>
        </div>
    </div>
    <div class="tdata">
     @foreach($user as $user)
      <div class="timeline">
        <p class="username">{{Auth::user()->name}}&nbsp;created a post.
        </p>
        <p class="post-title">{{Auth::user()->title}}</p>
        <div class="post-img"><img src="{{asset($user->image)}}"></div>
      </div>
      @endforeach
      {{-- @foreach($schedule as $schedule)
      <div class="timeline">
        <p class="username">{{$user()->name}}&nbsp;Scheduled a travel.<i class="fa-solid fa-circle-exclamation"></i></p>
        <p class="location">Location:{{$schedule->location}}</p>
        <p class="destination">Destination:{{$schedule->destination}}</p>
        <p class="date">Date:{{$schedule->date}}</p>
        <p class="days">Number of Days:{{$schedule->days}}</p>

      </div>
      @endforeach --}}
    </div>
  
    
        <script src="{{asset('js/dashboard.js')}}"></script>

    
  </body>
</html>
<!doctype html>
<html lang="en">
  <head>
    <title>User Profile</title>
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
            @if(Auth::check())
            <p>{{Auth::user()->name}}</p>
            <p>{{Auth::user()->email}} <p>
            <p> {{Auth::user()->dob}}&nbsp; &nbsp;{{Auth::user()->gender}} </p>  
            <a href="{{route('dashboard')}}">Dashboard</a>

            @endif
        </div>
    </div>
    <div class="tdata">
      <!--Sessions-->
      
    @if(Session::has('success'))
      <script>alert("{{Session::get('success')}}");</script>
    @endif
     @foreach($data as $data)
      <div class="timeline">
        <p class="username">{{Auth::user()->name}}&nbsp;created a post.&nbsp;&nbsp;&nbsp; <a  onclick="return confirm('Are you sure you want to delete this?')" href="{{route('postdelete',$data->id)}}" class="btn btn-danger btn-sm">Delete</a>
      
        </p>
        
        <p class="post-title">{{$data->title}}</p>
        <div class="post-img"><img src="{{asset($data->image)}}"></div>
      </div>
      @endforeach
      @foreach($schedule as $schedule)
      <div class="timeline">
        <p class="username">{{Auth::user()->name}}&nbsp;Scheduled a travel.&nbsp;&nbsp; <a onclick="return confirm('Are you sure you want to delete this?')" href="{{route('scheduledelete',$schedule->id)}}" class="btn btn-danger btn-sm">Delete </a>
        </p>
        <p class="location">Location:{{$schedule->location}}</p>
        <p class="destination">Destination:{{$schedule->destination}}</p>
        <p class="date">Date:{{$schedule->date}}</p>
        <p class="days">Number of Days:{{$schedule->days}}</p>

      </div>
      @endforeach
    </div>
    
  
    
        {{-- <div class="additional-info" id="additionalInfo">
            <p>Bio: </p>
            <p>Age: 25</p>
            <p>Interests: Reading, Traveling</p>
        </div>
        <textarea placeholder="whats on your mind"></textarea>
        <button class="toggle-button" onclick="toggleAdditionalInfo()">Show Additional Info</button> --}}
    
        <script src="{{asset('js/dashboard.js')}}"></script>

    
  </body>
</html>
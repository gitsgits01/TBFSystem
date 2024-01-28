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
        <i class="fa-solid fa-user"></i>
        <div class="user-details">
            @if(Auth::check())
            <p>{{Auth::user()->name}}</p>
            <p>{{Auth::user()->email}} <p>
            <p> {{Auth::user()->dob}}&nbsp; &nbsp;{{Auth::user()->gender}} </p>  
            <a href="{{route('dashboard')}}">Dashboard</a>

            @endif
        </div>
      </div>
    
        {{-- <div class="additional-info" id="additionalInfo">
            <p>Bio: </p>
            <p>Age: 25</p>
            <p>Interests: Reading, Traveling</p>
        </div>
        <textarea placeholder="whats on your mind"></textarea>
        <button class="toggle-button" onclick="toggleAdditionalInfo()">Show Additional Info</button> --}}
    
    <script src="{{asset('js/aboutus.js')}}">
    </script>
    
  </body>
</html>
<!doctype html>
<html lang="en">
  <head>
    <title>User Dashboard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places&callback=initMap" async defer></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    @csrf
    <div id="left-sidebar">
      <div class="nav-list">
        <div id="travel">
          TRAVEL <i class="fa-solid fa-people-group"></i> TOGETHER 
        </div>
        <div class="item-list">
          
            <div class="items"><i class="fa-solid fa-braille"></i>Dashboard</div>
            <div class="items"><a href="{{route('schedule')}}"><i class="fa-regular fa-calendar-days"></i>Schedule</a></div>
            <div class="items"><i class="fa-solid fa-message fa-beat"></i>Message</div>
            <div class="items"><a href="{{route('changepassword')}}"><i class="fa-solid fa-gears"></i>Settings</a></div>
            <div class="items"><a href="{{route('logout')}}"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></div>
  
          </ul>
        </div>
      </div>
    </div>
    <div id="main-content">
      <div class="hello">
        @if(Auth::check())
        <p>Hello, {{Auth::user()->name}}</p>
        @endif
        <form action="" method="get">
          <input type="text" name="search" placeholder="Search...">
          <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
      </div>
      
    </div>

    <div id="right-sidebar">
      <div class="profile">
       <h4>Create Post</h4>
       <form  action="{{route('create_post')}}" method="post">
        @csrf
        <textarea name="title" placeholder="What's on your mind?"></textarea>
        <input type="file" name="image">
        <button  type="submit"  class="btn btn-lg btn-success" style="width: 15px"> Post </button>
        {{-- <div class="create-post">
            <label>Title</label>
            <input type="text" name="title">
        </div>
        <div>
            <label>Description</label>
            <textarea  name="description"></textarea>
        </div>
         <div>
            <label>AddImage</label>
            <input type="file" name="image">
        </div>
        <div>
            <input type="submit" value="Post">
        </div> --}}
    </form>
      </div>
      <div>
        <h4>Navigation</h4>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3593955.613923965!2d84.13015055000002!3d28.397455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3995e8c77d2e68cf%3A0x34a29abcd0cc86de!2sNepal!5e0!3m2!1sen!2snp!4v1705989742345!5m2!1sen!2snp" 
      width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      {{-- @section('content')
    <div id="map" style="height: 400px;"></div>
    <script>
      function initMap() {
          // Create a map centered at a specific location (e.g., Kathmandu, Nepal)
          var map = new google.maps.Map(document.getElementById('map'), {
              center: { lat: 27.7172, lng: 85.3240 }, // Replace with the coordinates of your desired center
              zoom: 8, // Adjust the zoom level as needed
          });
      }
    </script>
    @endsection --}}

    </div>
    
    
    
  </body>
</html>
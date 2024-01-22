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
    <div class="nav-list">
      <div id="travel">
        TRAVEL <i class="fa-solid fa-people-group"></i> TOGETHER 
      </div>
      <div class="item-list">
        <ul>
          <li><i class="fa-solid fa-braille"></i>Dashboard</li>
          <li><i class="fa-regular fa-calendar-days"></i>Schedule</li>
          <li><i class="fa-solid fa-message fa-beat"></i>Message</li>
          <li><i class="fa-solid fa-gears"></i>Settings</li>
          <li><a href="#messagePlace"><i class="fa-light fa-right-from-bracket"></i>Logout</a></li>

        </ul>
      </div>
    </div>

    <div class="hello">
      @if(Auth::check())
      <p>Hello, {{Auth::user()->name}}</p>
      @endif
    </div>

    <!--Map section-->
    @section('content')
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
    @endsection
    
  </body>
</html>
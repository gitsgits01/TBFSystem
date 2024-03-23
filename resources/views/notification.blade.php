<!doctype html>
<html lang="en">
  <head>
    <title>Notifications</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('css/notifications.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    @csrf
    <div class="container">
    <h1>Suggested Users</h1>
    @csrf
    @foreach($schedule as $schedule)
    <div>
    <p><a href="{{ route('profile' ,$schedule->user_id) }}">{{$schedule->user_name}}</a> Can be your next travel partner.</p> 
    </div>
    @endforeach
    </div>
  </body>
</html>
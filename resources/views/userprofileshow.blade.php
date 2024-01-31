@extends('dashboard')
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
    <div class="tdata">
     @foreach($posts as $post)
      <div class="timeline">
        <p class="username">{{$post->user->name}}&nbsp;created a post.
        </p>
        <p class="post-title">{{$post->title}}</p>
        <div class="post-img"><img src="{{asset($post->image)}}"></div>
      </div>
      @endforeach
      @foreach($schedules as $schedule)
      <div class="timeline">
        <p class="username">{{$schedule->name}}&nbsp;Scheduled a travel.&nbsp;&nbsp;&nbsp;&nbsp;
        <a onclick="return confirm('Are you sure you want to Join ?')"href="{{url('chatify{id}',$user->id)}}" class="btn btn-info btn-sm">Join</a>
        <p class="location">Location:{{$schedule->location}}</p>
        <p class="destination">Destination:{{$schedule->destination}}</p>
        <p class="date">Date:{{$schedule->date}}</p>
        <p class="days">Number of Days:{{$schedule->days}}</p>

      </div>
      @endforeach
    </div>
    @endif
    
        <script src="{{asset('js/dashboard.js')}}"></script>

    
  </body>
</html>
@extends('dashboard')
<!doctype html>
<html lang="en">
  <head>
    <title> Profile </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="stylesheet" href="{{asset('css/user.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    @csrf
    
    <div class="profile-container">
        {{-- <i class="fa-solid fa-user"></i> --}}
        
      
      <div class="user-details">
          @if($user)
          <p>{{$user->name}}  <button class="follow">
            <span class="msg-follow">Follow</span>
            <span class="msg-following">Following</span>
            <span class="msg-unfollow">Unfollow</span>
          </button></p> 
          <p>{{$user->email}}</p>
          <p><a href="{{url('chatify/'.$user->id)}}"><i class="fa-solid fa-message"></i>Message</a></p>
          <p><a href="{{route('dashboard')}}">Dashboard</a></p>
          @endif
      </div>
    </div>
    {{-- <div class="tdata">
      @if(!empty($posts))
      {{-- @php
      dd($posts);
      @endphp --}}
     @foreach($posts as $post)
      <div class="timeline">
        <p class="username">{{$post['user_name']}}&nbsp;created a post.</p>
        <p class="post-title">{{$post['title']}}</p>
        <div class="post-img"><img src="{{asset($post['image'])}}"></div>
      </div>
      @endforeach
      @endif
      @if(!empty($schedules))
      @foreach($schedules as $schedule)
      @php
      dd($schedules);
      @endphp
      <div class="timeline">
        <p class="username">{{$schedule['user_name']}}&nbsp;Scheduled a travel.</p>
        <p class="location">Location:{{$schedule['location']}}</p>
        <p class="destination">Destination:{{$schedule['destination']}}</p>
        <p class="date">Date:{{$schedule['date']}}</p>
        <p class="days">Number of Days:{{$schedule['days']}}</p>

      </div>
      @endforeach
      @endif
    </div> --}}
   
    
        <script src="{{asset('js/dashboard.js')}}"></script>

    
  </body>
</html>
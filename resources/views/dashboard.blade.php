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
          
            <div class="items"><a href="{{route('dashboard')}}"><i class="fa-solid fa-braille"></i>Dashboard</a></div>
            <div class="items"><a href="{{route('schedule')}}"><i class="fa-regular fa-calendar-days"></i>Schedule</a></div>
            <div class="items"><a href="{{route('chatify')}}"><i class="fa-solid fa-message fa-beat"></i>Message</a></div>

            <div class="dropdown"> 
              <p onclick="myFunction()" class="dropbtn" value="Settings"><i class="fa-solid fa-gears"></i>Settings</p>
              <div id="myDropdown" class="dropdown-content">
                <a href="{{route('changepassword')}}">Change Password</a>
                <a href="{{route('confirm_deletion')}}">Delete Account</a>
                <a href="{{route('userprofile')}}">Edit Profile</a>
                <a href="{{route('password.request')}}">Reset Password</a>

              </div>
            </div>           
            <div class="items"><a href="{{route('notification',Auth::user()->id)}}"><i class="fa-solid fa-bell"></i>Notification</a></div>
            <div class="items"><a href="{{route('hotel')}}"><i class="fa-solid fa-hotel"></i>Bookings</a></div>

           

            <div class="items"><a href="{{route('logout')}}"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></div>
        </div>
      </div>
    </div>

    <div class="main-container">
      <div class="search-container">
        <form action="{{route('search')}}" method="GET">
          <input type="text" placeholder="Search.." name="search" >
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
        <div>@include('search')</div>
      </div>
      <div class="tdata">

        {{-- @if(Session::has('success'))
        <p class="text-success">{{Session::get('success')}}</p>
        
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      
        @endif --}}
        
        
        
        
        @foreach($schedule as $schedule)
        <div class="timeline">
        <p class="username"><a href="{{ route('profile' ,$schedule->user_id) }}">{{$schedule->user_name}}</a>&nbsp;Scheduled a trip to {{$schedule->destination}} from {{$schedule->location}} &nbsp; on {{$schedule->date}}. &nbsp;</p> 
        <p><a onclick="return confirm('Are you sure you want to join this?')" href="{{url('chatify/'.$schedule->user_id)}}" class="btn btn-primary btn-sm">Join </a>
        </p>
        </div>
        @endforeach


        @foreach($post as $post)
        <div class="timeline">
        <p class="username"><a href="{{ route('profile' ,$post->user_id) }}">{{$post->user_name}}</a>&nbsp;created a post.&nbsp;&nbsp;&nbsp;</p>
        
        <p class="post-title">{{$post->title}}</p>
        <div class="post-img"><img src="{{asset($post->image)}}"></div>
        </div>
       @endforeach
      
      </div>
    </div>

    <div id="right-sidebar">
     <div class="userprofile">
        @if(Auth::check())
        <a href={{route('userprofile')}}>{{Auth::user()->name}}</a>
        @endif
     </div>
        <div class="profile">
       <h4>Create Post</h4>
       <form  action="{{route('create_post')}}" method="post" enctype="multipart/form-data">
        @csrf
        <textarea name="title" placeholder="What's on your mind?"></textarea>
        <input type="file" name="image">
        <input  type="submit"  class="btn btn-success" value="POST"> 
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

    </div>
    
    <script src="{{asset('js/dashboard.js')}}"></script>
    
  </body>
</html>
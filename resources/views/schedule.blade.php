<!doctype html>
<html lang="en">
  <head>
    <title>Schedule Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('css/schedule.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="body">
    <div class="post-container">

         <!--sessions-->
         @if(Session::has('error'))
         <p class="text-danger">{{Session::get('error')}}</p>
       @endif


    <form action="{{ route('schedule.store') }}" method="POST" class="schedule-post"> 

        @csrf
        @method('post')
        {{-- @if(Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif --}}
        <h3>Schedule</h3>
            <p>From:<input class="elements" type="text" name="location" placeholder="From" value="{{old('location')}}" required></p><br>
           <span class="input_error">
                @error('name')
                 {{$message}}
                @enderror
            </span>
            <p>Destination:<input class="elements" type="text" name="destination" placeholder="To" value="{{old('destination')}}"required></p><br>
           <span class="input_error">
              @error('destination')
               {{$message}}
              @enderror
            </span>    
        <p>Date:<input class="elements" type="date" name="date" placeholder="Date" value="{{old('date')}}" required></p><br>
            <span class="input_error">
              @error('date')
               {{$message}}
              @enderror
            </span>
        <p>Number of Days:<input class="elements" type="text" name="days" placeholder="Number of Days" value="{{old('days')}}" required></p><br>
            <span class="input_error">
                @error('password')
                {{$message}}
                @enderror
            </span>

        <button class="elements" type="submit"><a href="{{route('dashboard')}}">Cancel</a></button>
        <button class="elements" type="submit">Post</button>
        
    </form>
    </div>
  </body>
</html>
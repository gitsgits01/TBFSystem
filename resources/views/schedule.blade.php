<!doctype html>
<html lang="en">
  <head>
    <title>Schedule</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('css/signup.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="body">
    <div class="post-container">

         <!--sessions-->
         @if(Session::has('error'))
         <p class="text-danger">{{Session::get('error')}}</p>
       @endif


    <form action="{{ route('') }}" method="POST" class="schedule-form"> 

        @csrf
        @method('post')
        @if(Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        <h3>Schedule</h3>
            From:<input class="elements" type="text" name="location" placeholder="From" value="{{old('location')}}" required>
           <span class="input_error">
                @error('name')
                 {{$message}}
                @enderror
            </span>
            Destination:<input class="elements" type="email" name="destination" placeholder="To" value="{{old('destination')}}"required>
           <span class="input_error">
              @error('email')
               {{$message}}
              @enderror
            </span>    
        <input class="elements" type="date" name="date" placeholder="Date" value="{{old('dob')}}" required>Date:
            <span class="input_error">
              @error('dob')
               {{$message}}
              @enderror
            </span>
        Number of Days:<input class="elements" type="text" name="days" placeholder="Number of Days" required>
            <span class="input_error">
                @error('password')
                {{$message}}
                @enderror
            </span>

        <button class="elements" type="submit"><a href="{{route('cancel')}}">Cancel</a></button>
        <button class="elements" type="submit">Post</button>
        
    </form>
    </div>
  </body>
</html>
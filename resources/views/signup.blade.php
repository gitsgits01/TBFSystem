<!doctype html>
<html lang="en">
  <head>
    <title>SignUp Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('css/signup.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="body">
    <div class="signup-container">

         <!--sessions-->
         @if(Session::has('error'))
         <p class="text-danger">{{Session::get('error')}}</p>
       @endif


    <form action="{{ route('signup.store') }}" method="POST" class="signup-form"> 

        @csrf
        @method('post')
        <h3>SignUp</h3>
        <input class="elements" type="text" name="name" placeholder="Name" value="{{old('name')}}" required>
           <span class="input_error">
                @error('name')
                 {{$message}}
                @enderror
            </span>
        <input class="elements" type="email" name="email" placeholder="Email" value="{{old('email')}}"required>
           <span class="input_error">
              @error('email')
               {{$message}}
              @enderror
            </span>    
        <input class="elements" type="text" name="address" placeholder="Address"value="{{old('address')}}" required>
           <span class="input_error">
              @error('address')
               {{$message}}
              @enderror
            </span>
        <input class="elements" type="date" name="dob" placeholder="Date of Birth" value="{{old('dob')}}" required>
            <span class="input_error">
              @error('dob')
               {{$message}}
              @enderror
            </span>
            {{-- <input type="text" name="gender" palceholder="Gender" required> --}}
            <div class="radio-box">
                <label>
                  <input type="radio" name="gender" value="male" required> Male
                </label>
                <label>
                  <input type="radio" name="gender" value="female" required> Female
                </label>
                <label>
                  <input type="radio" name="gender" value="others" required> Others
                </label>
              </div><br/>
        <input class="elements" type="password" name="password" placeholder="Password" required>
            <span class="input_error">
                @error('password')
                {{$message}}
                @enderror
            </span>

        <input class="elements" type="password" name="confirm_password" placeholder="Confirm Password" required>
            <span class="input_error">
               @error('confirm_password')
               {{$message}}
               @enderror
          </span>
        <button class="elements" type="submit"><a href="{{route('cancel')}}">Cancel</a></button>
        <button class="elements" type="submit">SignUp</button>
            
            <!-- <div class="label_group">
                <label for="">First Name</label><br/>
                <input type="text" name="fname" value="{{old('fname')}}"/>
                <br/>
                <span class="input_error">
                    @error('fname')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <div class="label_group">
                <label for="">Last Name</label><br/>
                <input type="text" name="lname" value="{{old('lname')}}"/>
                <span class="input_error">
                    @error('lname')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <div class="label_group">
                <label for="">Email Address</label><br/>
              <input type="email" name="email" value="{{old('email')}}"/>
                <br/>
                <span class="input_error">
                    @error('email')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <div class="label_group">
                <label for="">Date of Birth</label><br/>
                <input type="date" name="dob" value="{{old('dob')}}"/>
                <br/>
                <span class="input_error">
                    @error('dob')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <div class="label_group">
                <label for="">Address</label><br/>
                <input type="text" name="address" value="{{old('address')}}"/>

                <span class="input_error">
                    @error('location')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <div class="label_group">
                <label for="">Password</label><br/>
                <input type="password" name="password">
                <br/>
                <span class="input_error">
                    @error('password')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <div class="label_group">
                <label for="">Confirm Password</label><br/>
                <input type="password" name="confirm_password">
                <br/>
                <span class="input_error">
                    @error('confirm_password')
                    {{$message}}
                    @enderror
                </span>
            </div>
            
            <div class="label_group">
                <button class="btn-btn">Cancel</button>
            </div>
            <div class="label_group">
                <button class="btn-btn">SignUp</button>
            </div> -->
        
        
    </form>
    </div>
  </body>
</html>
<!doctype html>
<html lang="en">
  <head>
    <title>Login Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="body">
      <div class="login-container">

        <!--Sessions-->
        @if(Session::has('error'))
          <p class="text-danger">{{Session::get('error')}}</p>
        @endif
        @if(Session::has('success'))
          <p class="text-success">{{Session::get('success')}}</p>
        @endif


          <form method="POST" action="{{ route('login.store') }}" class="login-form">
              @csrf
              <h2>Login</h2>
              <input type="email" name="email" placeholder="Email"required >
              <input type="password" name="password" placeholder="Password" required>
              <button type="submit">Login</button>
              <p>OR</p>
              <button type="submit"><a href="{{route('signup')}}">SignUp</a></button>
              

          </form>
      </div>

  </body>
</html>
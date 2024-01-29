$<!doctype html>
<html lang="en">
  <head>
    <title>Reset Account </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('css/setting.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="body">
    <div class="container">
    <form action="{{ route('password.email') }}" method="post" class="form">
        @csrf
    
        <!-- reset password-->
        <input type="email" name="email" placeholder="Enter your email" required>
    
        <button type="submit">Reset </button>
    </form>
    <div>
    
  </body>
</html>
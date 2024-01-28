$<!doctype html>
<html lang="en">
  <head>
    <title>Delete Account </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('css/setting.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="body">
    <div class="container">
    <form action="{{ route('delete.account') }}" method="post" class="form">
        @csrf
    
        <!-- Confirm  Password -->
        <input type="password" name="password" placeholder="Confirm  Password "required>
    
        <button type="submit">Delete Account </button>
    </form>
    <div>
    
  </body>
</html>
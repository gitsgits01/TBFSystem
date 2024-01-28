$<!doctype html>
<html lang="en">
  <head>
    <title>Change Password</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('css/setting.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="body">
    <div class="login-container">
    <form action="{{ route('updatepassword') }}" method="post" class="login-form">
        @csrf
    
        <!-- Current Password -->
        <input type="password" name="current_password" placeholder="Current Password" required>
    
        <!-- New Password -->
        <input type="password" name="new_password" placeholder= " New Password" required>
    
        <!-- Confirm New Password -->
        <input type="password" name="confirm_password" placeholder="Confirm New Password "required>
    
        <button type="submit">Change Password</button>
    </form>
    <div>
    
  </body>
</html>
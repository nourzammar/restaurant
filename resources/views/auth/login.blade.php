<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{asset('css/login.css')}}">
  
  <title>Login & Registration Form</title>
</head>
<body style="background-image: url(images/wood_1.png)">

   
  <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
      <header>Log In</header>
      <form action=" {{ route('CustomAuth.login') }}" method="POST"  >
        @csrf
        <input type="text" name="email" placeholder="Enter your email">
        <input type="password"name="password" placeholder="Enter your password">
        <button type="submit" class="sub">Log In</button>
      </form>
      <div class="signup">
        <span class="signup">Don't have an account?
         <label for="check">SIGN UP</label>
        </span>
      </div>
    </div>
    <div class="registration form">
      <header>Sign Up</header>
      <form action=" {{ route('CustomAuth.register') }}" method="POST"  >
        @csrf
        <input type="name" name="name" placeholder="Enter your name">
        <input type="email" name="email" placeholder="Enter your email">
        <input type="password" name="password" placeholder="Create a password">
        <button type="submit" class="sub">Sign Up</button>
      </form>
      <div class="signup">

        <span class="signup">Already have an account?
         <label for="check">Sign In</label>
        </span>
      </div>
    </div>
  </div>

</body>
</html>

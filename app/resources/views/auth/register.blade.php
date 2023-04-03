<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
</script>
</head>
<body>
<header class="global-header">
    <a href ="{{ ('/') }}"><h1>Seattlish</h1></a>
</header>
<form class="register-form" action="{{ route('register') }}" method="POST">
@csrf
  <p class="register-text">
    <span class="fa-stack fa-lg">
      <i class="fa fa-circle fa-stack-2x"></i>
      <i class="fa fa-lock fa-stack-1x"></i>
    </span>
  </p>
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p style="color:white">{{ $message }}</p>
                @endforeach
              </div>
            @endif
    <input type="text" name="name"  class="register-username" autofocus="true" required="true" placeholder="User Name" />
    <input type="email" name="email" class="register-email" required="true" placeholder="Email" />
    <input type="password" name="password" class="register-password" placeholder="Password" />
    <input type="password" name="password_confirmation" class="register-re-enterpassword" placeholder="Re-enter Password" />
    <input type="submit" name="register" value="register" class="register-submit" />
</form>
<div class="underlay-photo"></div>
<div class="underlay-black"></div> 
</body>
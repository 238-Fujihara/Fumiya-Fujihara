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

<script type="text/javascript">
        $(document).ready(function(){
            $('.slider').bxSlider({
                auto: true,
                pause: 5000,
            });
        });
</script>

</head>
<body>
    <header class="global-header">
        <a href ="{{ ('/') }}"><h1>Seattlish</h1></a>
        <div class="login-register">
                @if(Auth::check())
                <span class="may-navbar-item">{{ Auth::user()->name }}</span>
                /
                <a href="#" id="logout" class="logout">ログアウト</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" syle="display:none;">
                    @csrf
                </form>
                <script>
                    document.getElementById('logout').addEventListener('click', function(event){
                    event.preventDefault();
                    document.getElementById('logout-form').submit();
                    });
                </script>
                @else
                <a class="login" href="{{ route('login') }}">
                <button type='button' class='login-button'>ログイン</buton>
                </a>
                
                <a class="register" href="{{ route('register') }}">
                <button type='button' class='register-button'>会員登録</buton>
                </a>
                @endif
        </div>
        </header>
        <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('UserInfo') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="list-group mb-3" style="max-width:400px; margin:auto;">
                      <a href="{{ route('name.form') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <dl class="mb-0">
                          <dt>{{ __('Name') }}</dt>
                          <dd class="mb-0">{{ $auth->name }}</dd>
                        </dl>
                        <div><i class="fas fa-chevron-right"></i></div>
                      </a>

                      <a href="{{ route('email.form') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                      <dl class="mb-0">
                            <dt>{{ __('E-Mail Address') }}</dt>
                            <dd class="mb-0">{{ $auth->email }}</dd>
                          </dl>
                          <div><i class="fas fa-chevron-right"></i></div>
                        </a>

                      <a href="{{ route('password.form') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <dl class="mb-0">
                          <dt>{{ __('Password') }}</dt>
                          <dd class="mb-0">********</dd>
                        </dl>
                        <div><i class="fas fa-chevron-right"></i></div>
                      </a>
                </div>
                <div class="list-group" style="max-width:400px; margin:auto;">
                    <a href="{{ route('deactive.form') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                      <div>{{ __('Deactive') }}</div>
                      <div><i class="fas fa-chevron-right"></i></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
                </html>
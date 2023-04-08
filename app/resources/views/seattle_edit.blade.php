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
    <h1>Seattle</h1>
    <form action="{{ route('seattlePost.update',$seaposts->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
    <div class="editpictures">
        <div class="seatitle">
            <input type='text' name='title' value="{{ $seaposts['title'] }}">
        </div>
        <div class="seadate">
            <input type='date' name='date' value="{{ $seaposts['date'] }}">
        </div>
        <div class="seapics">
            <img src="{{ asset('/storage/images/' . $seaposts['image']) }}">
        </div>
    </div>
    <div class="seaedit">
            <button type='submit' class='seattlepic-button'>編集完了</buton>
    </div>
    </form>



</html>
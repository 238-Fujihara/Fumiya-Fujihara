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
    </div>
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
<body>
    <div class="edpicsdetail">
        <img src="{{ asset($edpost->image) }}">
    </div>
    <div class="edit">
    <a href="{{ route('edit.edmonds') }}" method="POST">
        @csrf
        @method('edit')
            <input type="submit" value="編集" class="btn btn-danger">
    </a>
    </div>
    <div class="delete">
    <form action="{{ route('edmondsPost.destroy', ['edmondsPost' => $edpost->id]) }}" method="POST">
        @csrf
        @method('delete')
            <input type="submit" value="削除" class="btn btn-danger" onclick='return confirm("削除しますか？");'>
    </form>
</body>
</html>
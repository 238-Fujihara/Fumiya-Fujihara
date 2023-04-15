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
    <a href ="{{ url('/') }}"><h1>Seattlish</h1></a>
    <div class="login-register">
            @if(Auth::check())
                @if(Auth::user()->role == 100)
                <a href="{{ url('/admin') }}">管理者ページ</a><br>
                @endif
            <span class="may-navbar-item">{{ Auth::user()->name }}</span>
            /
            <a href="#" id="logout" class="logout">ログアウト</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" syle="display:none;">
                @csrf
            </form>
            <a href="{{ route('my.page') }}">マイページ</a>
            <script>
                document.getElementById('logout').addEventListener('click', function(event){
                event.preventDefault();
                document.getElementById('logout-form').submit();
                });
            </script>
            @else
            <a class="login" href="{{ route('login') }}">
            <button type='submit' class="btn btn-secondary">ログイン</button>
            </a>
            
            <a class="register" href="{{ route('register') }}">
            <button type='submit' class="btn btn-secondary">会員登録</button>
            </a>
            @endif
    </div>
</header>
<body>
<div class="card text-center">
    <div class="card-header">
        Violation Form
    </div>
    <form action="{{ route('store.edviolation') }}" method="POSt" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
        <input type="hidden" name="edmondspost_id" value="{{$id}}">
        <input type="hidden" name="seattlepost_id" value= 0 >
        <div class="card-body">
            <h5 class="card-title">Name</h5>
            <input type='text' name='name' rows="50" cols="50" value=""></input><br><br>
            <h5 class="card-title">Why is this inappropriate??</h5>
            <input type='text' name='reason' rows="50" cols="50" value=""></input>
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
        </div>
    </form>
</div>
</body>
</html>

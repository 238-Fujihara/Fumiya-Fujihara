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
                    @if(Auth::user()->role == 100)
                <a href="{{ url('/admin') }}">管理者ページ</a><br>
                @endif
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
    <h1>Edmonds</h1>
    <form action="{{ route('laPost.update',$laposts->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="selectpictures">
                @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <div class="seatitle">
                <input type='text' name='title' value="{{ $laposts['title'] }}">
            </div>
            <div class="seadate">
                <input type='date' name='date' value="{{ $laposts['date'] }}">
            </div>
            <div class="seapics">
                <img src="{{ asset('/storage/images/' . $laposts['image']) }}">
            </div>
        </div>
        <div class="ededit">
            <button type='submit' class='edmondspic-button'>編集完了</button>
        </div>
    </form>
    <form action="{{ route('laPost.destroy', $laposts->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('delete')
        <button type='submit' class='btn btn-danger'>削除</button>
    </form>




</html>
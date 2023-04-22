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
<script src="like.js"></script>


</head>
<body>
<header class="global-header">
    <a href ="{{ ('/') }}"><h1>Seattlish</h1></a>
    <div class="login-register">
            @if(Auth::check())
            @if(Auth::user()->role == 100)
            <div class="adpage">
                    <a href="{{ url('/admin') }}">管理者ページ</a>
                </div>
            @endif
            <div class="afterlogin">
                <span class="may-navbar-item"></span>
                <a href="{{ route('my.page') }}"><img class="iconimage"src="{{ asset( 'storage/images/' . Auth::user()->profile_image) }}"></a></span>
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
            </div>
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
    <h1>Colorado</h1>
        <div class="seattlepost">
            <a class="edmondspost" href="{{ route('create.colorado') }}">
            <button type='button' class="btn btn-secondary">新規投稿⊕</button>
            </a>
        </div>
    <div class="edmondspictures">
        <div class="edpostdetail">
            <div class="picture">
            <tr>
                @foreach($coloradoposts as $coloradopost)
                    <div class="date">
                        <h3>"{{ $coloradopost['title'] }}"</h3>
                        <h4>[{{ $coloradopost['date'] }}]</h4>
                        <a href="{{ route('coloradoPost.edit', $coloradopost->id) }}"><img src="{{ asset($coloradopost->image) }}"></a>
                    </div>
                @endforeach
            </tr>
            </div>              
        </div>
    </div>
</body>
</html>
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
        <a href="{{ route('userlist') }}">管理者ページ</a><br>
            @if(Auth::check())
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
<div class="detail">  
<img class="washingtonmap" src="{{ asset('img/screen shot/2023-03-19 (3).png') }}" alt=""></div>
    <div class="each-detail">
        <a class ="edmondspostdetail", href="{{ route('edmonds.post') }}">Edmonds</a><br>
        <a class ="seattlepostdetail", href="{{ route('seattle.post') }}">Seattle</a>
    </div>
    <div class="introduction">
        <p>A dynamic, urban city surrounded by unmatched natural beauty—and now it's all open for you to explore.</p>
    </div>
<div class="seattleintroduction">
    <div>
    <a href="{{ route('seattle.post') }}">
        <img src="{{ asset('/storage/images/cropped-seattle-skyline.jpg') }}">
    </a></div>
    <p>Seattle, the closest city on the mainland to Japan, can be reached in about nine hours from Tokyo. 
        It is the largest city in Washington State, about half the size of Japan, 
        and has earned the nickname "Emerald City" for its beauty. 
        Although located at the same latitude as Southern Sakhalin, far to the north 
        of Hokkaido, it is blessed with a mild climate 
        where the temperature falls below zero only a few days a year thanks to the warm currents flowing 
        through the coastal waters, and there is no snow cover or typhoons. In winter, there are many cloudy 
        and rainy days, but in summer, thanks to the rain, the landscape is lush and beautiful.</p>
</div>
<div class="edmondsintroduction">
    <p>
    Edmonds is known for its small-town charm and maritime scenery, 
    but did you know it's also home to world-class food and drink, 
    lush parks, and easy hiking trails? In a city where the trees meet the sea, 
    we have many ways for you to experience both types of views in the same day—and even on the same hike! 
    </p>
    <div>
    <a href="{{ route('edmonds.post') }}">
        <img src="{{ asset('/storage/images/R (3).jfif') }}">
    </div>
</body>
</html>
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
            @if(Auth::user()->role == 100)
                <a href="{{ url('/admin') }}">管理者ページ</a><br>
            @endif
            <span class="may-navbar-item">{{ Auth::user()->name }}</span>
            /
            <a href="#" id="logout" class="logout">ログアウト</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" syle="display:none;">
                @csrf
                <a href="{{ route('my.page') }}">マイページ</a>

            </form>
            <script>
                document.getElementById('logout').addEventListener('click', function(event){
                event.preventDefault();
                document.getElementById('logout-form').submit();
                });
            </script>
            @else
            <a class="login" href="{{ route('login') }}">
            <button type='button' class="btn btn-secondary">ログイン</buton>
            </a>
            
            <a class="register" href="{{ route('register') }}">
            <button type='button' class="btn btn-secondary">会員登録</buton>
            </a>
            @endif
    </div>
</header>
<body>
<h1>Seattle</h1>
<div class="regionname">
            <div class="dropdown"> 
                <button id="btnOpenMenu" class="btn btn-primary dropdown-toggle"  
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Select Region
                </button>
                <div class="dropdown-menu" aria-labelledby="btnOpenMenu">
                    <a class="dropdown-item" href="{{ route('public.edmonds') }}">Edmonds</a>
                    <a class="dropdown-item" href="{{ route('public.seattle') }}">Seattle</a>            
                </div>
            </div>
        </div>
  <div class="seattlepost">
    <a class="seattlepost" href="{{ route('create.seattle') }}">
    <button type='button' class="btn btn-secondary">新規投稿⊕</button>
    </a></div>
    <div class="searching">
        <div class="datesearching">
            <form action="{{ route('public.seattle') }}" method="GET">
                    @csrf
                    <input type="date" name="from" placeholder="from_date" value="{{ $fromdate }}">
                        <span class="mx-3 text-grey">~</span>
                    <input type="date" name="until" placeholder="until_date" value="{{ $untildate }}"><br>
        </div>
                    <div>
                        <input type="text" name="keyword" placeholder="キーワード検索" value = "{{ $keyword }}">
                    </div>
    </div>
                    <div class="searchinginformation">
                        <button type="submit" class="btn btn-info">検索</button>
                    </div>
            </form>
    <div class="seattlepictures">
        <div class="seattledetail">
            <div class="picture">
            <tr>
            @foreach($seaposts as $seapost)
            <div class="date">
                <h3>"{{ $seapost['title'] }}"</h3>
                <h4>{{ $seapost['date'] }}</h4>
                <img src="{{ asset($seapost->image) }}"></a>
                <a href="{{ route('seaviolation',$seapost->id) }}">
                    <div class="badbutton"><input type="submit" value="BAD" class="btn btn-secondary" onclick='return confirm("Do not like this?");'></button></div>
                </a>
            </div>
            @endforeach
            </tr>
            </div>              
            
            <h4></h4>
        </div> 
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
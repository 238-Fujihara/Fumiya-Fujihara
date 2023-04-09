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
            <button type='submit' class="btn btn-secondary">ログイン</button>
            </a>
            
            <a class="register" href="{{ route('register') }}">
            <button type='submit' class="btn btn-secondary">会員登録</button>
            </a>
            @endif
    </div>

</header>
    <h1>Edmonds</h1>
        <div class="seattlepost">
            <a class="edmondspost" href="{{ route('create.edmonds') }}">
            <button type='button' class="btn btn-secondary">新規投稿⊕</button>
            </a>
        </div>
            <div class="searching">
                <div class="date">
                <form action="{{ route('edmonds.post') }}" method="GET">
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
    <div class="edmondspictures">
        <div class="edpostdetail">
            <div class="picture">
            <tr>
                @foreach($edposts as $edpost)
                    <div class="date">
                        <h3>"{{ $edpost['title'] }}"</h3>
                        <h4>[{{ $edpost['date'] }}]</h4>
                        <a href="{{ route('edmondsPost.show', $edpost->id) }}"><img src="{{ asset($edpost->image) }}"></a>
                        <div>
                            <button onclick="like({{$edpost->id}})" class="btn btn-success btn-sm">いいね</button>
                        </div>
                    </div>
                @endforeach
            </tr>
            </div>              
            <h4></h4>
        </div> 
    </div>
</body>
</html>
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
    <a href ="{{ ('/') }}" class="title"><h1>Seattlish</h1></a>
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
            <button type='button' class="btn btn-secondary">ログイン</buton>
            </a>
            
            <a class="register" href="{{ route('register') }}">
            <button type='button' class="btn btn-secondary">会員登録</buton>
            </a>
            @endif
    </div>
</header>
        <h1>My Page</h1>
        <div class="userinformation">
          <div class='icon'> 
            <img src="{{ asset('img\screen shot\IMG_0142.jpg') }}">
            <div class= 'username'>{{ Auth::user()->name }}</div>
          </div>
          <div class="menu">
            <div class="newpost">
                <a href="{{ route('create.edmonds') }}">
                    <button type='button' class='newpostbutton'>新規投稿⊕</button>
                </a>
            </div>
            <div class="edit">
                <a href="{{ route('setting') }}">
                    <button type='button' class='useredit'>編集</button>
                </a>
            </div>
            </div>
        </div>
        <div class="regionname">
        <a class="btn btn-primary" data-toggle="collapse" href="{{ route('edmonds.post') }}" role="button" aria-expanded="false" aria-controls="collapseExample">
            Link with href
        </a>
            <a href="{{ route('seattle.post') }}">
                <button type="submit" name="myseaposts">Seattle</button>
            </a>
        </div>
        <div class="myposts">
        @foreach($edposts as $edpost)
            <a href="{{ route('edmondsPost.show', $edpost->id) }}"><img src="{{ asset($edpost->image) }}">
            </a>
        @endforeach                 
    </div>

</body>
</html>
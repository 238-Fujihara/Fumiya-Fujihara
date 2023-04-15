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
    @if(isset($badbutton->EdmondsPost))
        <div>{{ $badbutton->EdmondsPost->title }}</div>
            <div class="edpicsdetail">
                <img src="{{ asset('/storage/images/' . $badbutton->EdmondsPost->image) }}">
            </div>
        <div class="deletebutton">
            <form action="{{ route('badbuttons.update', $badbutton->EdmondsPost->id) }}" method="POST">
                @csrf
                @method('PUT')
                    <input type="submit" name="EdmondsPost" value="削除" class="btn btn-danger" onclick='return confirm("削除しますか？");'>
            </form>
        </div>
    @elseif(isset($badbutton->SeattlePost))
        <div>{{ $badbutton->SeattlePost->title }}</div>
            <div class="edpicsdetail">
                <img src="{{ asset('/storage/images/' . $badbutton->SeattlePost->image) }}">
            </div>
        <div class="deletebutton">
            <form action="{{ route('badbuttons.update', $badbutton->SeattlePost->id) }}" method="POST">
                @csrf
                @method('PUT')
                    <input type="submit" name="SeattlePost"value="削除" class="btn btn-danger" onclick='return confirm("削除しますか？");'>
            </form>
        </div>
    @endif
</body>
</html>
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
    <a href ="{{ url('/') }}"><h1 class="maintitle">Seattlish</h1></a>
<div class="menu">
    <a href="{{ route('public.edmonds') }}"></a>
    <a href="{{ route('public.seattle') }}"></a>
    <a href="{{ route('public.la') }}"></a>
    <a href="{{ route('public.colorado') }}"></a>
    <a href="{{ route('public.washington') }}"></a>
    <a href="{{ route('public.texas') }}"></a>
</div>
    <div class="login-register">
            @if(Auth::check())
                @if(Auth::user()->role == 100)
                <div class="adpage">
                    <a href="{{ url('/admin') }}">管理者ページ</a>
                </div>
                @endif
        <div class="afterlogin">
            <span class="may-navbar-item">
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
<div class="detail">  
    <div id="map" style="height:600px">
            </div>
            <script src="{{ asset('/js/result.js') }}"></script>
            <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyCtg9SJM3YpINhidD-NoE2tp_Ftwpom_Oc&callback=initMap" async defer>
	        </script>
    </div>
    <div class="introduction">
        <p>A dynamic, urban city surrounded by unmatched natural beauty—and now it's all open for you to explore.</p>
    </div>
<div class="seattleintroduction">
    <div>
    <a href="{{ route('public.seattle') }}">
        <img src="{{ asset('/storage/images/cropped-seattle-skyline.jpg') }}">
    </a></div>
    <p>Seattle, the closest city on the mainland to Japan, can be reached in about nine hours from Tokyo. 
        It is the largest city in Washington State, about half the size of Japan, 
        and has earned the nickname "Emerald City" for its beauty. 
        Although located at the same latitude as Southern Sakhalin, far to the north 
        of Hokkaido, it is blessed with a mild climate 
        where the temperature falls below zero only a few days a year thanks to the warm currents flowing 
        through the coastal waters, and there is no snow cover or typhoons. </p>
</div>
<div class="edmondsintroduction">
    <p>
    Edmonds is known for its small-town charm and maritime scenery, 
    but did you know it's also home to world-class food and drink, 
    lush parks, and easy hiking trails? In a city where the trees meet the sea, 
    we have many ways for you to experience both types of views in the same day—and even on the same hike! 
    </p>
    <div>
        <a href="{{ route('public.edmonds') }}">
            <img src="{{ asset('/storage/images/uRLRA7zyv2zmoXaCE7yD9AC8SYEcOg6QfJ3outCC.jpg') }}" height="500px">
        </a> 
    </div>
</div>
<div class="laintroduction">
    <div>
        <a href="{{ route('public.la') }}">
            <img src="{{ asset('/storage/images/la.jpg') }}">
        </a>
    </div>
    <p>
        A place for bold dreams, creative expression and limitless possibilities,
        Los Angeles is a city defined by its people. One of the most culturally diverse destinations 
        in the world with Angelenos from 140 countries who speak 224 different languages, LA inspires 
        visitors to immerse themselves in unique perspectives, unexpected moments and open-hearted community. 
    </p>
</div>
<div class="texasintroduction">
    <p>
        Texas is one of the biggest states by population and area in the United States. 
        The state is on the south-central region of the country, and it is bordered by the Mexican Gulf to the southeast. 
        The state has over 28,304,596 residents with its most populous city being Houston followed by San Francisco, 
        Dallas-Fort Worth, and Greater Houston.    
    </p>
    <div>
        <a href="{{ route('public.texas') }}">
            <img src="{{ asset('/storage/images/texastop.jpg') }}">
        </a>
    </div>
</div>
<div class="coloradointroduction">
    <div>
        <a href="{{ route('public.colorado') }}">
            <img src="{{ asset('/storage/images/coloradotop.jpg') }}">
        </a>
    </div>
    <p>
        Colorado is known for a lot of things, but most of the world probably thinks of stunning mountain scenery 
        when they think of the state. But in addition to the high country, the Centennial State is famous for lots of 
        other things ranging from important cultural institutions and contributions to legal weed to great weather.    
    </p>
</div>
<div class="waintroduction">
    <p>
    Washington, D.C. is home to all three branches of the U.S. government as well as many international organizations 
    and the embassies of 174 foreign nations. In addition to being the center of the U.S. government, Washington, 
    D.C. is known for its history. The city limits include many historic national monuments and famous museums like 
    the Smithsonian Institution.     </p>
    <div>
        <a href="{{ route('public.washington') }}">
            <img src="{{ asset('/storage/images/watop.jpg') }}">
        </a>
    </div>
</div>



</body>
</html>
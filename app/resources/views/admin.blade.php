<html>
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
                <span class="may-navbar-item"></span>
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
                <button type='button' class='login-button'>ログイン</buton>
                </a>
                
                <a class="register" href="{{ route('register') }}">
                <button type='button' class='register-button'>会員登録</buton>
                </a>
                @endif
        </div>
    </header>

<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div id="app" class="p-5">
        <!-- 一覧表示するブロック ① -->
        <div v-if="state=='index'">
            <div class="badbuttons">
                <a href="{{ route('badbuttons.index') }}">Violation Report</a>
            </div>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        @foreach($users as $user)
                            <thead>
                            <tr>
                                <th>名前</th>
                                <th>E-Mail</th>
                                <th>違反件数</th>
                            </tr>
                            </thead>
                                <td>{{ $user['name'] }}</td>
                                <td>{{ $user['email'] }}</td>
                                <td>{{ $user['badcount'] }}</td>
                                    <td class="text-right">
                                        <button class="btn btn-danger" type="button" @click="onDelete(user)">削除</button>
                                    </td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- 追加＆変更するブロック ② -->
        <div v-if="state=='create' || state == 'edit'">
            <div class="form-group">
                <label>名前</label>
                <input type="text" class="form-control" v-model="params.name">
            </div>
            <div class="form-group">
                <label>メールアドレス</label>
                <input type="text" class="form-control" v-model="params.email">
            </div>
            <div class="bg-light px-3 py-2 mb-3" v-if="state == 'edit'">以下は省略可</div>
            <div class="form-group">
                <label>パスワード</label>
                <input type="password" class="form-control" v-model="params.password">
            </div>
            <div class="form-group">
                <label>パスワード（確認）</label>
                <input type="password" class="form-control" v-model="params.passwordConfirmation">
            </div>
            <button type="button" class="btn btn-link" @click="changeState('index')">戻る</button>
            <button type="button" class="btn btn-primary" @click="onSave">保存する</button>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
    <script>

        new Vue({
            el: '#app',
            data: {
                state: 'index',
                params: {
                    id: -1,
                    name: '',
                    email: '',
                    badcount: '',
                    password: '',
                    passwordConfirmation: ''
                },
            },
            methods: {
                changeState(state, value) { // 状態を変化させて表示を切り替え ⑤

                    if(state === 'create') {

                        this.params = {
                            id: -1,
                            name: '',
                            email: '',
                            badcount: '',
                            password: '',
                            passwordConfirmation: ''
                        };

                    } else if(state === 'edit') {

                        this.params = value;

                    }

                    this.state = state;

                },
                onSave() { // データ保存（追加＆変更） ⑥

                    const params = this.params;
                    let url = '/user';
                    let method = 'POST';

                    if(this.state === 'edit') { // 変更の場合

                        url += '/'+ this.params.id;
                        method = 'PUT';

                    }

                    axios({ url, method, params })
                        .then(response => {

                            if(response.data.result === true) {

                                location.reload(); // 再読み込み

                            }

                        });

                },
                onDelete(user) { // データ削除 ⑦

                    if(confirm('削除します。よろしいですか？')) {

                        const url = '/user/'+ user.id;
                        axios.delete(url)
                            .then(response => {

                                if(response.data.result === true) {

                                    location.reload(); // 再読み込み

                                }

                            });

                    }

                }
            }
        });

    </script>
</body>
</html>
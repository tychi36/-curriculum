<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://unpkg.com/sanitize.css/typography.css" rel="stylesheet"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
    <body>
        <div class="container">
            <div class="sidebar">
                <h1 class="fs-1 title"><a href="#">TITLE</a></h1>
                <nav class="">
                    <div class="">
                        @can('admin')
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('posts.index') }}">ホーム</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('weight_mgmts.index') }}">進捗一覧</a>
                                    </li>
                            </ul>
                            <form class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                        @if(Auth::check())
                            <div class="ml-2">
                                <span class="my-navbar-item">{{ Auth::user()->name }}</span>
                                    /
                                    <a href="#" id="logout" class="my-navbar-item">ログアウト</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                                </form>
                                <script>
                                    document.getElementById('logout').addEventListener('click', function(event) {
                                    event.preventDefault();
                                    document.getElementById('logout-form').submit();
                                    });
                                </script>
                                @else
                                <a class="my-navbar-item" href="{{ route('login') }}">ログイン</a>
                                    /
                                <a class="my-navbar-item" href="{{ route('register') }}">会員登録</a>
                            </div>
                        @endif
            </div>
                    @elsecan('user')
                        <div class="" id="navbarSupportedContent">
                            @if(Route::is('weight_mgmts.index','weight_mgmts.create','weight_mgmts.show','weight_mgmts.edit ','weight_mgmts.destroy'))
                            <ul class="d-flex flex-column navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('posts.index') }}">ホーム</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('weight_mgmts.index') }}">進捗一覧</a>
                                </li>
                            </ul>
                            @else
                            <ul class="d-flex flex-column navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item mb-2">
                                    <a class="nav-link active" aria-current="page" href="{{ route('posts.index') }}">ホーム</a>
                                </li>
                                <li class="nav-item mb-2">
                                    <a class="nav-link active" aria-current="page" href="{{ route('posts.create') }}">投稿</a>
                                </li>
                                <li class="nav-item mb-2">
                                    <a class="nav-link active" aria-current="page" href="{{ route('weight_mgmts.index') }}">進捗</a>
                                </li>
                                <li class="nav-item mb-2">
                                    <a class="nav-link active" aria-current="page" href="{{ route('users.show',Auth::id()) }}">マイページ</a>
                                </li>
                            </ul>
                            <form class="d-flex" action="{{ route('search') }}" method="get">
                                @csrf
                                <input class="form-control me-2 width_reset" placeholder="Search" aria-label="Search" type="search" name="search" value="@if (isset($search)) {{ $search }} @endif">
                            </form>
                            <button class="btn btn-outline-success" type="submit">Search</button>
                            @endif
                            @if(Auth::check())
                            <div class="ml-2">
                                <span class="my-navbar-item">{{ Auth::user()->name }}</span>
                                    /
                                    <a href="#" id="logout" class="my-navbar-item">ログアウト</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                                </form>
                                <script>
                                    document.getElementById('logout').addEventListener('click', function(event) {
                                    event.preventDefault();
                                    document.getElementById('logout-form').submit();
                                    });
                                </script>
                                @else
                                <a class="my-navbar-item" href="{{ route('login') }}">ログイン</a>
                                    /
                                <a class="my-navbar-item" href="{{ route('register') }}">会員登録</a>
                            </div>
                            @endif
                            @if(Route::is('weight_mgmts.index','weight_mgmts.create','weight_mgmts.show','weight_mgmts.edit ','weight_mgmts.destroy'))
                            <ul class="d-flex flex-column navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('weight_mgmts.create')}}">入力</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="">編集</a>
                                </li>
                                <li class="nav-item">
                                    <form action="" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" onclick="return confirm('本当に削除しますか？')">削除</button>
                                    </form>
                                </li>
                                <li class="nav-item">
                                    <form action="" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" onclick="return confirm('目標をリセットしますか？')">目標リセット</button>
                                    </form>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="">目標編集</a>
                                </li>
                            </ul>
                            @endif
                        </div>
                    @endcan
                </div>
            </nav>
        </div>
        @yield('content')
    </body>   
</html>

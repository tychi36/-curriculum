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
    <link href="css/style.css" rel="stylesheet">
</head>
    <body>
        <div>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">TITLE</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
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
                    @elsecan('user')
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        @if(Route::is('weight_mgmts.index','weight_mgmts.create','weight_mgmts.show','weight_mgmts.edit ','weight_mgmts.destroy'))
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('posts.index') }}">ホーム</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('weight_mgmts.index') }}">進捗一覧</a>
                                </li>

                            </ul>
                        @else
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('posts.index') }}">ホーム</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('posts.create') }}">投稿</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('weight_mgmts.index') }}">進捗</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('users.show',Auth::id()) }}">マイページ</a>
                                </li>
                            </ul>
                            <form class="d-flex" action="{{ route('search') }}" method="get">
                                @csrf
                                <input class="form-control me-2" placeholder="Search" aria-label="Search" type="search" name="search" value="@if (isset($search)) {{ $search }} @endif">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
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
                        </div>
                    @endcan
                </div>
            </nav>
        </div>
        @yield('content')
    </body>   
</html>

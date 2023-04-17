<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/_ajaxlike.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/index.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://unpkg.com/sanitize.css/typography.css" rel="stylesheet"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
</head>
    <body>
        <div class="container">
            <div class="sidebar">
                <h1 class="fs-1 title"><a href="#">TITLE</a></h1>
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
                        @elsecan('user')
                        <div class="" id="navbarSupportedContent">
                            @if(Route::is('weight_mgmts.index','weight_mgmts.create','weight_mgmts.show','weight_mgmts.edit ','weight_mgmts.destroy'))
                            <ul class="d-flex flex-column navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('posts.index') }}">ホーム</a>
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
                            @if(!Route::is('posts.create','users.show','weight_mgmts.index','weight_mgmts.create','weight_mgmts.show','weight_mgmts.edit'))
                            <form class="d-flex" action="{{ route('search') }}" method="GET">
                                @csrf
                                <input class="form-control me-2 width_reset" placeholder="Search" aria-label="Search" type="search" name="search" value="@if (isset($search)) {{ $search }} @endif">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                            @endif
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
                </div>
            </nav>
        </div>
        @yield('content')
    </body>   
</html>

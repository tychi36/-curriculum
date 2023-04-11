@extends('common.header')
@section('content')
@can('admin')
<main>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('posts.index') }}">ホーム</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('weight_mgmts.index') }}">進捗一覧</a>
                </li>
        </ul>
        <form class="d-flex" method="GET" action="{{ route('search') }}">
            @csrf
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" value="@if (isset($search)) {{ $search }} @endif">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
    <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>名前</td>
                <td>プロフィール</td>
                <td>違反報告</td>
                <td>ユーザーページ遷移</td>
                <td>ユーザー削除</td>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user['id'] }}</td>
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['profile_text'] }}</td>
                <td>{{ $user['violation'] }}</td>
                <td><a href="">ユーザーページへ</a></td>
                <td><a href="">ユーザー削除</a></td>
            </tr>
            @endforeach
           
        </tbody>
    </table>
</main>
@elsecan('user')
<main class="">
        @foreach($posts as $post)
        <div class="post_container">
        <!-- ユーザー情報 メイン-->
            <div class="user_link">
                <a href="{{ route('users.show',Auth::id()) }}">
                        <!-- 画像 -->
                        <img class="profile_img" src="{{ asset(Auth::user()->image_path) }}" alt="">
                        <!-- 名前 -->
                        <span class="username">{{ Auth::user()->name }}</span>
                </a>
            </div>
            <a href="{{ route('posts.show',$post['id']) }}">
                <div class="img_wrap">
                    <img src="{{ asset($post->path) }}" alt="">
                    <div class="">
                        <p class="post_text">{{ $post['text'] }}</p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
</main>
@endcan
@endsection
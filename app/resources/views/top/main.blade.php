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
<main>
    <div>
        <div>
            <div>
                @foreach($posts as $post)
                <!-- ユーザー情報 メイン-->
                <a href="{{ route('posts.show',$post['id']) }}">
                    <!-- 画像 -->
                    <img src="" alt="">
                    <!-- 名前 -->
                    <span>{{ $post['name'] }}</span>
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset($post->path) }}" class="card-img-top" alt="">
                        <div class="card-body">
                            <p class="card-text">{{ $post['text'] }}</p>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>                          
    </div>
</main>
@endcan
@endsection
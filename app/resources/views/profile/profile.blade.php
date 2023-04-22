@extends('common.header')
@section('content')
<main class="">
    <div>
        <button class="button_none btn btn-link prev-button"onclick="history.back()">＜ 戻る</button>
    </div>
    <div class="profile_container">
        <div class="icon"><img class="rounded-circle profile_img_mypage" src="{{ asset($user['image_path']) }}" alt=""></div>
        <div class="profile">
            @if($user['id'] === Auth::id())
            <a class="profile_button" href="{{ route('users.edit', $user['id'])}}">プロフィールを編集</a>
            @elseif(Route::is('hosts.show'))
            <a class="profile_button" href="{{ route('hosts.index')}}">一覧へ戻る</a>
            @endif
            <div class="name">{{ $user['name'] }}</div>
            <p name="profile_text" class="profile_text">{{ $user['profile_text'] }}</p>
        </div>
    </div>
    <div class="">
        <div class="button_container">
            <button class="posts_button button_none">投稿一覧</button>
            <button class="likes_button button_none">いいね一覧</button>
        </div>
        <div class="post_list" id="post">
            @foreach($posts as $post)
            <div class="post_contents">
                <a href="{{ route('posts.show', $post['id']) }}">
                    <img src="{{ asset($post->path) }}" alt="">
                </a>
            </div>
            @endforeach
        </div>
        <div class="like_list hidden" id="like">
            @foreach($likes as $like)
                <div class="like_contents">
                    <a href="{{ route('posts.show',$like['post_id']) }}">
                        <img src="{{ asset($like->path) }}" alt="">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</main>
@endsection
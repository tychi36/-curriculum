@extends('common.header')
@section('content')
<main>
    <div class="profile_container d-flex">
        <div class="icon"><img class="rounded-circle w-75" src="{{ asset(Auth::user()->image_path) }}" alt=""></div>
       <div>
            <div class="name_container">
                <a class="edit_profile" href="{{ route('users.edit', Auth::id())}}">プロフィールを編集</a>
                <div class="name">{{ Auth::user()->name }}</div>
            </div>
        <p name="profile_text" class="profile_text">{{ Auth::user()->profile_text }}</p>
       </div>
    </div>
    <div>
        <div class="button_container">
            <button class="posts_button">投稿一覧</button>
            <button class="likes_button">いいね一覧</button>
        </div>
        <div class="post_list">
            @foreach($posts as $post)
                <div class="post">
                    <a href="{{ route('posts.show',$post['id']) }}">
                        <img src="{{ asset($post->path) }}" alt="">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</main>
@endsection
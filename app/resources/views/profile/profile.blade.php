@extends('common.header')
@section('content')
<main>
    <div class="profile_container d-flex">
        <div class="icon"><img class="rounded-circle w-75" src="{{ asset($user['image_path']) }}" alt=""></div>
        <div>
            <div class="name_container">
                @if($user['id'] === Auth::id())
                <a class="edit_profile" href="{{ route('users.edit', $user['id'])}}">プロフィールを編集</a>
                @elseif(Route::is('hosts.show'))
                <a class="edit_profile" href="{{ route('hosts.index')}}">一覧へ戻る</a>
                @endif
                <div class="name">{{ $user['name'] }}</div>

                
            </div>
            <p name="profile_text" class="profile_text">{{ $user['profile_text'] }}</p>
        </div>
    </div>
    <div>
        <div class="button_container">
            <button class="posts_button">投稿一覧</button>
            <button class="likes_button">いいね一覧</button>
        </div>
        <div class="post_list" id="post">
            @foreach($posts as $post)
            
                <div class="">
                    
                    <a href="{{ route('posts.show', $post['id']) }}">
                        <img src="{{ asset($post->path) }}" alt="">
                    </a>
                </div>
            @endforeach
        </div>
        <div class="like_list hidden" id="like">
            @foreach($likes as $like)
                <div class="">
                    <a href="{{ route('posts.show',$like['post_id']) }}">
                        <img src="{{ asset($like->path) }}" alt="">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</main>
@endsection
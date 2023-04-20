@extends('common.header')
@section('content')
@can('user')
<main>
    @foreach($posts as $post)
    <div class="post_container">
    <!-- ユーザー情報 メイン-->
        <div class="user_link">
            <a href="{{ route('users.show',$post['user_id']) }}">
                    <!-- 画像 -->
                    <div><img class="profile_img" src="{{ asset($post->user->image_path) }}" alt=""></div>
                    <!-- 名前 -->
                    <span class="username">{{ $post->user->name }}</span>
            </a>
            @if($like_model->like_exist(Auth::user()->id,$post->id))
            <p class="favorite-marke">
                <a class="js-like-toggle loved like" href="" data-postid="{{ $post->id }}"><i class="fas fa-heart fa-2x"></i></a>
                <span class="likesCount">{{$post->likes_count}}</span>
            </p>
            @else
            <p class="favorite-marke">
                <a class="js-like-toggle like" href="" data-postid="{{ $post->id }}"><i class="fas fa-heart fa-2x"></i></a>
                <span class="likesCount">{{$post->likes_count}}</span>
            </p>
            @endif
        </div>
        <a href="{{ route('posts.show',$post['id']) }}">
            <div class="img_container">
                <div class="img_wrap">
                    <img src="{{ asset($post->path) }}" alt="" class="img_radius">
                    <div class="post_text_container">
                        <p class="post_text">{{ $post['text'] }}</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</main>
@endcan
@endsection
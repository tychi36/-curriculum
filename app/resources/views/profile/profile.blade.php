@extends('common.header')
@section('content')
<main>
    <div>
        <div class="icon"><img src="{{ asset(Auth::user()->image) }}" alt=""></div>
        <div class="profile">{{ Auth::user()->name }}</div>
        <textarea name="profile_text" id="" cols="30" rows="10">{{ Auth::user()->profile_text }}</textarea>
        <a href="{{ route('editProfile') }}">プロフィールを編集</a>
    </div>
    <div>
        <div>
            <button class="posts-list">投稿一覧</button>
            <button class="likes-list">いいね一覧</button>
        </div>
        <div>
        @foreach($posts as $post)
        <div class="card" style="width: 18rem;">
            <img src="" class="card-img-top" alt="">
            <div class="card-body">
                <img src="{{ asset($post->path) }}" alt="" class="card-img-top">
                <p class="card-text">{{ $post['text'] }}</p>
                <a href="{{ route('posts.show',$post['id']) }}" class="btn btn-primary stretched-link">Go somewhere</a>
            </div>
        </div>
        @endforeach
        </div>
    </div>
</main>
@endsection
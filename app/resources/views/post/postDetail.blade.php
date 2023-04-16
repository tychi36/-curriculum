@extends('common.header')
@section('content')
<main>
    <div>
        <div class="post_container">
            @if(Route::is('posts.show'))
            <div class="">
                @if($post['user_id'] === Auth::id())
                <button class="button_none"><a href="{{ route('posts.edit',$post['id']) }}">編集</a></button>
                <form action="{{ route('posts.destroy',$post['id']) }}" method="post">
                @csrf
                @method('delete')
                    <button class="button_none" type="submit" onclick="return confirm('本当に削除しますか？')">削除</button>
                </form>
                @else
                <button class="violarion-button" onclick="return confirm('違反報告しますか？')"><a href="{{ route('violation',['Post' => $post['user_id']]) }}">違反報告</a></button>
                @endif
            </div> 
            @elseif(Route::is('hosts.show'))   
            <button class="button_none"><a href="">管理画面へ戻る</a></button>
            @endif
            <!-- 画像 -->
            <div class="user_info">
                <img class="profile_img" src="{{ asset($user->image_path) }}" alt="">
                <span class="username">{{ $user['name'] }}</span>
            </div>
            <div class="img_wrap">
                <img src="{{ asset($post->path) }}" alt="" class="">
                <div>
                    <p class="">{{ $post['text'] }}</p>
                </div>
            </div>
        </div>
        <div class="comment_container">
            <div class="user_info">
                <img class="profile_img" src="" alt="">
                <span class="username"></span>
            </div>
            <p></p>
            <form action="{{ route('comments.index',Auth::id()) }}" method="post" class="comment">
                @csrf
                <textarea name="comment" id="" cols="100" rows="3"></textarea>
                <button>送信</button>
            </form>
        </div>
    </div>
</main>
@endsection
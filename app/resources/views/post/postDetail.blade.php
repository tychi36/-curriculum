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
        @if(Route::is('post.show'))
        <div class="comment_container">
            @foreach($comments as $comment)
            <div class="user_info">
                <img class="profile_img" src="{{ asset(Auth::user()->image_path) }}" alt="">
                <span class="username">{{ Auth::user()->name }}</span>
            </div>
            <div class="">
                <p>{{ $comment['comment'] }}</p>
                @if($comment['user_id'] === Auth::id())
                <button class="comment_edit button_none">編集</button>
                <form action="{{ route('comments.destroy',$comment['id']) }}" method="post">
                @csrf
                @method('delete')
                    <input type="hidden" value="{{$comment['post_id']}}" name="post_id">
                    <button class="button_none" type="submit" onclick="return confirm('本当に削除しますか？')">削除</button>
                </form>
                <form action="{{ route('comments.update',$comment['id']) }}" method="post" class="hidden" id="comment_edit">
                    @method('patch')
                    @csrf
                    <input type="hidden" value="{{$post['id']}}" name="post_id">
                    <textarea name="comment" id="" cols="100" rows="3">{{ $comment['comment'] }}</textarea>
                    <button>送信</button>
                </form>
            @endif
            </div>
            @endforeach
        </div>
        <div class="comment_input">
            <form action="{{ route('comments.index',Auth::id()) }}" method="post" class="">
                @csrf
                <input type="hidden" value="{{$post['id']}}" name="post_id">
                <textarea name="comment" id="" cols="100" rows="3" placeholder="コメントを追加"></textarea>
                <button>送信</button>
            </form>
        </div>
        @endif
    </div>
</main>
@endsection
@extends('common.header')
@section('content')
<main>
    <div>
        <div class="post_container">
            <!-- 画像 -->
            <div class="user_info justify-content-between user_info_margin">
                <a href="{{ route('users.show',$user['id']) }}">
                    <img class="profile_img" src="{{ asset($post->user->image_path) }}" alt="">
                    <span class="username">{{ $user['name'] }}</span>
                </a>
                @if(Route::is('posts.show'))
                <div class="d-flex">
                    @if($post['user_id'] === Auth::id())
                    <button class="button_none mr-2"><a href="{{ route('posts.edit',$post['id']) }}">編集</a></button>
                    <form action="{{ route('posts.destroy',$post['id']) }}" method="post">
                    @csrf
                    @method('delete')
                        <button class="button_none" type="submit" onclick="return confirm('本当に削除しますか？')">削除</button>
                    </form>
                    @else
                    <button class="violarion-button button_none" onclick="return confirm('違反報告しますか？')"><a href="{{ route('violation',['Post' => $post['user_id']]) }}">違反報告</a></button>
                    @endif
                </div> 
                @elseif(Route::is('hosts.show'))   
                <button class="button_none"><a href="">管理画面へ戻る</a></button>
                @endif
            </div>
            <div class="img_wrap">
                    <img src="{{ asset($post->path) }}" alt="" class="">
                <div class="post_text_container">
                    <p class="post_text">{{ $post['text'] }}</p>
            </div>
        </div>
        <div class="comment_container">
            @foreach($comments as $comment)
            <div class="comment">
                <div class="user_info justify-content-between">
                    <div>
                        <img class="profile_img" src="{{ asset($user['image_path']) }}" alt="">
                        <span class="username">{{ $comment['name'] }}</span>
                    </div>
                    <div class="d-flex">
                        @if($comment['user_id'] === Auth::id() || Auth::user()->role === 1)
                        <div class="d-flex">
                            <button class="comment_edit button_none mr-2">編集</button>
                            <form action="{{ route('comments.destroy',$comment['id']) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="hidden" value="{{$comment['post_id']}}" name="post_id">
                                <button class="button_none" type="submit" onclick="return confirm('本当に削除しますか？')">削除</button>
                            </form>
                        </div>
                        @endif         
                    </div>
                </div>
                <p>{{ $comment['comment'] }}</p>
                <form action="{{ route('comments.update',$comment['id']) }}" method="post" class="hidden" id="comment_edit">
                    @method('patch')
                    @csrf
                    <input type="hidden" value="{{$comment['id']}}" name="post_id">
                    <textarea name="comment" id="" cols="100" rows="3">{{ $comment['comment'] }}</textarea>
                    <button>送信</button>
                </form>
            </div>
            @endforeach
           
        </div>
        <div class="comment_input">
            <form action="{{ route('comments.store') }}" method="post" class="d-flex align-items-center justify-content-between">
                @csrf
                <input type="hidden" value="{{$post['id']}}" name="post_id">
                <textarea class="border_none add_comment" name="comment" id="" cols="90" rows="1" placeholder="コメントを追加"></textarea>
                <button class="border_none">投稿</button>
            </form>
        </div>
    </div>
</main>
@endsection
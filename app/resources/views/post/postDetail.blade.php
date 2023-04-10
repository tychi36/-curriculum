@extends('common.header')
@section('content')
<main>
    <div>
        <div class="card" style="width: 18rem;">
            @if($post['user_id'] === Auth::id())
            <button><a href="{{ route('posts.edit',$post['id']) }}">編集</a></button>
            <form action="{{ route('posts.destroy',$post['id']) }}" method="post">
            @csrf
            @method('delete')
                <button type="submit" onclick="return confirm('本当に削除しますか？')">削除</button>
            </form>
            @else
            <button>いいね</button>
            <button onclick="return confirm('違反報告しますか？')"><a href="{{ route('violation',['Post' => $post['user_id']]) }}">違反報告</a></button>
            @endif
            <!-- 画像 -->
            <img src="{{ asset($user->image_path) }}" alt="">
                    <!-- 名前 -->
                    <span>{{ $user['name'] }}</span>
            <img src="" class="card-img-top" alt="">
            <div class="card-body">
                <img src="{{ asset($post->path) }}" alt="" class="card-img-top">
                <p class="card-text">{{ $post['text'] }}</p>
            </div>
        </div>
        </div>
    </div>
</main>
@endsection
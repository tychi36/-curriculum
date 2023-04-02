@extends('common.header')
@section('content')
<main>
    <div>
        <div class="card" style="width: 18rem;">
            @if($post['user_id'] === Auth::id())
            <button>編集</button>
            <button>削除</button>
            @else
            <button>いいね</button>
            <button>違反報告</button>
            @endif
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
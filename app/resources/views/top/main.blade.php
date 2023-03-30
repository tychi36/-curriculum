@extends('common.header')
@section('content')
<main>
    <div>aaa
        <div>
            <div>
                @foreach($posts as $post)
                <!-- ユーザー情報 メイン-->
                <a href="">
                    <!-- 画像 -->
                    <img src="" alt="">
                    <!-- 名前 -->
                    <span>{{ $post['name'] }}</span>
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset($post->path) }}" class="card-img-top" alt="">
                        <div class="card-body">
                            <p class="card-text">{{ $post['text'] }}</p>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>                          
    </div>
</main>
@endsection
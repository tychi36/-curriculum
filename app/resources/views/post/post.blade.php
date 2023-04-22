@extends('common.header')
@section('content')
<main class="w-100">
    <div>
        @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <form class="form" action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="">画像</label>
            <input type="file" name="image" value="{{ old('image') }}">
        </div>
        <div>
            <label for="">テキスト</label>
            <textarea name="text" id="" cols="30" rows="10" value="{{ old('text') }}" placeholder="文章を入れてください"></textarea>
        </div>
        <button class="button btn-info">投稿する</button>
    </form>
</main>
@endsection
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
        <label for="">画像</label>
        <input type="file" name="image" value="{{ old('image') }}">
        <label for="">テキスト</label>
        <textarea name="text" id="" cols="30" rows="10" value="{{ old('text') }}" placeholder="文章を入れてください"></textarea>
        <button class="button">シェア</button>
    </form>
</main>
@endsection
@extends('common.header')
@section('content')
<main>
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
    <form action="{{ route('post_process') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="" class="form-label">画像</label>
        <input type="file" name="image" class="form-control" value="{{ old('image') }}">
        <label for="" class="form-label">テキスト</label>
        <textarea name="text" class="form-control" id="" cols="30" rows="10" value="{{ old('text') }}" placeholder="文章を入れてください"></textarea>
        <button>シェア</button>
    </form>
</main>
@endsection
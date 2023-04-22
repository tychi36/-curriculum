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
    <form class="form" action="{{ route('users.update',Auth::id()) }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div>
            <label for="">プロフィール画像</label>
            <input type="file" name="image" value="{{ asset(Auth::user()->image_path) }}">
        </div>
        <div>
            <label for="">名前</label>
            <input type="text" name="name" value="{{ Auth::user()->name }}">
        </div>
        <div>
            <label for="">プロフィール文</label>
            <textarea type="text" name="profile_text" id="" cols="30" rows="10" placeholder="プロフィールを入力してください">{{Auth::user()->profile_text}}</textarea>
        </div>
        <div>
            <label for="">メールアドレス</label>
            <input type="text" value="{{ Auth::user()->email }}">
        </div>
        <button>完了</button>
    </form>
</main>
@endsection
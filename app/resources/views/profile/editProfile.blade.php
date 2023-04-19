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
        <input type="file" name="image" value="{{ asset(Auth::user()->image_path) }}">
        <input type="text" name="name" value="{{ Auth::user()->name }}">
        <textarea type="text" name="profile_text" id="" cols="30" rows="10" placeholder="プロフィールを入力してください">{{Auth::user()->profile_text}}</textarea>
        <button>完了</button>
    </form>
</main>
@endsection
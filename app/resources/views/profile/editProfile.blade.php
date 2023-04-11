@extends('common.header')
@section('content')
<main>
    <form class="form" action="{{ route('users.update',Auth::id()) }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <input type="file" name="image" value="{{ asset(Auth::user()->image) }}">
        <input type="text" name="name" value="{{ Auth::user()->name }}">
        <textarea type="text" name="profile_text" id="" cols="30" rows="10" placeholder="プロフィールを入力してください">{{Auth::user()->profile_text}}</textarea>
        <button>完了</button>
    </form>
</main>
@endsection
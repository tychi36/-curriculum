@extends('common.header')
@section('content')
<main>
    <form action="{{ route('editProfile_update', ['userData' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" value="{{ asset(Auth::user()->image) }}">
        <input type="text" value="{{ Auth::user()->name }}">
        <textarea type="text" name="" id="" cols="30" rows="10" placeholder="プロフィールを入力してください">{{Auth::user()->profile_text}}</textarea>
        <button>完了</button>
    </form>
</main>
@endsection
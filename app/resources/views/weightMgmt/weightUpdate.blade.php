@extends('common.header')
@section('content')
<div>
    <nav>
        <ul>
        <li><a href="{{ route('top') }}">ホームへ</a></li>
        <li><a href="{{ route('weightDetail_list') }}">進捗一覧</a></li>
        </ul>
    </nav>
</div>
<main>
    <form action="" method="post">
        <input type="date">
        <input type="text">
        <textarea name="" id="" cols="30" rows="10"></textarea>
        <button>完了</button>
    </form>
</main>
@endsection
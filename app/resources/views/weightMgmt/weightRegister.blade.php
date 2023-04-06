@extends('common.header')
@section('content')
<main>
    <h3>進捗登録</h3>
    <form action="{{ route('weight_mgmts.store') }}" method="post">
        @csrf
        <input type="date" name="date">
        <input type="number" step="0.1" name="weight">
        <textarea name="comment" id="" cols="30" rows="10"></textarea>
        <button type="submit">完了</button>
    </form>
</main>
@endsection
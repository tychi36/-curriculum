@extends('common.header')
@section('content')
<main>
    <h3>目標設定</h3>
    <form action="{{ route('weight_goals.store') }}" method="post">
        @csrf
        <input type="date" name="period" placeholder="目標達成までの期間">
        <input type="number" step="0.1" name="goal" placeholder="目標体重">
        <input type="number" step="0.1" name="weight" placeholder="現在の体重">
        <button type="submit">完了</button>
    </form>
</main>
@endsection
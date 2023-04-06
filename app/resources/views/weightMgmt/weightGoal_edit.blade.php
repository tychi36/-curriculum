@extends('common.header')
@section('content')
<main>
    <h3>目標編集</h3>
    <form action="{{ route('weight_goals.update',$goal['id']) }}" method="post">
        @method('put')
        @csrf
        <input type="date" name="period" placeholder="目標達成までの期間" value="{{ $goal['period'] }}">
        <input type="number" step="0.1" name="goal" placeholder="目標体重" value="{{ $goal['goal'] }}">
        <input type="number" step="0.1" name="weight" placeholder="現在の体重" value="{{ $goal['weight'] }}">
        <button type="submit">完了</button>
    </form>
</main>
@endsection
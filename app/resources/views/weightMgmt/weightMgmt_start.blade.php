@extends('common.header')
@section('content')
<main>
    <h3>目標設定</h3>
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
    <form class="form" action="{{ route('weight_goals.store') }}" method="post">
        @csrf
        <div>
            <label for="">目標達成までの期間</label>
            <input type="date" name="period" placeholder="目標達成までの期間" value="{{ old('period') }}">
        </div>
        <div>
            <label for="">目標体重</label>
            <input type="number" step="0.1" name="goal" placeholder="目標体重" value="{{ old('goal') }}">
        </div>
        <div>
            <label for="">現在の体重</label>
            <input type="number" step="0.1" name="weight" placeholder="現在の体重" value="{{ old('weight') }}">
        </div>
        <button class="button btn-info">完了</button>
    </form>
</main>
@endsection
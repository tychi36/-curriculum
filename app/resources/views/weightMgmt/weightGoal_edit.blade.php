@extends('common.header')
@section('content')
<main>
    <h3>目標編集</h3>
    <ul class="nav-menu">
        <li class="">
            <a class="" aria-current="page" href="{{ route('weight_mgmts.create')}}">入力</a>
        </li>
        <li class="">
            <form action="" method="post">
                @csrf
                @method('delete')
                <button class="button_none" type="submit" onclick="return confirm('目標をリセットしますか？')">目標リセット</button>
            </form>
        </li>
    </ul>
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
    <form class= "form"  action="{{ route('weight_goals.update',$goal['id']) }}" method="post">
        @method('put')
        @csrf
        <input type="date" name="period" placeholder="目標達成までの期間" value="{{ $goal['period'] }}">
        <input type="number" step="0.1" name="goal" placeholder="目標体重" value="{{ $goal['goal'] }}">
        <input type="number" step="0.1" name="weight" placeholder="現在の体重" value="{{ $goal['weight'] }}">
        <button class="button" type="submit">完了</button>
    </form>
</main>
@endsection
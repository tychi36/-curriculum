@extends('common.header')
@section('content')
<main>
    <h3>目標設定</h3>
    <ul class="nav-menu">
        <li class="d">
            <a class="" aria-current="page" href="{{ route('weight_mgmts.create')}}">入力</a>
        </li>
        <li class="">
            <a class="" aria-current="page" href="">編集</a>
        </li>
        <li class="">
            <form action="" method="post">
                @csrf
                @method('delete')
                <button class="button_none" type="submit" onclick="return confirm('本当に削除しますか？')">削除</button>
            </form>
        </li>
        <li class="">
            <form action="" method="post">
                @csrf
                @method('delete')
                <button class="button_none" type="submit" onclick="return confirm('目標をリセットしますか？')">目標リセット</button>
            </form>
        </li>
        <li class="">
            <a class="" aria-current="page" href="">目標編集</a>
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
    <form class="form" action="{{ route('weight_goals.store') }}" method="post">
        @csrf
        <input type="date" name="period" placeholder="目標達成までの期間" value="{{ old('period') }}">
        <input type="number" step="0.1" name="goal" placeholder="目標体重" value="{{ old('goal') }}">
        <input type="number" step="0.1" name="weight" placeholder="現在の体重" value="{{ old('weight') }}">
        <button class="button" type="submit">完了</button>
    </form>
</main>
@endsection
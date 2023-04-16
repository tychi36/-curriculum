@extends('common.header')
@section('content')
<main>
    <h3>進捗登録</h3>
    <nav class="">
        <ul class="nav-menu">
            <li class="">
                <a class="" aria-current="page" href="{{ route('weight_mgmts.index') }}">目標一覧</a>
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
    </nav>
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
    <form class="form" action="{{ route('weight_mgmts.store') }}" method="post">
        @csrf
        <input type="date" name="date" value="{{ old('date') }}">
        <input type="number" step="0.1" name="weight" value="{{ old('weight') }}">
        <textarea name="comment" id="" cols="30" rows="10" value="{{ old('comment') }}"></textarea>
        <button type="submit">完了</button>
    </form>
</main>
@endsection
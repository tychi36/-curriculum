@extends('common.header')
@section('content')
<main>
    <h3>編集</h3>
    <ul class="nav-menu">
        <li>
            <a class="" aria-current="page" href="{{ route('weight_mgmts.index')}}">進捗一覧</a>
        </li>
        <li class="">
            <a class="" aria-current="page" href="{{ route('weight_mgmts.create')}}">進捗入力</a>
        </li>
        <li class="">
            <form action="{{ route('weight_goals.destroy',$goal['id']) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" onclick="return confirm('目標をリセットしますか？')">目標リセット</button>
            </form>
        </li>
        <li class="">
            <a class="" aria-current="page" href="{{ route('weight_goals.edit',$goal['id']) }}">目標編集</a>
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
    <form class="form" action="{{ route('weight_mgmts.update',$weight_mgmt['id']) }}" method="post">
        @method('put')
        @csrf
        <div>
            <label for="">日付</label>
            <input type="date" name ="date" value="{{ $weight_mgmt['date'] }}">
        </div>
        <div>
            <label for="">体重</label>
            <input type="number" name="weight" value="{{ $weight_mgmt['weight'] }}">
        </div>
        <div>
            <label for="">メモ</label>
            <textarea name="comment" id="" cols="30" rows="10">{{ $weight_mgmt['comment'] }}</textarea>
        </div>
        <button class="button btn-info">完了</button>
    </form>
</main>
@endsection
@extends('common.header')
@section('content')
<main>
    <h3>進捗登録</h3>
    <ul class="nav-menu">
        @if(DB::table('weight_mgmts')->where('user_id',Auth::id())->exists())
        <li>
            <a class="" aria-current="page" href="{{ route('weight_mgmts.index')}}">進捗一覧</a>
        </li>
        @endif
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
    <form class="form" action="{{ route('weight_mgmts.store') }}" method="post">
        @csrf
        <div>
            <label for="">日付</label>
            <input type="date" name="date" value="{{ old('date') }}">
        </div>
        <div>
            <label for="">現在の体重</label>
            <input type="number" step="0.1" name="weight" value="{{ old('weight') }}">
        </div>
        <div>
            <label for="">メモ</label>
            <textarea name="comment" id="" cols="30" rows="10" value="{{ old('comment') }}"></textarea>
        </div>
        <button class="button btn-info">完了</button>
    </form>
</main>
@endsection
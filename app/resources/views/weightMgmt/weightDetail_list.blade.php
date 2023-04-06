@extends('common.header')
@section('content')
<nav class="">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('weight_mgmts.create')}}">入力</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('weight_mgmts.edit',$dairy['id']) }}">編集</a>
        </li>
        <li class="nav-item">
            <form action="{{ route('weight_mgmts.destroy',$dairy['id']) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" onclick="return confirm('本当に削除しますか？')">削除</button>
            </form>
        </li>
        <li class="nav-item">
            <form action="{{ route('weight_goals.destroy',$goal['id']) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" onclick="return confirm('目標をリセットしますか？')">目標リセット</button>
            </form>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('weight_goals.edit',$goal['id']) }}">目標編集</a>
        </li>
    </ul>
</nav>
<main class="d-flex align-items-center justify-content-center">
    <section class="weight-list w-75 mx-auto text-center">
        <div class="w-25 d-inline-block p-5 border shadow rounded text-center m-1">日付：{{ $dairy['date'] }}</div>
        <div class="w-25 d-inline-block p-5 border shadow rounded text-center m-1">目標まで残り{{ $commit }}日</div>
        <div class="w-50 d-inline-block text-center m-1">
            @if($dairy_prev)
            <span><a href="{{ route('weight_mgmts.show',$dairy_prev['id']) }}"><</a></span>
            @endif
            <div class="w-75 d-inline-block p-5 border shadow  rounded text-center ">{{ $dairy['weight'] }}Kg</div>
            @if($dairy_next)
            <span><a href="{{ route('weight_mgmts.show',$dairy_next['id']) }}">></a></span>
            @endif
        </div>
        <div class="w-50 d-inline-block p-5 border shadow rounded text-center m-1">{{ $dairy['comment'] }}</div>
    </section>
</main>
@endsection
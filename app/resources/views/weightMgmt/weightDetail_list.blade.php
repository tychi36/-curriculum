@extends('common.header')
@section('content')
<main class="">
    <h3>目標一覧</h3>
    <nav class="nav-container">
        <div>
            <span>
                @if($dairy_prev)
                <a href="{{ route('weight_mgmts.show',$dairy_prev['id']) }}"><i class="fa fa-chevron-circle-left fa-2x arrow_color"></i></a>
                @elseif(!$dairy_prev)
                <a href=""><i class="fa fa-chevron-circle-left fa-2x" style="color: gainsboro;"></i></a>
                @endif
            </span>
            <span>
                @if($dairy_next)
                <a href="{{ route('weight_mgmts.show',$dairy_next['id']) }}"><i class="fa fa-chevron-circle-right fa-2x arrow_color"></i></a>
                @else
                <a href=""><i class="fa fa-chevron-circle-right fa-2x" style="color: gainsboro;"></i></a>

                @endif
            </span>
        </div>
        <div class="goal">目標達成日：{{ $dairy['date'] }}</div>
        <ul class="nav-menu">
            <li class="">
                <a class="" aria-current="page" href="{{ route('weight_mgmts.create')}}">入力</a>
            </li>
            <li class="">
                <a class="" aria-current="page" href="{{ route('weight_mgmts.edit',$dairy['id']) }}">編集</a>
            </li>
            <li class="">
            <form action="{{ route('weight_mgmts.destroy',$dairy['id']) }}" method="post">
                @csrf
                @method('delete')
                <button class="button_none" type="submit" onclick="return confirm('本当に削除しますか？')">削除</button>
            </form>
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
    </nav>
    <section class="weight_list">
        <div class="d-flex weight_contents_container">
            <div class="weight_contents">目標まで残り{{ $commit }}日</div>
            <div class="weight_contents">目標まで残り{{ abs($weight) }}kg</div>
        </div>
        <div class="weight_contents">現在{{ $dairy['weight'] }}Kg</div>
        <div class="weight_contents">{{ $dairy['comment'] }}</div>
    </section>
</main>
@endsection
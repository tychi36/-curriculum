@extends('common.header')
@section('content')
<nav class="">
    
</nav>
<main class="">
    <section class="weight_list">
        <div class="d-flex weight_contents_container">
            <div class="weight_contents">日付：{{ $dairy['date'] }}</div>
            <div class="weight_contents">目標まで残り{{ $commit }}日</div>
        </div>
        <div class="">
            @if($dairy_prev)
            <span><a href="{{ route('weight_mgmts.show',$dairy_prev['id']) }}"><</a></span>
            @endif
            <div class="weight_contents">{{ $dairy['weight'] }}Kg</div>
            @if($dairy_next)
            <span><a href="{{ route('weight_mgmts.show',$dairy_next['id']) }}">></a></span>
            @endif
        </div>
        <div class="weight_contents">{{ $dairy['comment'] }}</div>
    </section>
</main>
@endsection
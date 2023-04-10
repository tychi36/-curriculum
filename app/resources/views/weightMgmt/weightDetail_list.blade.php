@extends('common.header')
@section('content')
<nav class="">
    
</nav>
<main class="d-flex align-items-center justify-content-center mx-auto w-75">
    <section class="weight-list mx-auto text-center">
        <div class="w-100 d-inline-block text-center">
            <div class="d-inline-block py-5 border shadow rounded text-center">日付：{{ $dairy['date'] }}</div>
            <div class="d-inline-block py-5 border shadow rounded text-center">目標まで残り{{ $commit }}日</div>
        </div>
        <div class="w-100 d-inline-block text-center">
            @if($dairy_prev)
            <span><a href="{{ route('weight_mgmts.show',$dairy_prev['id']) }}"><</a></span>
            @endif
            <div class="w-75 d-inline-block p-5 border shadow  rounded text-center">{{ $dairy['weight'] }}Kg</div>
            @if($dairy_next)
            <span><a href="{{ route('weight_mgmts.show',$dairy_next['id']) }}">></a></span>
            @endif
        </div>
        <div class="w-100 d-inline-block p-5 border shadow rounded text-center">{{ $dairy['comment'] }}</div>
    </section>
</main>
@endsection
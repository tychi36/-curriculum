@extends('common.header')
@section('content')
<main class="d-flex align-items-center justify-content-center">
    <section class="weight-list w-75 mx-auto text-center">
        <div class="w-25 d-inline-block p-5 border shadow rounded text-center m-1">目標まで残り○日</div>
        <div class="w-25 d-inline-block p-5 border shadow rounded text-center m-1">目標まで残り○kg</div>
        <div class="w-50 d-inline-block text-center m-1">
            <span><img src="" alt=""></span>
            <div class="w-75 d-inline-block p-5 border shadow  rounded text-center "></div>
            <span><img src="../../../public/images/矢印ボタン左3.png" alt="" class="bg-info"></span>
        </div>
        <div class="w-50 d-inline-block p-5 border shadow rounded text-center m-1">コメント</div>
    </section>
</main>
@endsection
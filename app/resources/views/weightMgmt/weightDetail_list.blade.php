@extends('common.header')
@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{ route('top') }}">ホーム</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{ route('weightRegister') }}">進捗入力</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{ route('weightUpdate')}}">進捗編集</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="">目標リセット</a>
        </li>
    </ul>
</nav>
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
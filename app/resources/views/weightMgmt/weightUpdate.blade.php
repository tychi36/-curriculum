@extends('common.header')
@section('content')
<main>
    <h3>編集</h3>
    <nav class="">
        <ul class="nav-menu">
            <li class="">
                <a class="" aria-current="page" href="{{ route('weight_mgmts.index') }}">目標一覧</a>
            </li>
            <li class="">
                <a class="" aria-current="page" href="{{ route('weight_mgmts.create')}}">入力</a>
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
    <form class="form" action="{{ route('weight_mgmts.update',$weight_mgmt['id']) }}" method="post">
        @method('put')
        @csrf
        <input type="date" name ="date" value="{{ $weight_mgmt['date'] }}">
        <input type="number" name="weight" value="{{ $weight_mgmt['weight'] }}">
        <textarea name="comment" id="" cols="30" rows="10">{{ $weight_mgmt['comment'] }}</textarea>
        <button class="button">完了</button>
    </form>
</main>
@endsection
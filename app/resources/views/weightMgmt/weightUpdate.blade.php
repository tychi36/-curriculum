@extends('common.header')
@section('content')
<main>
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
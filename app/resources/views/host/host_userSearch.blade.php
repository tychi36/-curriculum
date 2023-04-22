@extends('common.header')
@section('content')
@can('admin')
<main>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">名前</th>
            <th scope="col">違反報告</th>
            <th scope="col">ページ遷移</th>
            <th scope="col">ユーザー削除</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user['id'] }}</th>
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['violation'] }}</td>
                <td><a href="{{ route('hosts.show',$user['id']) }}">ユーザーページへ</a></td>
                <td>
                    <form action="{{ route('hosts.destroy',$user['id']) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="button_none" type="submit" onclick="return confirm('本当に削除しますか？')">削除</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</main>
@endcan
@endsection

@extends('common.header')
@section('content')
@can('admin')
<main>
    <table class="host_table">
        <thead>
            <tr>
                <td>ID</td>
                <td>名前</td>
                <td>プロフィール</td>
                <td>違反報告</td>
                <td>ページ遷移</td>
                <td>ユーザー削除</td>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user['id'] }}</td>
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['profile_text'] }}</td>
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

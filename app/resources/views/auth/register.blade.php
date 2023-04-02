<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://unpkg.com/sanitize.css/typography.css" rel="stylesheet"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body></body>
  <main>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col col-md-offset-3 col-md-6">
          <nav class="card mt-5">
            <div class="card-header">会員登録</div>
            <div class="card-body">
              @if($errors->any())
                <div class="alert alert-danger">
                  @foreach($errors->all() as $message)
                    <p>{{ $message }}</p>
                  @endforeach
                </div>
              @endif
              <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="email">メールアドレス</label>
                  <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
                </div>
                <div class="form-group">
                  <label for="name">ユーザー名</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
                </div>
                <div class="form-group">
                  <label for="password">パスワード</label>
                  <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                  <label for="password-confirm">パスワード（確認）</label>
                  <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
                </div>
                <div class="text-right">
                  <button type="submit" class="btn btn-primary">送信</button>
                </div>
              </form>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </main>
</body>
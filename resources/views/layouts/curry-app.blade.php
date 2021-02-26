<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/styles.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Potta+One&display=swap" rel="stylesheet">
</head>
<body>
  @include('components.header')
  <nav id="nav" class="in">
    <ul>
      <li><a href="/">トップ</a></li>
      <li><a href="login">ログイン</a></li>
      <li><a href="register">ユーザ登録</a></li>
      <li><a href="image_upload">投稿</a></li>
      <li><a href="disp">投稿一覧</a></li>
      <li><a href="mypage">マイページ</a></li>
    </ul>
  </nav>
  <main>
    @yield('content')
  </main>
  @section('script')
    @if(Auth::check())
      <script>
        document.getElementById('logout').addEventListener('click', function(event) {
          event.preventDefault();
          document.getElementById('logout-form').submit();
        });
      </script>
    @endif
    <script>
    document.getElementById('menu').addEventListener('click', function () {
      document.getElementById('nav').classList.toggle('in');
    });
    </script>
  @show
</body>
</html>

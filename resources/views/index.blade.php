@include('components.header')
  <nav id="nav" class="in">
    <ul>
      <li><a href="/">トップ</a></li>
      <li><a href="/login">ログイン</a></li>
      <li><a href="/register">ユーザ登録</a></li>
      <li><a href="image_upload">投稿</a></li>
      <li><a href="disp">投稿一覧</a></li>
    </ul>
  </nav>
<main>
  <div class="container" style="margin-top: 300px;margin-bottom: 15%;">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-warning">
          <div class="panel-heading">メニュー</div>
          <div class="panel-body">
            @if(Auth::check())
            <div class="form-group">
              <a class="btn btn-warning btn-block" style="font-size: 200%" href="image_upload">画像投稿</a>
            </div>
            <div class="form-group">
              <a class="btn btn-warning btn-block" style="font-size: 200%" href="disp">画像一覧</a>
            </div>
            @else
            <div class="form-group">
              <a class="btn btn-warning btn-block" style="font-size: 200%" href="login">ログイン</a>
            </div>
            <div class="form-group">
              <a class="btn btn-warning btn-block" style="font-size: 200%" href="register">ユーザ登録</a>
            </div>
          </div>
            @endif
        </nav>
        <div class="text-center">
          <a href="{{ route('password.request') }}" style="color: #ffff; font-size:120%">パスワードの変更はこちらから</a>
        </div>
      </div>
    </div>
  </div>
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
      console.log('クリックされた');
      document.getElementById('nav').classList.toggle('in');
    });
  </script>
</main>

</body>
</html>

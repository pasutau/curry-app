@component('components.header')
@endcomponent

<main>
  <div class="container" style="margin-top: 300px;margin-bottom: 15%;">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-warning">
          <div class="panel-heading">メニュー</div>
          <div class="panel-body">
            <div class="form-group">
              <a class="btn btn-warning btn-block" style="font-size: 200%" href="login">ログイン</a>
            </div>
            <div class="form-group">
              <a class="btn btn-warning btn-block" style="font-size: 200%" href="register">ユーザ登録</a>
            </div>
          </div>
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
</main>

</body>
</html>

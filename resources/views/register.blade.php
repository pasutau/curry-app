<!DOCTYPE html>
<html lang="ja"> 
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
<header>
  <nav class="my-navbar">
    <a class="my-navbar-brand" href="/">Curry App</a>
    <div class="my-navbar-control">
      <a class="my-navbar-item" href="/login">ログイン</a>
        ｜
      <a class="my-navbar-item" href="http://todooo-app.herokuapp.com/register">ユーザ登録</a>
    </div>
  </nav>
</header>
<main>
  <div class="container" style="margin-top: 250px;margin-bottom: 15%;">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">ユーザ登録</div>
          <div class="panel-body">
            <form action="http://todooo-app.herokuapp.com/register" method="POST">
              <input type="hidden" name="_token" value="4JOzSn3DHS9HWdmsIyCjfKt3Ywnxg5mqWQk7580L">
              <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="text" class="form-control" id="email" name="email" value="" />
              </div>
              <div class="form-group">
                <label for="name">ユーザー名</label>
                <input type="text" class="form-control" id="name" name="name" value="" />
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
</html>
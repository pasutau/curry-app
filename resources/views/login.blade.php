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
      <a class="my-navbar-item" href="/register">ユーザ登録</a>
    </div>
  </nav>
</header>
  <main>
    <div class="container" style="margin-top: 300px;margin-bottom: 15%;">
      <div class="row">
        <div class="col col-md-offset-3 col-md-6">
          <nav class="panel panel-default">
            <div class="panel-heading">ログイン</div>
            <div class="panel-body">
              <form action="http://todooo-app.herokuapp.com/login" method="POST">
                <input type="hidden" name="_token" value="Hebk2JOgP24WuslVHNlqcTRtGyrIu5LTn5WsMzVt">
                  <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="text" class="form-control" id="email" name="email" value="" />
                  </div>
                  <div class="form-group">
                    <label for="password">パスワード</label>
                    <input type="password" class="form-control" id="password" name="password" />
                  </div>
                  <div class="text-right">
                    <button type="submit" class="btn btn-primary">送信</button>
                  </div>
              </form>
            </div>
          </nav>
          <div class="text-center">
            <a href="http://todooo-app.herokuapp.com/password/reset" style="color: #ffff; font-size:120%">パスワードの変更はこちらから</a>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
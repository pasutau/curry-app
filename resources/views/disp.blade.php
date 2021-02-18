@include('components.header')
<aside>
  <nav id="nav" class="in">
    <ul>
      <li><a href="#">トップ</a></li>
      <li><a href="#">ログイン</a></li>
      <li><a href="#">ユーザ登録</a></li>
      <li><a href="#">投稿</a></li>
      <li><a href="#">投稿一覧</a></li>
    </ul>
  </nav>
</aside>

<main>
  <div class="content">
    <div class="cards">
      {{-- 投稿画像、タイトル一覧表示 --}}
      @for ($i = 0; $i < count($file_url); $i++)
        <div class="card">
            <img class="card-img-top" src="{{ url("{$file_url[$i]}")}}" />
            <div class="img-title">
                <a class="img-title" href="">{{ $image_title[$i] }}</a>
            </div>
        </div>
      @endfor
    </div>
  </div>
</main>
@if(Auth::check())
  <script>
    document.getElementById('logout').addEventListener('click', function(event) {
      event.preventDefault();
      document.getElementById('logout-form').submit();
    });
  </script>
  <script>
    document.getElementById('menu').addEventListener('click' , function () {
      document.getElementById('nav').classList.toggle('in');
    });
  </script>
@endif
</body>
</html>

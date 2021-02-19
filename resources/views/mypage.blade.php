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
      @foreach ($image_info as $url=>$title)
        <div class="card">
            <img class="card-img-top" src="{{ url("$url")}}" />
            <div class="img-title">
              <a class="img-title" href="">{{ $title }}</a>
            </div>
            <form action="{{  route('delete')  }}" method="POST">
              @method('DELETE')
              @csrf
              <div id="del-modal-open" type="submit" class="btn btn-danger">削除</div>
              <input type="hidden" id="img-del-submit" name="url" value="{{ $url }} ">

              {{--　削除確認ウィンドウ --}}
              <div id="del-confirm-mask" class="del-confirm-mask"></div>
              <div id="del-modal" class="del-modal" data-target="del-modal{{ $loop->index }}">
                <p class="del-message">{{ $title }} を削除しますか？</p>
                <div class="del-btns">
                  <button id="del-ok" class="btn btn-danger">削除する</button>
                  <div id="del-cancel" class="btn btn-default">キャンセル</div>
                </div>
              </div>

            </form>
        </div>
      @endforeach
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
  <script>
    //削除確認画面の動作
	const open = document.getElementById('del-modal-open');
	const close = document.getElementById('del-cancel');
	const modal = document.getElementById('del-modal');
	const mask = document.getElementById('del-confirm-mask');

	open.addEventListener('click', function () {
    mask.classList.remove('del-confirm-mask');
	  modal.classList.remove('del-modal');
	});

	close.addEventListener('click',function () {
		mask.classList.add('del-confirm-mask');
    modal.classList.add('del-modal');
	});

	mask.addEventListener('click',function () {
		close.click();
	});
  </script>
  @endif
</body>
</html>

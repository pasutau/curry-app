<header>
  <nav class="my-navbar">
    <a class="my-navbar-brand" href="/">Currys,</a>
    <div class="my-navbar-control">
      @if(Auth::check())
        <span class="my-navbar-item">ようこそ、{{ Auth::user()->name }}さん</span>
        |
        <a href="#" id="logout" class="my-navbar-item">ログアウト</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
        </form>
        <div class="my-navbar-item">
          <img id="menu" class="navbar-menu" src="/images/icon/menu_icon.svg"/>
        </div>
      @else
      <a class="my-navbar-item" href="login">ログイン</a>
        ｜
      <a class="my-navbar-item" href="register">ユーザ登録</a>
      <div class="my-navbar-item">
        <img id="menu" class="navbar-menu" src="/images/icon/menu_icon.svg"/>
      </div>
      @endif
    </div>
  </nav>
</header>

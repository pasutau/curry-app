@extends('layouts/curry-app')

@section('content')
  <div class="menu-layout">
    <div class="d-flex flex-column vw-40 mx-auto ">
      <nav class="card card-warning">
        <div class="card-header">メニュー</div>
        <div class="card-body">
          @if(Auth::check())
          <div class="form-group">
            <a class="btn btn-block" style="font-size: 200% " href="image_upload">画像投稿</a>
          </div>
          <div class="form-group">
            <a class="btn btn-block" style="font-size: 200% " href="disp">画像一覧</a>
          </div>
          <div class="form-group">
            <a class="btn btn-block" style="font-size: 200%" href="mypage">マイページ</a>
          </div>
          @else
          <div class="form-group">
            <a class="btn btn-block" style="font-size: 200%" href="login">ログイン</a>
          </div>
          <div class="form-group">
            <a class="btn btn-block" style="font-size: 200%" href="register">ユーザ登録</a>
          </div>
        </div>
          @endif
      </nav>
      <div class="text-center">
        <a href="{{ route('password.request') }}" style="color: #ffff; font-size:120%">パスワードの変更はこちらから</a>
      </div>
    </div>
  </div>
@endsection

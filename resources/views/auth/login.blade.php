@extends('layouts/curry-app')

@section('content')
<div class="container" style="margin-top: 300px;margin-bottom: 15%;">
  <div class="d-flex flex-column mx-auto w-50">
    <nav class="card card-warning">
      <div class="card-header">ログイン</div>
      <div class="card-body">
        @if($errors->any())
        <div class="alert alert-danger">
          @foreach($errors->all() as $message)
          <p>{{ $message }}</p>
          @endforeach
        </div>
        @endif
        <form action="{{ route('login') }}" method="POST">
          @csrf
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
      <a href="{{ route('password.request') }} " style="color: #ffff; font-size:120%">パスワードの変更はこちらから</a>
    </div>
  </div>
</div>
@endsection

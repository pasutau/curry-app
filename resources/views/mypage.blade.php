@extends('layouts.curry-app')

@section('content')
  <div class="content">
    <div class="cards">

      {{-- 投稿画像、タイトル一覧表示 --}}
      @foreach ($image_info as $url=>$title)
        <div class="card">
            <img class="card-img-top" src="{{ url("$url")}}" />
            <div class="img-title">
              <a class="img-title" href="">{{ $title }}</a>
            </div>
            <form action="delete" method="POST">
              @method('DELETE')
              @csrf
              <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#sampleModal{{ $loop->index }}">
                削除
              </button>
              <input type="hidden" id="img-del-submit" name="url" value="{{ $url }} ">

              <!-- モーダル画面 -->
              <div class="modal fade　modal-dialog-centered" id="sampleModal{{ $loop->index }}" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <h4 class="modal-title">本当に削除してもよろしいですか？</h4>
                    </div>
                    <div class="modal-body">
                      削除対象画像：{{ $title }}
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                      <button type="submit" class="btn btn-primary">削除</button>
                    </div>
                  </div>
                </div>
              </div>

            </form>
        </div>
      @endforeach

    </div>
  </div>
@endsection
@section('script')
{{-- 削除モーダル画面用にbootstrap読み込み --}}
  @parent
  <script src="{{ mix('js/app.js') }}"></script>
@endsection

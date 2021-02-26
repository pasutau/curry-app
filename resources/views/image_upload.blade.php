@extends('layouts/curry-app')

@section('content')
<div class="container">
<div class="d-flex flex-column align-items-center">
  <div class="card w-75">
    <form action="upload" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="upload_container">
        <div class="card-header">投稿したい画像を選択してください。</div>
        <div class="card-body">
          <div class="d-flex">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="file" name="file" onchange="previewImage(this);">
          </div>
          <canvas id="preview" style="max-width: 300px"></canvas>
        </div>
          <div class="title_block">
            <label for="title_name">画像タイトル名</label>
            <input type="text" class="form-control" id="image_file_name" name="image_file_name">
              <div class="upload_btn">
                <button type="submit" class="btn btn-primary btn-block">投稿</button>
              </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
@endsection

@section('script')
  @parent
  {{-- 投稿画像のプレビュー表示 --}}
  <script src="{{ mix('js/img-preview.js') }}"></script>
@endsection

@component('components.header')
@endcomponent

  <main>
  <form action="upload" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="upload_container">
      <label for="image_upload"></label>
      <div class="custom-file">
        <label for="title_name">アップロード画像</label>
        <input type="file" class="custom-file-input" id="file" name="file" onchange="previewImage(this);">
      </div>
      <canvas id="preview" style="max-width: 200px"></canvas>
      <div class="title_block">
        <label for="title_name">画像タイトル名</label>
        <input type="text" class="form-control" id="image_file_name" name="image_file_name">
          <div class="upload_btn">
            <button type="submit" class="btn btn-primary btn-block">投稿</button>
          </div>
      </div>
    </div>
  </form>
  {{-- headerのユーザログイン状態遷移 --}}
  @if(Auth::check())
  <script>
    document.getElementById('logout').addEventListener('click', function(event) {
      event.preventDefault();
      document.getElementById('logout-form').submit();
    });
  </script>
  @endif
  {{-- 投稿画像のプレビュー表示 --}}
  <script>
    function previewImage(obj)  {
      var fileReader = new FileReader();
      fileReader.onload = (function() {
        var canvas = document.getElementById('preview');
        var ctx = canvas.getContext('2d');
        var image = new Image();
        image.src = fileReader.result;
        image.onload = (function () {
          canvas.width = image.width;
          canvas.height = image.height;
          ctx.drawImage(image, 0, 0);
        });
	    });
	    fileReader.readAsDataURL(obj.files[0]);
    }
  </script>
  </main>
</body>
</html>

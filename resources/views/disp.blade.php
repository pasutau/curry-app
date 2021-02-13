@component('components.header')
@endcomponent

<main>
  <div class="cards">
    {{-- 投稿画像、タイトル一覧表示 --}}
    @for ($i = 0; $i < count($file_url); $i++)
       <div class="card">
           <img class="card-img-top" src="{{ url("{$file_url[$i]}")}}" >
           <div class="img-title">
               <a class="img-title" href="">{{ $image_title[$i] }}</a>
           </div>
       </div>
    @endfor
  </div>
</main>
@if(Auth::check())
  <script>
    document.getElementById('logout').addEventListener('click', function(event) {
      event.preventDefault();
      document.getElementById('logout-form').submit();
    });
  </script>
@endif
</body>
</html>

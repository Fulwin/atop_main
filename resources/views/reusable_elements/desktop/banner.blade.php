@if(session('lang')=='EN')
     <div class="bannarspicculture"
          style="background:url('{{ asset('/page_banner/news-1680.jpg') }}') center top no-repeat;height: 389px;">
     </div>
@else
     <div class="bannarspicculture"
          style="background:url('{{ $upload_files_prefix }}Upload/catebannar/news_banner-18394414129.jpg') center top no-repeat;">
     </div>
@endif
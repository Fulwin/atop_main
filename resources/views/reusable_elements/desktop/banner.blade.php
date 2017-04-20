
@if(session('lang')=='EN')
     <div class="bannarspicculture"
          style="background:url('{{ asset('/page_banner/news-1680.jpg') }}') center top no-repeat;height: 389px;">
     </div>
@else
     <?php
     if($special_banner_image){
          $banner = $special_banner_image;
     }else{
          $banner = '/Upload/ATOPTechnology/news/news.jpg';
     }
     ?>
     <div>
          <img src="{{ asset($banner) }}" alt="新闻图片" style="width: 100%;">
     </div>
@endif
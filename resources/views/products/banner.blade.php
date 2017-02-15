<div class="bannarspicculture"
     style="background:url('{{ $upload_files_prefix }}Upload/catebannar/productbanner-18352997197.jpg') center top no-repeat;">
</div>
<div class="middle">
    <section class="tab">
        <div class="tab_nav">
            <div class="inner">
                <ul class="about_tabul" style="width:590px;">
                    @foreach($tree as $item)
                        <li class="no2" style="padding: 0 10px;">
                            <a href="{{ url('/products/'.$item['data']->Cate_Id) }}">
                                {{ $item['data']->Cate_Title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="cl"></div>
            </div>
        </div>
    </section>
</div>

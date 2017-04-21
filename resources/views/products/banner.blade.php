<div>
    <img src="{{ asset('/Upload/ATOPTechnology/products/products.jpg') }}" alt="华拓光通信" style="width: 100%;">
</div>
<div class="middle">
    <section class="tab">
        <div class="tab_nav">
            <div class="inner">
                <ul class="about_tabul" style="width:590px;">
                    @foreach($tree as $item)
                        <li class="no2" style="padding: 0 10px;">
                            <a href="{{ url('/products/'.$item['data']->getIdString()) }}">
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

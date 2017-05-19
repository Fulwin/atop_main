@extends('layout_desktop')

@section('content')
    <div class="maincontent">
        <div class="maintext product-search-result-wrap">
            <div class="search-results">
                @foreach($products as $product)
                    <?php
                        $productCategory = $product->category();
                    ?>
                    <div class="result">
                        <div class="p-feature-image">

                                @if(!empty($product->Products_BigImage))
                                <a href="{{ url('/product/view/'.$product->getIdString()) }}">
                                    <img src="{{ $product->Products_BigImage }}" alt="{{ $product->Products_Title }}">
                                </a>
                                @else
                                    <div style="display: block;max-width: 200px;width: 20%;"></div>
                                @endif

                        </div>
                        <div class="p-info">
                            <div class="p-title">
                                <a href="{{ url('/product/view/'.$product->getIdString()) }}">
                                    {{ $product->Products_Title }}
                                </a>
                                -
                                <a href="{{ url('/products/'.$productCategory->getIdString()) }}">{{ $productCategory->Cate_Title }}</a>
                            </div>
                            <div class="p-excerpt">
                                {!! $product->Products_Introduction !!}
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                @endforeach
                <div class="paginate-btns">
                    {{ $products->links() }}
                </div>
                    <br>
            </div>

        </div>
    </div>
@stop
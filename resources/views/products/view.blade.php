@extends('layout_desktop')

@section('content')
    <div class="maincontent">
    <div class="maintext">
        @include('products.side_bar')
        <div class="rightpage">
            <div class="newscate">
                <ul>
                    <li class="cateposition">Your current location is：<a href="{{ url('/products') }}">Products</a> >
                        <a itemprop="category" href="{{ url('/products/'.$category->Cate_Id) }}">{{ $category->Cate_Title }}</a>&nbsp; &nbsp;
                    </li>
                </ul>
            </div>

            <div class="textcontentt">
            </div>

            <div class="product-wrap">
                <div class="row">
                    <div class="image-wrap">
                      <div class="unslider">
                        <ul>
                          <li>
                            <img itemprop="image" src="{{ $product->Products_BigImage }}" alt="{{ $product->Products_Title }}">
                          </li>
                          <?php $imageIndexRange = range(1,9); ?>
                          @foreach ($imageIndexRange as $index)
                              <?php
                                $fieldName = 'Products_BigImage' . $index;
                                if(!empty(trim($product->$fieldName))){
                                  ?>
                                  <li>
                                    <img itemprop="image" src="{{ $product->$fieldName }}" alt="{{ $product->Products_Title }}">
                                  </li>
                                  <?php
                                }
                              ?>
                          @endforeach
                        </ul>
                      </div>
                      <script>
                          $(function() { $('.unslider').unslider({autoplay: true, arrows: false, nav: false}) });
                      </script>
                    </div>

                    <div class="desc-wrap mb40">
                        <h2>
                            <span class="name" itemprop="name">
                                Name: {{ $product->Products_Title }}
                            </span>
                        </h2>
                        <p class="code" itemprop="sku">
                            Product Code: {{ $product->Products_CodeName }}
                        </p>
                        <p class="general">
                            Description
                        </p>
                        <div class="line"></div>
                        <div class="short" itemprop="description">
                            {!! $product->Products_Introduction !!}
                        </div>
                    </div>
                </div>

                <div class="textcontentt  mt40">
                </div>

                <div class="row">
                    <div class="feature-wrap">
                        <h4>
                            PRODUCT FEATURES
                        </h4>
                        <ul>
                            <li class="txt cl">Package: {{ $product->Products_ExFlag1 }}</li>
                            <li class="txt cl">Data Rate: {{ $product->Products_ExFlag2 }}</li>
                            <li class="txt cl">Wavelength: {{ $product->Products_ExFlag3 }}</li>
                            <li class="txt cl">Component: {{ $product->Products_ExFlag4 }}</li>
                            <li class="txt cl">Output Power: {{ $product->Products_ExFlag5 }}</li>
                            <li class="txt cl">Rec. Sens: {{ $product->Products_ExFlag6 }}</li>
                            <li class="txt cl">Connector: {{ $product->Products_ExFlag7 }}</li>
                            <li class="txt cl">Case Temp.: {{ $product->Products_ExFlag8 }}</li>
                            <li class="txt cl">Reach: {{ $product->Products_ExFlag9 }}</li>
                            <li class="txt cl">Multi-rate: {{ $product->Products_ExFlag10 }}</li>
                        </ul>
                    </div>
                    <div class="application-wrap">
                        <h4>
                            APPLICATIONS
                        </h4>
                        <ul>
                            <li>
                                Product feature
                            </li>
                        </ul>
                        <br>
                        <div class="download-btn">
                            <a href="{{ $upload_files_prefix . $product->Products_FileIntro }}" target="_blank">
                                Download a Data Sheet
                            </a>
                        </div>
                        <div class="request-btn">
                            <a href="#">
                                Request a Quote
                            </a>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="textcontentt mt40">
                </div>

                <div class="row mt40">
                    <div class="eye-diagram-wrap">
                        <h4>EYE DIAGRAM</h4>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="textcontentt mt40">
                </div>

                <div class="row mt40">
                    <div class="specification-wrap">
                        <h4>MECHANICAL SPECIFICATIONS</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@stop

@extends('layout_desktop')

@section('content')
    <div class="maintext">
        @include('products.side_bar')
        <div class="rightpage">
            <div class="newscate">
                <ul>
                    <li class="cateposition">Your current location is：<a href="{{ url('/products') }}">Products</a> >
                        <a href="{{ url('/products/'.$category->Cate_Id) }}">{{ $category->Cate_Title }}</a>&nbsp; &nbsp;
                    </li>
                </ul>
            </div>

            <div class="textcontentt">
            </div>

            <div class="product-wrap">
                <div class="row">
                    <div class="image-wrap">
                        <img src="{{ $upload_files_prefix.$product->Products_BigImage }}" alt="{{ $product->Products_Title }}">
                    </div>
                    <div class="desc-wrap mb40">
                        <h2>
                            <span class="name">
                            {{ $product->Products_Title }}
                        </span>
                        </h2>
                        <p class="code">
                            {{ $product->Products_CodeName }}
                        </p>
                        <p class="general">
                            GENERAL
                        </p>
                        <div class="short">
                            {!! $product->Products_Introduction !!}
                        </div>

                        <div class="line"></div>
                        <div class="extra">
                            <div class="left">
                                <ul>
                                    <li class="txt">Package: {{ $product->Products_ExFlag1 }}</li>
                                    <li class="txt">Data Rate: {{ $product->Products_ExFlag2 }}</li>
                                    <li class="txt">Wavelength: {{ $product->Products_ExFlag3 }}</li>
                                    <li class="txt">Component: {{ $product->Products_ExFlag4 }}</li>
                                    <li class="txt">Output Power: {{ $product->Products_ExFlag5 }}</li>
                                </ul>
                            </div>
                            <div class="right">
                                <ul>
                                    <li class="txt">Rec. Sens: {{ $product->Products_ExFlag6 }}</li>
                                    <li class="txt">Connector: {{ $product->Products_ExFlag7 }}</li>
                                    <li class="txt">Case Temp.: {{ $product->Products_ExFlag8 }}</li>
                                    <li class="txt">Reach: {{ $product->Products_ExFlag9 }}</li>
                                    <li class="txt">Multi-rate: {{ $product->Products_ExFlag10 }}</li>
                                </ul>
                            </div>
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
                            <li>
                                Product feature
                            </li>
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
@stop
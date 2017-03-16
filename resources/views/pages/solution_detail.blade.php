@extends('layout_desktop')

@section('content')
    <div class="bannarspicculture"
         style="background:url('{{ url('/Upload/catebannar/solutionsbanner-17475279305.jpg') }}') center top no-repeat;">
    </div>

    <div class="middle">
        <div style="margin:0 auto; width:1200px; padding:25px;">
            <div class="newscate">
                <ul>
                    <li class="catename">
                        {{ $download->Down_Title }}
                    </li>
                    <li class="cateposition">Your current location is：<a href="{{ url('/') }}">Home</a> >
                        <a href="">Solution</a>&nbsp; >&nbsp;
                    </li>
                </ul>
            </div>
            <div class="textcontentt2" style="width:1200px;"></div>
            <article class="wrap">
                <section class="sec content2" style="position: relative;">
                    <div style="padding-top: 40px;">
                        {!! $download->Down_Content !!}
                    </div>
                </section>
            </article>

            @foreach($products as $product)
                <div class="col_one_third border-hover-red">
                    <img src="{{ $product->Products_BigImage }}" alt="{{ $product->Products_Title }}">
                    <div class="border-dotted-box">
                        <a class="pro-name" href="{{ url('/product/view/'.$product->getIdString()) }}">
                            {{ $product->Products_Title }}
                        </a>
                        <a class="pro-arrow" href="{{ url('/product/view/'.$product->getIdString()) }}">
                            <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop
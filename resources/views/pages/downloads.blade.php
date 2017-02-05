@extends('layout_desktop')

@section('content')
    <div class="bannarspicculture"
         style="background:url('{{ asset('/Upload/catebannar/service&support-18444026038.jpg') }}') center top no-repeat;">
    </div>
    <div class="middle">
        <div class="wrap">
            <a name="Download"></a>
            <section class="CorporateCulture" style=" background:#737373;">
                <div class="inner">
                    <div class="line" style="background:none;">
                        <div class="MC_title" style="text-align:center; margin:0 auto; color:#fff; font-size:50px; border-left:0px; ">
                            <h2>Download</h2>
                        </div>
                    </div>

                    <div class="Culture_inn3">
                        <ul>
                            @foreach($downloads as $key=>$download)
                                <a href="{{ url('/downloads/'.$download->Down_LocalPath) }}">
                                    <li>
                                        <div class="act_nor">
                                            <img src="{{ url($download->Down_Image) }}" alt="">
                                        </div>
                                        <div class="act_detail">
                                            <h6>{{ $download->Down_Title }}</h6>
                                            <div class="act_txt"> <p style="text-align: justify;"></p></div>
                                            <p class="act_more"></p>
                                        </div>
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </section>
        </div>

        <div style="margin:0 auto; width:1200px; padding:25px;">
            <div class="newscate">
                <ul>
                    <li class="catename">
                        Solution
                    </li>
                    <li class="cateposition">Your current location is：<a href="{{ url('/') }}">Home</a> >
                        <a href="">Solution</a>&nbsp; >&nbsp;
                    </li>
                </ul>
            </div>
            <div class="textcontentt2" style="width:1200px;"></div>
        </div>
        <article class="wrap" style="margin:0 auto; width:1200px; padding:25px;">
            <section class="sec content2" style="position: relative;">
                @if(isset($tech) && $tech)
                    {!! $tech->Down_Content !!}
                @endif
            </section>
        </article>
    </div>
@stop
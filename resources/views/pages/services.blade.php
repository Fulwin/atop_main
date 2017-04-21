@extends('layout_desktop')

@section('content')
    <div>
        <img src="{{ asset('/Upload/ATOPTechnology/services/services.jpg') }}" alt="华拓光通信" style="width: 100%;">
    </div>

    <div class="middle">
        <article class="wrap">
            @foreach($techs as $tech)
            <section class="sec content2" style="position: relative;">
                <div>
                    <img id="dsImg" width="100%" src="{{ asset($tech->Down_Image) }}">
                    <a style="width: 7%;height: 25px;position: absolute;bottom: 5%;left: 50%;margin-left: -4%;border-radius:5px; background:#fff;box-shadow:0 0 5px #ccc; font-size:14px; text-align:center;"
                       href="{{ url('/services/'.$tech->Down_ID) }}" >{{ session('lang')=='EN' ? 'More' : '了解详情' }}</a>
                </div>
            </section>
            @endforeach

            <a name="{{ $downloadCategory->Cate_Title }}"></a>
            <section class="CorporateCulture" style=" background:#737373;">
                <div class="inner">
                    <div class="line" style="background:none;">
                        <div class="MC_title" style="text-align:center; margin:0 auto; color:#fff; font-size:50px; border-left:0px; ">
                            <h2>{{ $downloadCategory->Cate_Title }}</h2>
                        </div>
                    </div>

                    <div class="Culture_inn3">
                        <ul>
                            @foreach($downloads as $key=>$download)
                                @if($key < 3)
                                    <a href="{{ url($download->Down_LocalPath) }}">
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
                                @endif
                            @endforeach
                            <span id='DcmsPage_PageInfo' style='display:none;'></span>
                            <div class="cl"></div>
                        </ul>
                        <div class="more padt">
                            <a href="{{ url('/downloads') }}">
                                {{ session('lang')=='EN' ? 'More' : '更多' }}
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </article>
    </div>
@stop
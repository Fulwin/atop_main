@extends('layout_desktop')

@section('content')
    <div class="bannarspicculture"
         style="background:url('{{ asset('/Upload/catebannar/solutionsbanner-17475279305.jpg') }}') center top no-repeat;">
    </div>

    <div class="middle">
        <article class="wrap">
            <section class="sec content2" style="position: relative;">
                <div>
                    <img id="dsImg" width="100%" src="/Upload/quality/3years-13393491834.jpg">
                    <a style="width: 7%;height: 25px;position: absolute;bottom: 5%;left: 50%;margin-left: -4%;border-radius:5px; background:#fff;box-shadow:0 0 5px #ccc; font-size:14px; text-align:center;"
                       href="{{ url('/services/1001') }}" >More</a>
                </div>
            </section>
            <section class="sec content2" style="position: relative;">
                <div>
                    <img id="dsImg" width="100%" src="/Upload/quality/caveats-10061914047.jpg">
                    <a style="width: 7%;height: 25px;position: absolute;bottom: 5%;left: 50%;margin-left: -4%;border-radius:5px; background:#fff;box-shadow:0 0 5px #ccc; font-size:14px; text-align:center;"
                       href="{{ url('/services/1002') }}" >More</a>
                </div>
            </section>
            <section class="sec content2" style="position: relative;">
                <div>
                    <img id="dsImg" width="100%" src="/Upload/factory-10462143571.jpg">
                    <a style="width: 7%;height: 25px;position: absolute;bottom: 5%;left: 50%;margin-left: -4%;border-radius:5px; background:#fff;box-shadow:0 0 5px #ccc; font-size:14px; text-align:center;"
                       href="{{ url('/services/1003') }}" >More</a>
                </div>
            </section>
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
                            <span id='DcmsPage_PageInfo' style='display:none;'>3|9</span>
                            <div class="cl"></div>
                        </ul>
                        <div class="more padt">
                            <a href="{{ url('/downloads') }}">More</a>
                        </div>
                    </div>
                </div>
            </section>
        </article>
    </div>
@stop
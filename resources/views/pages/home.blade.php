@extends('layout_desktop')

@section('content')
    <div class="maincontent">
        <div class="hovv">
            <li class="ccvv">News<span><a href="{{ url('/news/company') }}">Learn More</a></span></li>
            <li style="margin:0 auto; width:385px; float:none; ">
                <ul>
                    @foreach($news as $key=>$article)
                        @if($key===0)
                            <li style="padding-top:10px; padding-bottom:20px;">
                                <a href="{{ url('news/'.$article->News_Id) }}">
                                    <img src="{{ $upload_files_prefix.$article->News_Image }}" width="385" height="165" alt="">
                                </a>
                            </li>
                            <li>
                                <ul style="float:left; width:100%; text-align:left;">
                                    <a style=" font-size:18px; font-family:微软雅黑; color:#f78500;" href="{{ url('news/'.$article->News_Id) }}">
                                        {{ $article->News_Title }}
                                    </a>
                                </ul>
                                <ul style="float:left; width:100%; text-align:left; padding:10px 0px; color:#9c9b9b;height: 90px;overflow: hidden;">
                                    {!! $article->News_Content !!}
                                </ul>
                            </li>
                        @else
                            <li class="litext">
                                <a href="{{ url('news/'.$article->News_Id) }}">{{ $article->News_Title }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </li>
        </div>
        <div class="hovv">
            <li class="ccvv2">Products <span><a href="{{ url('/products') }}">Learn More</a></span></li>
            <li style="margin:0 auto; width:385px; float:none;">
                <ul>
                    <li style=" padding-bottom:20px;">
                        <link href="{{ url('css/slide.css') }}" rel="stylesheet" type="text/css"/>
                        <script type="text/javascript">
                            $(function(){
                                $("#focus").hover(function(){$("#focus-prev,#focus-next").show();},function(){$("#focus-prev,#focus-next").hide();});
                                $("#focus").slide({
                                    mainCell:"#focus-bar-box ul",
                                    targetCell:"#focus-title a",
                                    titCell:"#focus-num a",
                                    prevCell:"#focus-prev",
                                    nextCell:"#focus-next",
                                    effect:"left",
                                    easing:"easeInOutCirc",
                                    autoPlay:true,
                                    delayTime:200
                                })
                            })
                        </script>

                        <div id="focus">
                            <div class="hd">
                                <div class="focus-title" id="focus-title">
                                    @foreach($products as $p)
                                        <a href="{{ url('/product/'.$p->getTitleUrl()) }}"><span class="title">{{ $p->Products_Title }}</span></a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="focus-bar-box" id="focus-bar-box">
                                <ul class="focus-bar">
                                    @foreach($products as $p)
                                        <li><a href="{{ url('/product/'.$p->getTitleUrl()) }}">
                                                <img src="{{ $upload_files_prefix.$p->Products_MinImage }}"></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <a href="#" class="btn-prev" onClick="return false;" hidefocus="" id="focus-prev"></a> <a href="#" class="btn-next" onClick="return false;" hidefocus="" id="focus-next"></a>
                            <div class="ft">
                                <div class="ftbg"></div>
                                <div id="focus-num" class="change"> <a class=""></a> <a class=""></a> <a class=""></a> <a class=""></a> <a class=""></a> </div>
                            </div>
                        </div>
                    </li>

                    <?php
                        $showInHome = [
                            'Transmission',
                            'Data Center',
                            'CPRI'
                        ];
                    ?>

                    @foreach($tree as $categoryId=>$item)
                        <?php $category = $item['data']; ?>
                        @if(in_array($category->Cate_Title, $showInHome))
                        <ul class="homecasect">
                            <li class="" style="height:30px; width:100%; line-height:30px;">
                                <a href="{{ url('/products/'.$categoryId) }}" style=" font-family:微软雅黑; font-size:16px; color:#261E09;">
                                    <h3>{{ $category->Cate_Title }}</h3>
                                </a>
                            </li>
                            <?php
                                $subs = $item['subs'];
                            ?>
                            @foreach($subs as $subId => $subCategory)
                                <li class="sites2">
                                    <a style="font-size:12px;" href="{{ url('/products/'.$subId) }}"> {{ $subCategory['data']->Cate_Title }}</a>
                                </li>
                            @endforeach
                        </ul>
                        @endif
                    @endforeach
                </ul>
            </li>
        </div>
        <div class="hovv2">
            <li class="ccvv2">Solution  <span><a href="{{ url('/solutions') }}">Learn More</a></span></li>
            <li style="margin:0 auto; width:385px; float:none;">
                <ul>
                    <li style="padding-top:10px; padding-bottom:20px;">
                        <a href="{{ url('/solutions') }}">
                            <img src="{{ asset('/Upload/Honor/Solution-10245893871.jpg') }}" width="385" height="165" alt="">
                        </a>
                    </li>
                    <?php
                        $downloadsContent = [
                            'ATOP QSFP+ SR4 supports 100m transmission over OM3 Multimode fiber, the power consumption …',
                            'ATOP 10GEPON optical transceivers support a downstream at 10Gbps and upstream at 10Gbps or…',
                            'The smart phone and other mobile device has been taken a more and more important roll in t…',
                            'ATOP offers full line optical transmission products for FTTx applications.'
                        ];
                        $downloadsIcon = [
                            'Upload/quality/111-17153658513.jpg',
                            'Upload/quality/111111-17153658513.jpg',
                            'Upload/quality/11111-17153678361.jpg',
                            'Upload/quality/1111-17153682330.jpg'
                        ];
                    ?>
                    @foreach($downloads as $key=>$download)
                        <li class="litexthhhhhhhhh">
                            <div style="float:left; width:320px;">
                                <a href="{{ url('/solutions/'.$download->Down_ID) }}">
                                    <h3>{{ $download->Down_Title }}</h3>
                                </a>
                                {{ $downloadsContent[$key] }}
                            </div>
                            <div style="float: right;"><img src="{{ $downloadsIcon[$key] }}" width="50" height="50" alt=""></div>
                        </li>
                    @endforeach
                </ul>
            </li>
        </div>
    </div>
    <div style="clear:both"></div>
    <div class="maincontent" style="border-bottom:#cfcfcf solid 1px; margin-top:20px; width:100%;" ></div>
    <div class="maincontent" style="border-top:#fff solid 1px; margin-bottom:20px; width:100%;" ></div>
    <div class="maincontent" >
        <div style=" width:814px; float:left;">
            <ul>

                <li style=" width:385px; padding-right:22px;"><a href="{{ url('/about_us') }}"><img src="{{$upload_files_prefix}}Upload/catebannar/413_5418475490113-10495845248.jpg" width="385" height="209" alt=""></a></li>
                <li style=" width:380px; ">
                    <ul>
                        <li style="line-height:26px; width:380px; font-size:14px; font-weight:bold; ">A Short Words About Us</li>
                        <li style="line-height:26px; width:380px; ">ATOP Corporation is a leading manufacturer of optical transceivers. ATOP is proficient in R&amp;D, production and sales of optical components, transceivers and sub-systems. ATOP no…</li>
                        <li style="line-height:26px; width:380px; padding-top:50px; "><a href="{{ url('/about_us') }}"><img src="images/413_57.jpg" width="119" height="32" alt=""></a></li>
                    </ul>
                </li>


            </ul>
        </div>
        <div style=" width:385px; float:left;"><div id="CuPlayer" style="">
                <script type="text/javascript">
                    var so = new SWFObject("images/CuPlayerMiniV10_Gray_S.swf","CuPlayer","385","209","9","#ffffff");
                    so.addParam("allowfullscreen","true");
                    so.addParam("allowscriptaccess","always");
                    so.addParam("wmode","opaque");
                    so.addParam("quality","high");
                    so.addParam("salign","lt");
                    so.addVariable("CuPlayerFile","{{ $upload_files_prefix }}Upload/Honor/jieshao.flv");
                    so.addVariable("CuPlayerImage","Images/413_56.jpg");
                    so.addVariable("CuPlayerShowImage","true");
                    so.addVariable("CuPlayerWidth","385");
                    so.addVariable("CuPlayerHeight","209");
                    so.addVariable("CuPlayerAutoPlay","false");
                    so.addVariable("CuPlayerAutoRepeat","true");
                    so.addVariable("CuPlayerShowControl","true");
                    so.addVariable("CuPlayerAutoHideControl","false");
                    if("{{ $upload_files_prefix }}Upload/Honor/jieshao.flv"!=""&&"{{ $upload_files_prefix }}Upload/Honor/jieshao.flv"!=" ")
                    {
                        so.write("CuPlayer");
                    }
                    else
                    {
                        document.write("");
                    }




                </script></div>

        </div>
        <div style="clear:both"></div>
    </div>
@stop
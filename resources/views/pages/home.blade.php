@extends('layout_desktop')

@section('content')
    <div class="maincontent">
        <div class="hovv">
            <li class="ccvv">News<span><a href="{{ url('/news/company') }}">Learn More</a></span></li>
            <li style="margin:0 auto; width:385px; float:none; ">
                <ul>
                    <?php
                        $newsIndex = 0;
                    ?>
                    @foreach($news as $key=>$article)
                        @if($newsIndex < 5)
                            @if($key===0)
                                <li style="padding-top:10px; padding-bottom:20px;">
                                    <a href="{{ url('news/'.$article->News_Id) }}">
                                        <img src="{{ $upload_files_prefix.$article->News_Image }}" width="385" height="165" alt="">
                                    </a>
                                </li>
                                <li style="width: 385px;">
                                    <ul style="float:left; width:100%; text-align:left;height: 30px;overflow: hidden;">
                                        <a style=" font-size:18px; font-family:微软雅黑; color:#f78500;" href="{{ url('news/'.$article->News_Id) }}">
                                            {{ $article->News_Title }}
                                        </a>
                                    </ul>
                                    <ul style="float:left; width:100%; text-align:left; padding:10px 0px; color:#9c9b9b;height: 55px;overflow: hidden;margin-bottom: 20px;">
                                        @if(empty($article->excerpt))
                                            {!! $article->News_Content !!}
                                        @else
                                            {{ $article->excerpt }}
                                        @endif
                                    </ul>
                                </li>
                            @else
                                <li class="litext">
                                    <a href="{{ url('news/'.$article->News_Id) }}">{{ $article->News_Title }}</a>
                                </li>
                            @endif
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
                            'CPRI',
                            '传输领域',
                            '数据中心',
                            '无线应用'
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
                            <img src="{{ asset('/Upload/Honor/Solution-Home.jpg') }}" width="385" height="165" alt="">
                        </a>
                    </li>
                    @foreach($downloads as $key=>$download)
                        <li class="litexthhhhhhhhh">
                            <div style="float:left; width:320px;">
                                <a href="{{ url('/solutions/'.$download->Down_ID) }}">
                                    <h3>{{ $download->Down_Title }}</h3>
                                </a>
                                {{ $download->excerpt }}
                            </div>
                            <div style="float: right;"><img src="{{ $download->Down_OtherPath }}" width="50" height="50" alt=""></div>
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
                        @if(session('lang') != 'EN')
                            <li style="line-height:26px; width:380px; font-size:14px; font-weight:bold; ">关于我们</li>
                            <li style="line-height:26px; width:380px; ">
                                华拓光通信股份有限公司是光模块行业领先的制造商，拥有自上而下从研发、生产到销售的完整产业链，产品涵盖当前主流应用速率和各种封装，从155M到100G，从SFF到QSFP28...
                            </li>
                            <li style="line-height:26px; width:380px; padding-top:50px; ">
                                <a href="{{ url('/about_us') }}" style="display: block;background:#f78500;width: 119px;height: 32px;line-height: 32px;text-align: center;color:#fff;">
                                    了解详情
                                </a>
                            </li>
                        @else
                        <li style="line-height:26px; width:380px; font-size:14px; font-weight:bold; ">A Short Words About Us</li>
                        <li style="line-height:26px; width:380px; ">ATOP Corporation is a leading manufacturer of optical transceivers. ATOP is proficient in R&amp;D, production and sales of optical components, transceivers and sub-systems. ATOP no…</li>
                        <li style="line-height:26px; width:380px; padding-top:50px; ">
                            <a href="{{ url('/about_us') }}" style="display: block;background:#f78500;width: 119px;height: 32px;line-height: 32px;text-align: center;color:#fff;">
                                Learn More
                            </a>
                        </li>
                        @endif
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

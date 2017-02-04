@extends('layout_desktop')

@section('content')
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

                    <ul class="homecasect">
                        <li class="" style="height:30px; width:100%; line-height:30px;"> <a href="Productsall.aspx?ProductsCateID=90&amp;CateID=90&amp;CurrCateID=90&showCateID=90" style=" font-family:微软雅黑; font-size:16px; color:#261E09;"><h3>Transmission</h3></a> </li>
                        <li class="sites2"><a style="font-size:12px;" href="productsall.aspx?ProductsCateID=105&IntroCateId=105&CateID=90&CurrCateID=105#100G CFP4"> 100G CFP4</a></li>
                        <li class="sites2"><a style="font-size:12px;" href="productsall.aspx?ProductsCateID=216&IntroCateId=216&CateID=90&CurrCateID=216#100G CFP2"> 100G CFP2</a></li>
                        <li class="sites2"><a style="font-size:12px;" href="productsall.aspx?ProductsCateID=106&IntroCateId=106&CateID=90&CurrCateID=106#40G QSFP"> 40G QSFP</a></li>
                        <li class="sites2"><a style="font-size:12px;" href="productsall.aspx?ProductsCateID=107&IntroCateId=107&CateID=90&CurrCateID=107#10G SFP+"> 10G SFP+</a></li>
                        <li class="sites2"><a style="font-size:12px;" href="productsall.aspx?ProductsCateID=108&IntroCateId=108&CateID=90&CurrCateID=108#10G XFP"> 10G XFP</a></li>
                        <li class="sites2"><a style="font-size:12px;" href="productsall.aspx?ProductsCateID=110&IntroCateId=110&CateID=90&CurrCateID=110#BIDI SFP"> BIDI SFP</a></li>
                        <li class="sites2"><a style="font-size:12px;" href="productsall.aspx?ProductsCateID=109&IntroCateId=109&CateID=90&CurrCateID=109#SFP"> SFP</a></li>
                        <li class="sites2"><a style="font-size:12px;" href="productsall.aspx?ProductsCateID=112&IntroCateId=112&CateID=90&CurrCateID=112#CSFP"> CSFP</a></li>
                        <li class="sites2"><a style="font-size:12px;" href="productsall.aspx?ProductsCateID=222&IntroCateId=222&CateID=90&CurrCateID=222#Copper SFP"> Copper SFP</a></li>

                    </ul>
                    <ul class="homecasect">
                        <li class="" style="height:30px; width:100%; line-height:30px;"> <a href="Productsall.aspx?ProductsCateID=91&amp;CateID=91&amp;CurrCateID=91&showCateID=91" style=" font-family:微软雅黑; font-size:16px; color:#261E09;"><h3>Data Center</h3></a> </li>
                        <li class="sites2"><a style="font-size:12px;" href="productsall.aspx?ProductsCateID=210&IntroCateId=210&CateID=91&CurrCateID=210#100G QSFP28"> 100G QSFP28</a></li>
                        <li class="sites2"><a style="font-size:12px;" href="productsall.aspx?ProductsCateID=115&IntroCateId=115&CateID=91&CurrCateID=115#40G QSFP"> 40G QSFP</a></li>
                        <li class="sites2"><a style="font-size:12px;" href="productsall.aspx?ProductsCateID=116&IntroCateId=116&CateID=91&CurrCateID=116#40G QSFP PSM"> 40G QSFP PSM</a></li>
                        <li class="sites2"><a style="font-size:12px;" href="productsall.aspx?ProductsCateID=131&IntroCateId=131&CateID=91&CurrCateID=131#10G SFP+"> 10G SFP+</a></li>
                        <li class="sites2"><a style="font-size:12px;" href="productsall.aspx?ProductsCateID=132&IntroCateId=132&CateID=91&CurrCateID=132#DAC Cable"> DAC Cable</a></li>
                        <li class="sites2"><a style="font-size:12px;" href="productsall.aspx?ProductsCateID=133&IntroCateId=133&CateID=91&CurrCateID=133#AOC Cable"> AOC Cable</a></li>

                    </ul>
                    <ul class="homecasect">
                        <li class="" style="height:30px; width:100%; line-height:30px;"> <a href="Productsall.aspx?ProductsCateID=100&amp;CateID=100&amp;CurrCateID=100&showCateID=100" style=" font-family:微软雅黑; font-size:16px; color:#261E09;"><h3>CPRI</h3></a> </li>
                        <li class="sites2"><a style="font-size:12px;" href="productsall.aspx?ProductsCateID=209&IntroCateId=209&CateID=100&CurrCateID=209#10G SFP+"> 10G SFP+</a></li>
                        <li class="sites2"><a style="font-size:12px;" href="productsall.aspx?ProductsCateID=122&IntroCateId=122&CateID=100&CurrCateID=122#6G SFP+"> 6G SFP+</a></li>
                        <li class="sites2"><a style="font-size:12px;" href="productsall.aspx?ProductsCateID=123&IntroCateId=123&CateID=100&CurrCateID=123#3G SFP"> 3G SFP</a></li>
                        <li class="sites2"><a style="font-size:12px;" href="productsall.aspx?ProductsCateID=134&IntroCateId=134&CateID=100&CurrCateID=134#1.06G SFP"> 1.06G SFP</a></li>

                    </ul>


                </ul>
            </li>
        </div>
        <div class="hovv2">
            <li class="ccvv2">Solution  <span><a href="solutiontop.aspx">Learn More</a></span></li>
            <li style="margin:0 auto; width:385px; float:none;">
                <ul>
                    <li style="padding-top:10px; padding-bottom:20px;"><a href="solutiontop.aspx">
                            <img src="{{ $upload_files_prefix }}Upload/Honor/Solution-10245893871.jpg" width="385" height="165" alt="">


                        </a></li>



                    <li class="litexthhhhhhhhh">
                        <div style="float:left; width:320px;">
                            <a href="solutionview2.aspx?DownID=16&CateID=87&DownCateID=87">
                                <h3>PON</h3>
                            </a>
                            ATOP 10GEPON optical transceivers support a downstream at 10Gbps and upstream at 10Gbps or…
                        </div>
                        <div style="float: right;"><img src="{{ $upload_files_prefix }}Upload/quality/111111-17153658513.jpg" width="50" height="50" alt=""></div>
                    </li>


                    <li class="litexthhhhhhhhh">
                        <div style="float:left; width:320px;">
                            <a href="solutionview2.aspx?DownID=13&CateID=87&DownCateID=87"><h3>Data center</h3></a>ATOP QSFP+ SR4 supports 100m transmission over OM3 Multimode fiber, the power consumption …
                        </div>
                        <div style="float: right;"><img src="{{ $upload_files_prefix }}Upload/quality/111-17153658513.jpg" width="50" height="50" alt=""></div></li>


                    <li class="litexthhhhhhhhh">
                        <div style="float:left; width:320px;"><a href="solutionview2.aspx?DownID=14&CateID=87&DownCateID=87"><h3>FTTX</h3></a>ATOP offers full line optical transmission products for FTTx applications.</div>
                        <div style="float: right;"><img src="{{ $upload_files_prefix }}Upload/quality/1111-17153682330.jpg" width="50" height="50" alt=""></div></li>


                    <li class="litexthhhhhhhhh"> <div style="float:left; width:320px;"><a href="solutionview2.aspx?DownID=15&CateID=87&DownCateID=87"><h3>Wireless</h3></a>The smart phone and other mobile device has been taken a more and more important roll in t…</div>
                        <div style="float: right;"><img src="{{ $upload_files_prefix }}Upload/quality/11111-17153678361.jpg" width="50" height="50" alt=""></div></li>


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
@stop
<div id="slide">
    <div class="fotorama" data-width="100%" data-height="400" data-ratio="4/3">
        <ul class="">
            @foreach($banners as $key=>$banner)
                <li>
                    @if($banner->BaseInfo_Link != ''){
                        <a href="{{ $banner->BaseInfo_Link  }}"><img src="{{ session('lang')=='EN' ? 'https://www.atoptechnology.com/' : 'http://www.atoptechnology.com.cn/'  }}{{ $banner->BaseInfo_Image }}" alt="{{ $banner->BaseInfo_Title }}"/></a>
                    @else
                        <img src="{{ session('lang')=='EN' ? 'https://www.atoptechnology.com/' : 'http://www.atoptechnology.com.cn/'  }}{{ $banner->BaseInfo_Image }}" alt="{{ $banner->BaseInfo_Title }}"/>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>
<script>
    $(function() { $('.fotorama').unslider({autoplay: true, arrows: false, nav: false}) })
</script>
<div class="middlehome" style="min-height: 72px;">
    <div class="maincontent" style=" margin-top:20px; margin-bottom:20px; background:#e4e4e4; height:52px; line-height:52px;box-shadow:0px 0px 0px #ccc;" >
        <li><img src="images/413_40cxxxxc.jpg" width="131" height="52" alt=""></li>
        <li>
            <style type="text/css">
                <!--
                td {font-size:12px}
                .rollboder {}
                .rollleft {FLOAT: left; WIDTH: 970px}
                .rollleft STRONG {COLOR: #666}
                .rollcenter {BORDER-RIGHT: #e8e8e7 1px solid;  WIDTH: 30px; TEXT-ALIGN: center}
                .rollright {FLOAT: right; WIDTH: 40px; TEXT-ALIGN: center; line-height:52px;}
                .rollright IMG {VERTICAL-ALIGN: middle}
                .rollTextMenus span { color: #999; padding-left:50px; font-size:11px;}
                -->
            </style>
            <script type=text/javascript>
                <!--
                var rollText_k=6; //菜单总数
                var rollText_i=1; //菜单默认值
                //setFocus1(0);
                rollText_tt=setInterval("rollText(1)",8000);
                function rollText(a){
                    clearInterval(rollText_tt);
                    rollText_tt=setInterval("rollText(1)",8000);
                    rollText_i+=a;
                    if (rollText_i>rollText_k){rollText_i=1;}
                    if (rollText_i==0){rollText_i=rollText_k;}
                    //alert(i)
                    for (var j=1; j<=rollText_k; j++){
                        document.getElementById("rollTextMenu"+j).style.display="none";
                    }
                    document.getElementById("rollTextMenu"+rollText_i).style.display="block";
                    document.getElementById("pageShow").innerHTML = rollText_i+"/"+rollText_k;
                }
                //-->
            </script>
            <table height="52" border="0" cellspacing="0" class="rollboder">
                <tbody>
                    <tr>
                        <td height="52" class="rollleft">
                            <div class="rollTextMenus">
                                @foreach($news as $key=>$item)
                                    <div id="rollTextMenu{{ $key+1 }}" style="display: {{ $key===0 ? 'block' : 'none' }}; height:52px; line-height:52px;">
                                        <a style="" href="{{ url('/news/'.$item->News_Id) }}">
                                            {{ $item->News_Title }}
                                        </a>
                                        <span>[{{ substr($item->News_AddTime,0,10) }}]</span>
                                    </div>
                                @endforeach
                            </div>
                        </td>
                        <td class="rollcenter" id="pageShow">1/6</td>
                        <td class="rollright">
                            <a title="上一条" href="javascript:rollText(-1);">
                                <img src="{{ asset('images/last.gif') }}" alt="上一条" width="11" height="11" border="0">
                            </a>
                            <a title="下一条" href="javascript:rollText(1);">
                                <img src="{{ asset('images/next.gif') }}">
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </li>
    </div>
</div>
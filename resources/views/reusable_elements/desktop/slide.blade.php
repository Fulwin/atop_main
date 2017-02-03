<div id="slide">
    <div class="fotorama" data-width="100%" data-height="400" data-ratio="4/3">
        <ul class="">
            @foreach($banners as $key=>$banner)
                <li>
                    <img src="{{ $upload_files_prefix . $banner->BaseInfo_Image }}" style=""/>
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
            <SCRIPT type=text/javascript>
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
            </SCRIPT>
            <TABLE height="52" border="0" cellspacing="0" class=rollboder>
                <TBODY>
                <TR>
                    <TD height="52" class=rollleft>
                        <DIV class=rollTextMenus>

                            <DIV id=rollTextMenu6 style="DISPLAY: block; height:52px; line-height:52px;"><a style="" href="newsdetail.aspx?NewsID=1&CateID=101&NewsCateId=101">ATOP Corporation (ATOP) will attend Sviaz - Expocomm 2013 MOSCOW</a><span>[2015-04-27]</span>
                            </DIV>




                            <DIV id=rollTextMenu1 style="DISPLAY: none; height:52px; line-height:52px;"><a style="" href="newsdetail.aspx?NewsID=62&CateID=101&NewsCateId=101">ATOP will attend OFC Exhibition 2016</a> <span>[2015-11-12]</span>
                            </DIV>

                            <DIV id=rollTextMenu2 style="DISPLAY: none; height:52px; line-height:52px;"><a style="" href="newsdetail.aspx?NewsID=4&CateID=101&NewsCateId=101">ATOP will attend ECOC Exhibition 2015</a> <span>[2015-07-16]</span>
                            </DIV>

                            <DIV id=rollTextMenu3 style="DISPLAY: none; height:52px; line-height:52px;"><a style="" href="newsdetail.aspx?NewsID=6&CateID=101&NewsCateId=101">ATOP will attend OFC 2016</a> <span>[2015-07-16]</span>
                            </DIV>

                            <DIV id=rollTextMenu4 style="DISPLAY: none; height:52px; line-height:52px;"><a style="" href="newsdetail.aspx?NewsID=45&CateID=101&NewsCateId=101">ATOP expand the sales network in China</a> <span>[2015-06-30]</span>
                            </DIV>

                            <DIV id=rollTextMenu5 style="DISPLAY: none; height:52px; line-height:52px;"><a style="" href="newsdetail.aspx?NewsID=46&CateID=101&NewsCateId=101">ATOP Pointed New CEO</a> <span>[2015-06-15]</span>
                            </DIV>





                        </DIV></TD>
                    <TD class=rollcenter id=pageShow>3/6</TD>
                    <TD class=rollright><A title=上一条 href="javascript:rollText(-1);"><IMG src="images/last.gif"
                                                                                          alt=上一条 width="11" height="11" border="0"></A> <A title=下一条 href="javascript:rollText(1);"><IMG src="images/next.gif"
                                                                                                                                                                                          alt=下一条 width="11" height="11" border="0"></A></TD>
                </TR></TBODY></TABLE>
        </li>
    </div>
</div>
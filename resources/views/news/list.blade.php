@extends('layout_desktop')

@section('content')
<div class="maincontent">
<div class="maintext">
    <div class="rightpage2">
        <div class="newscate">
            <?php
                $parent = $category->parent();
            ?>
            <ul>
                <li class="catename">
                    {{ $category->Cate_Title }}
                </li>
                <li class="cateposition">
                    {{ session('lang')=='EN'?'Your current location is': '您正在浏览' }}：
                    <a href="{{ url('/') }}">{{ session('lang')=='EN'?'Home':'首页' }}</a> >
                    <a href="#">{{ $parent ? $parent->Cate_Title :null }}</a>&nbsp; >&nbsp;
                    <a href="{{ url('/news/'.$category->getTitleUrl()) }}">
                        {{ $category->Cate_Title }}
                    </a>
                </li>
            </ul>
        </div>
        <div class="textcontentt2"></div>
        <div class="contenttext2">
            <ul>
                <script type="text/javascript" src="{{ asset('js/jquery.masonry.js') }}"></script>
                <script type="text/javascript" src="{{ asset('js/jquery.infinitescroll.js') }}"></script>
                <style type="text/css">
                    *{margin:0;padding:0;list-style-type:none;}
                    a,img{border:0;}
                    em{font-style:normal;}
                    a{text-decoration:none;cursor:pointer;color:#666666;}
                    a:hover{color:#00367c;}
                    body{background:url("{{ url('/') }}images/bodybg.jpg") repeat #fff;color:#666666;font-family:Arial;font-size:12px;}
                    .fl{float:left;}.fr{float:right;}
                    .clearfix:after{content:".";display:block;height:0;clear:both;visibility:hidden;}
                    .clearfix{display:inline-table;}
                    *html .clearfix{height:1%;}
                    .clearfix{display:block;}
                    *+html .clearfix{min-height:1%;}
                    .demo{width:880px;margin:0 auto;}

                    /* item_list */
                    .item_list{position:relative;padding:0 0 50px;}
                    .item{
                        width:270px;background:#fff;overflow:hidden;margin:15px 0 0 0;
                        border-radius:4px 4px 4px 4px;
                        box-shadow:0 0px 3px rgba(34, 25, 25, 0.2);
                    }
                    .item_t{padding:10px 8px 0;}
                    .item_t .img{background-color:#FFFFFF;margin:0 auto;position:relative;width:250px;}
                    .item_t .img a{display:block;}
                    .item_t .img a:hover{background:#000;}
                    .item_t .img a:hover img{filter:alpha(opacity=80);-khtml-opacity:0.8;opacity:0.8;-webkit-transition:all 0.3s ease-out;-khtml-transition:all 0.3s ease-out;}
                    .item_t .price{
                        position:absolute;bottom:10px;right:0px;background-color:rgba(0, 0, 0, 0.2);color:#FFF;
                        filter:progid:DXImageTransform.Microsoft.gradient(startcolorstr=#33000000, endcolorstr=#33000000);
                    }
                    .item .btns{display:none;}
                    .img_album_btn{top:0px;right:0px;position:absolute;background:#ff6fa6;color:#ffffff;height:20px;line-height:20px;width:56px;border-radius:3px;}
                    .img_album_btn:hover{color:#fff;}
                    .item_t .title{padding:8px 0;line-height:18px;}
                    .item_t .title span{padding:8px 0;line-height:20px; width:100%;}
                    .ccccc{ font-weight:bold; font-size:14px; color:#00367c;}
                    .item_b{padding:10px 8px;}
                    .item_b .items_likes .like_btn{background:url("{{ url('/') }}images/fav_icon_word_new_1220.png") no-repeat;display:block;float:left;height:23px;width:59px;margin-right:5px;}
                    .item_b .items_likes em{line-height:23px;display:block;float:left;padding:0px 6px;color:#ccc;border-radius:3px;}

                    /* more */
                    #more{display:block;margin:10px auto 20px;}

                    /* infscr-loading */
                    #infscr-loading{bottom:-10px;left:45%;position:absolute;text-align:center;height:20px;line-height:20px;z-index:100;width:120px;}

                    /* page */
                    .page{display:none;font-size:18px;height:60px;text-align:center;margin:20px 0 0 0;}
                    .page_num a,.page_num span{margin:0 2px;background:url("{{ url('/') }}images/page.png") no-repeat;display:inline-block;width:30px;height:28px;line-height:26px;overflow:hidden;}
                    .page_num a{background-position:-65px 0;color:#FF3333;overflow:hidden;}
                    .page_num .prev{background-position:1px -33px;}
                    .page_num .unprev{background-position:1px 0;cursor:default;}
                    .page_num .next{background-position:-32px 0;}
                    .page_num .unnext{background-position:-32px -33px;cursor:default;}
                    .page_num .current{background-position:-99px 0;color:#FFFFFF;}
                    .page_num .etc{background-position:-172px 8px;}

                    /* to_top */
                    .to_top a,.to_top a:hover{background:url("{{ url('/') }}images/gotop.png") no-repeat}
                    .to_top a{
                        background-position:0 0;float:left;height:50px;overflow:hidden;width:50px;position:fixed;bottom:35px;cursor:pointer;right:20px;
                        _position:absolute;
                        _right:auto;
                        _left:expression(eval(document.documentElement.scrollLeft+document.documentElement.clientWidth-this.offsetWidth)-(parseInt(this.currentStyle.marginLeft, 10)||0)-(parseInt(this.currentStyle.marginRight, 10)||20));
                        _top:expression(eval(document.documentElement.scrollTop+document.documentElement.clientHeight-this.offsetHeight-(parseInt(this.currentStyle.marginTop, 10)||20)-(parseInt(this.currentStyle.marginBottom, 10)||20)));
                    }
                    .to_top a:hover{background-position:-51px 0px;}
                </style>

                <script type="text/javascript">
                    var isWidescreen=screen.width>=1150;
                    if(isWidescreen){document.write("<style type='text/css'>.demo{width:1150px;}</style>");}
                </script>

                <script type="text/javascript">
                    function item_masonry(){
                        $('.item img').load(function(){
                            $('.infinite_scroll').masonry({
                                itemSelector: '.masonry_brick',
                                columnWidth:270,
                                gutterWidth:15
                            });
                        });

                        $('.infinite_scroll').masonry({
                            itemSelector: '.masonry_brick',
                            columnWidth:270,
                            gutterWidth:15
                        });
                    }

                    $(function(){

                        function item_callback(){

                            $('.item').mouseover(function(){
                                $(this).css('box-shadow', '0 1px 5px rgba(35,25,25,0.5)');
                                $('.btns',this).show();
                            }).mouseout(function(){
                                $(this).css('box-shadow', '0 1px 3px rgba(34,25,25,0.2)');
                                $('.btns',this).hide();
                            });

                            item_masonry();

                        }

                        item_callback();

                        $('.item').fadeIn();

                        var sp = 1

                        $(".infinite_scroll").infinitescroll({
                            navSelector  	: "#more",
                            nextSelector 	: "#more a",
                            itemSelector 	: ".item",

                            loading:{
                                img: "images/masonry_loading_1.gif",
                                msgText: ' ',
                                finishedMsg: '木有了',
                                finished: function(){
                                    sp++;
                                    if(sp>=10){ //到第10页结束事件
                                        $("#more").remove();
                                        $("#infscr-loading").hide();
                                        $("#page").show();
                                        $(window).unbind('.infscr');
                                    }
                                }
                            },errorCallback:function(){
                                $("#page").show();
                            }

                        },function(newElements){
                            var $newElems = $(newElements);
                            $('.infinite_scroll').masonry('appended', $newElems, false);
                            $newElems.fadeIn();
                            item_callback();
                            return;
                        });

                    });
                </script>

                <div class="demo clearfix">
                    <div class="item_list infinite_scroll">
                        @foreach($news as $article)
                            @if($article->News_State == '1')
                                <div class="item masonry_brick">
                                    <div class="item_t">
                                        <div class="img">
                                            <a href="{{ url('/news/'.$article->News_Id) }}">
                                                <img width="250" src="{{ $article->News_Image }}" />
                                            </a>
                                        </div>
                                        <div class="title">
                                            <span class="ccccc">{{ $article->News_Title }}</span>
                                            <br> <br>
                                            <div style="height: 70px; overflow: hidden; display: block;">
                                                {!! $article->News_Content !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item_b clearfix">
                                        <div class="items_likes fl">
                                            <em class="bold">{{ $article->News_AddTime }}</em>
                                        </div>
                                        <div class="items_comment fr">
                                            <a href="{{ url('/news/'.$article->News_Id) }}">
                                                @if(session('lang') == 'CN')
                                                    详情
                                                @else
                                                    Learn more
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <span id='DcmsPage_PageInfo' style='display:none;'>1|9</span>

                        <!--item end--></div></div>
                <div style="display:none;" id="gotopbtn" class="to_top"><a title="返回顶部" href="javascript:void(0);"></a></div>

                <script type="text/javascript">
                    $(function(){

                        $(window).scroll(function(){
                            $(window).scrollTop()>1000 ? $("#gotopbtn").css('display','').click(function(){
                                $(window).scrollTop(0);
                            }):$("#gotopbtn").css('display','none');
                        });

                    });
                </script>
            </ul>
        </div>
    </div>
    <div style="clear:both"></div>
</div>
</div>
@stop

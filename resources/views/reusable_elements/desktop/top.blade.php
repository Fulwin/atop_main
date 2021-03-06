<div class="headerdu">
    <div class="logo" >
        <ul>
            <li style="float:left; "><a href="{{ url('/') }}"><img src="{{ url('images/logo.jpg') }}" width="385" height="108" alt=""></a></li>
            <li class="language" >
                <ul>
                    @if($_SERVER['SERVER_NAME'] == 'www.atoptechnology.com')
                        <li class="langhome"><a href="http://www.atoptechnology.com.cn" >简体中文</a></li>
                    @else
                        <li class="langhomecc"><a href="https://www.atoptechnology.com" >English</a></li>
                    @endif
                    <li class="socil">
                        <a href="https://twitter.com/ATOPCorporation" target="_blank">
                            <img src="{{ asset('images/twitter.jpg') }}" width="26" height="25" alt="">
                        </a>
                    </li>
                    <li class="socil">
                        <a href="https://www.facebook.com/ATOPcorporation" target="_blank">
                            <img src="{{ asset('images/facebook.jpg') }}" width="25" height="25" alt="">
                        </a>
                    </li>
                    <li class="socil">
                        <a href="https://www.linkedin.com/company/atop-technology-co.-ltd?trk=top_nav_home" target="_blank">
                            <img src="{{ asset('images/linkedin.jpg') }}" width="24" height="25" alt="">
                        </a>
                    </li>
                    {{--<li class="socil">--}}
                        {{--<a href="{{ asset('/Upload/catebannar/eeee-09375498874.jpg') }}" rel="sexylightbox">--}}
                            {{--<img src="{{ asset('images/wechat.jpg') }}" width="25" height="25" alt="">--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    @if($_SERVER['SERVER_NAME'] !== 'www.atoptechnology.com')
                    <li class="socil">
                        <a href="http://weibo.com/u/2650817513" target="_blank">
                            <img src="{{ asset('images/weibo.jpg') }}" width="25" height="25" alt="">
                        </a>
                    </li>
                    @endif
                </ul>

            </li>
        </ul>
    </div>
</div>

<div id="header">
    <div id="" class="sf-menu-wrap">
        <ul class="sf-menu" id="new-navi">
            <?php
                $cateAvatars = [
                    '/Upload/catebannar/1-11420239159.jpg',
                    '/Upload/catebannar/2-11420239159.jpg',
                    '/Upload/catebannar/2-11420239159.jpg',
                    '/Upload/catebannar/4-11420223281.jpg'
                ];
                $cateAvatarIndex = 0;
                // <img src="{{ $cateAvatars[$cateAvatarIndex] }}" width="182" height="130" />
            ?>
            <li class="menu-level-first">
                <a href="{{ url('/products') }}">{{ session('lang','EN')=='EN' ? 'Products' : '产品中心' }}</a>
                <div class="sf-mega">
                    @foreach($tree as $topCategoryId=>$item)
                        <?php
                            $topCategory = $item['data'];
                            $topSubs = $item['subs'];
                        ?>
                        @if($topCategory['Cate_IsMenu'] == '1')
                          @if($cateAvatarIndex>0 && $cateAvatarIndex%6 == 0)
                              <div class="cl"></div>
                          @endif
                          <div class="sf-mega-section">
                              <h2 class="cate-title">
                                  <a href="{{ url('/products/'.$topCategory->getIdString()) }}">
                                      {{ $topCategory->Cate_Title }}
                                  </a>
                              </h2>
                              <ul class="sub-cate-wrap">
                                  @if( !empty($topCategory->Cate_ExField1) )
                                      <li class="cate-avatar">
                                          <a href="{{ url('/products/'.$topCategory->getIdString()) }}">
                                              <img src="{{ asset($topCategory->Cate_ExField1) }}" width="170" />
                                          </a>
                                      </li>
                                  @endif


                                  @foreach($topSubs as $subId=>$subCategory)
                                      <li class="sub-cate">
                                          <a class="sub-cate-item" href="{{ url('/products/'.$subCategory['data']->getIdString()) }}">
                                              {{ $subCategory['data']->Cate_Title }}
                                          </a>
                                      </li>
                                  @endforeach
                              </ul>
                          </div>
                          <?php $cateAvatarIndex++; ?>
                        @endif
                    @endforeach
                </div>
            </li>
            <li class="menu-level-first text-center"><a href="{{ url('/solutions') }}">{{ session('lang','EN')=='EN' ? 'Solution' : '解决方案' }}</a></li>
            <li class="menu-level-first text-center" style="width: 170px;"><a href="{{ url('/services') }}">{{ session('lang','EN')=='EN' ? 'Service & Support' : '服务与支持' }}</a> </li>
            <li class="menu-level-first text-center"><a href="{{ url('/news') }}">{{ session('lang','EN')=='EN' ? 'News' : '新闻中心' }}</a> </li>
            <li class="menu-level-first text-center"><a href="{{ url('/about_us') }}">{{ session('lang','EN')=='EN' ? 'About Us' : '关于我们' }}</a> </li>
            <li class="menu-level-first text-center"><a href="{{ url('/contact_us') }}">{{ session('lang','EN')=='EN' ? 'Contact Us' : '联系我们' }}</a> </li>
        </ul>
        <script>

            (function($){ //create closure so we can safely use $ as alias for jQuery

                $(document).ready(function(){

                    var exampleOptions = {
                        speed: 'fast'
                    }
                    // initialise plugin
                    var example = $('#new-navi').superfish(exampleOptions);

                    // buttons to demonstrate Superfish's public methods
                    $('.destroy').on('click', function(){
                        example.superfish('destroy');
                    });

                    $('.init').on('click', function(){
                        example.superfish(exampleOptions);
                    });

                    $('.open').on('click', function(){
                        example.children('li:first').superfish('show');
                    });

                    $('.close').on('click', function(){
                        example.children('li:first').superfish('hide');
                    });
                });

            })(jQuery);


        </script>

        <div class="dianhu000" style="float:right; width:326px; padding-top:6px;margin-right:20px;">
            <script language="JavaScript" type="text/javascript">
                function search_OnSubmit(){
                    var KeyWord=get("KeyWord").value;
                    if(KeyWord.length<1){alert("Search Products Keywords");return false;}
                }
                $( function() {
                    $( "#KeyWord" ).autocomplete({
                        source: "{{ url('/products/search_ajax') }}",
                        minLength: 2,
                        select: function( event, ui ) {
//                            console.log( "Selected: " + ui.item.value + " aka " + ui.item.id );
                            window.location.href = '/product/view/' + ui.item.id;
                        }
                    });
                } );
            </script>
            <form style="margin:0px;padding:0px;" action="{{ url('/search_products') }}" method="get" onsubmit="javascript:return search_OnSubmit(this);">
                <table width="326" height="29" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="300" height="29" style="text-align: right;">
                            <input name="KeyWord" type="text" class="input2"
                                   id="KeyWord"
                                   placeholder="{{ session('lang','EN')=='EN' ? 'Search Products' : '按产品名称搜索' }}"  />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>

<div style="clear:both"></div>

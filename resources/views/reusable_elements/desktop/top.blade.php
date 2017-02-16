<div class="headerdu">
    <div class="logo" >
        <ul>
            <li style="float:left; "><a href="{{ url('/') }}"><img src="{{ url('images/logo.jpg') }}" width="385" height="108" alt=""></a></li>
            <li class="language" >
                <ul>
                    @if(session('lang') == 'EN')
                        <li class="langhome"><a href="{{ url('/switch_language/CN') }}" >简体中文</a></li>
                    @else
                        <li class="langhomecc"><a href="{{ url('/switch_language/EN') }}" >English</a></li>
                    @endif
                    <li class="socil">
                        <a href="https://twitter.com/ATOPCorporation" target="_blank">
                            <img src="{{ asset('images/twitter.jpg') }}" width="26" height="25" alt="">
                        </a>
                    </li>
                    <li class="socil">
                        <a href="https://www.facebook.com/AtopCorp?fref=ts" target="_blank">
                            <img src="{{ asset('images/facebook.jpg') }}" width="25" height="25" alt="">
                        </a>
                    </li>
                    <li class="socil">
                        <a href="http://www.linkedin.com/company/atop-technology-co.-ltd?trk=top_nav_home" target="_blank">
                            <img src="{{ asset('images/linkedin.jpg') }}" width="24" height="25" alt="">
                        </a>
                    </li>
                    <li class="socil">
                        <a href="{{ url('/load_wechat_image') }}" rel="sexylightbox[group1]">
                            <img src="{{ asset('images/wechat.jpg') }}" width="25" height="25" alt="">
                        </a>
                    </li>
                    <li class="socil">
                        <a href="http://weibo.com/u/2650817513" target="_blank">
                            <img src="{{ asset('images/weibo.jpg') }}" width="25" height="25" alt="">
                        </a>
                    </li>
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
                    'Upload/catebannar/1-11420239159.jpg',
                    'Upload/catebannar/2-11420239159.jpg',
                    'Upload/catebannar/2-11420239159.jpg',
                    'Upload/catebannar/4-11420223281.jpg'
                ];
                $cateAvatarIndex = 0;
            ?>
            <li class="menu-level-first">
                <a href="{{ url('/products') }}">{{ session('lang')=='EN' ? 'Products' : '产品中心' }}</a>
                <div class="sf-mega">
                    @foreach($tree as $topCategoryId=>$item)
                        <?php
                            $topCategory = $item['data'];
                            $topSubs = $item['subs'];
                        ?>
                        @if($topCategory['Cate_IsMenu'] == '1')
                          @if($cateAvatarIndex>0 && $cateAvatarIndex%4 == 0)
                              <div class="cl"></div>
                          @endif
                          <div class="sf-mega-section">
                              <h2 class="cate-title">
                                  <a href="{{ url('/products/'.$topCategoryId) }}">
                                      {{ $topCategory->Cate_Title }}
                                  </a>
                              </h2>
                              <ul class="sub-cate-wrap">
                                  @if( isset($cateAvatars[$cateAvatarIndex]) )
                                      <li class="cate-avatar">
                                          <a href="{{ url('/products/'.$topCategoryId) }}">
                                              <img src="{{ $cateAvatars[$cateAvatarIndex] }}" width="182" height="130" />
                                          </a>
                                      </li>
                                  @elseif( !empty($topCategory->Cate_Image) )
                                      <li class="cate-avatar">
                                          <a href="{{ url('/products/'.$topCategoryId) }}">
                                              <img src="{{ $topCategory->Cate_Image }}" width="182" height="130" />
                                          </a>
                                      </li>
                                  @endif

                                  @foreach($topSubs as $subId=>$subCategory)
                                      <li class="sub-cate">
                                          <a class="sub-cate-item" href="{{ url('/products/'.$subId) }}">
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
            <li class="menu-level-first"><a href="{{ url('/solutions') }}">{{ session('lang')=='EN' ? 'Solution' : '解决方案' }}</a></li>
            <li class="menu-level-first"><a style=" width:150px;" href="{{ url('/services') }}">{{ session('lang')=='EN' ? 'Service & Support' : '服务与支持' }}</a> </li>
            <li class="menu-level-first"><a href="{{ url('/news') }}">{{ session('lang')=='EN' ? 'News' : '新闻中心' }}</a> </li>
            <li class="menu-level-first"><a href="{{ url('/about_us') }}">{{ session('lang')=='EN' ? 'About Us' : '关于我们' }}</a> </li>
            <li class="menu-level-first"><a href="{{ url('/contact_us') }}">{{ session('lang')=='EN' ? 'Contact Us' : '联系我们' }}</a> </li>
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
            <form style="margin:0px;padding:0px;" action="{{ url('/search') }}" method="get" onsubmit="javascript:return search_OnSubmit(this);">
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

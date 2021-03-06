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
    <div id="myslidemenu" class="jqueryslidemenu">
        <ul>
            <li><a href="{{ url('/products') }}">{{ session('lang')=='EN' ? 'Products' : '产品中心' }}</a>
                <ul style="width:1010px; background:url('{{ url('/mmm/u6.png') }}') top left no-repeat; margin-left:-6px; padding-left:6px; height:215px;">
                    <div style="width:142px; float:left; padding:10px 0 0 0">
                        <li>
                            <a href="{{ url('/products/category/transmission') }}">
                                Transmission
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/products/category/data_center') }}">Data Center</a> </li>
                        <li><a href="{{ url('/products/category/CPRI') }}">CPRI</a> </li>
                        <li><a href="{{ url('/products/category/broadband_access') }}">Broadband Access</a> </li>
                    </div>
                    <div class="mtop">
                        <li style="height:80px; width:100%;">
                            <a href="{{ url('/products/category/transmission') }}">
                                <img src="{{ $upload_files_prefix }}Upload/catebannar/1-11420239159.jpg" width="182" height="130" />
                            </a>
                        </li>
                        <li style="line-height:16px; width:100%; font-weight:bold">Transmission</li>
                        <li style="line-height:16px; padding-top:10px; width:100%; text-align:left">ATOP offers a full range of optical tran…</li>
                    </div>

                    <div class="mtop">
                        <li style="height:80px; width:100%;">
                            <a href="{{ url('/products/category/data_center') }}">
                                <img src="{{ $upload_files_prefix }}Upload/catebannar/2-11420239159.jpg" width="182" height="130" />
                            </a>
                        </li>
                        <li style="line-height:16px; width:100%; font-weight:bold">Data Center</li>
                        <li style="line-height:16px; padding-top:10px; width:100%; text-align:left">Our firm is dedicated to supporting gree…</li>
                    </div>

                    <div class="mtop">
                        <li style="height:80px; width:100%;">
                            <a href="{{ url('/products/category/CPRI') }}">
                                <img src="{{ $upload_files_prefix }}Upload/catebannar/3-11420219312.jpg" width="182" height="130" />
                            </a>
                        </li>
                        <li style="line-height:16px; width:100%; font-weight:bold">CPRI</li>
                        <li style="line-height:16px; padding-top:10px; width:100%; text-align:left">With the development of LTE network and …</li>
                    </div>

                    <div class="mtop">
                        <li style="height:80px; width:100%;">
                            <a href="{{ url('/products/category/broadband_access') }}">
                                <img src="{{ $upload_files_prefix }}Upload/catebannar/4-11420223281.jpg" width="182" height="130" />
                            </a>
                        </li>
                        <li style="line-height:16px; width:100%; font-weight:bold">Broadband Access</li>
                        <li style="line-height:16px; padding-top:10px; width:100%; text-align:left">ATOP offers GPON OLT and ONU products fo…</li>
                    </div>
                </ul>
            </li>
            <li><a href="{{ url('/solutions') }}">{{ session('lang')=='EN' ? 'Solution' : '解决方案' }}</a></li>
            <li><a style=" width:150px;" href="{{ url('/services') }}">{{ session('lang')=='EN' ? 'Service & Support' : '服务与支持' }}</a> </li>
            <li><a href="{{ url('/news') }}">{{ session('lang')=='EN' ? 'News' : '新闻中心' }}</a> </li>
            <li><a href="{{ url('/about_us') }}">{{ session('lang')=='EN' ? 'About Us' : '关于我们' }}</a> </li>
            <li><a href="{{ url('/contact_us') }}">{{ session('lang')=='EN' ? 'Contact Us' : '联系我们' }}</a> </li>
        </ul>
        <div class="dianhu000" style="float:right; width:226px; padding-top:6px;">
            <script language="JavaScript" type="text/javascript">
                function search_OnSubmit(){
                    var KeyWord=get("KeyWord").value;
                    if(KeyWord.length<1){alert("Search Products Keywords");return false;}
                }
            </script>
            <form style="margin:0px;padding:0px;" action="{{ url('/search') }}" method="get" onsubmit="javascript:return search_OnSubmit(this);">
                <table width="226" height="29" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="185" height="29" style=" "><input name="KeyWord" type="text" class="input2" id="KeyWord" onfocus="if (this.value=='Search Products Keywords') this.value='';"  onblur="if (this.value=='') this.value='Search Products Keywords';" value="Search Products Keywords"  style=""  /></td>
                        <td width="41" align="left">
                            <input type="image" name="submit" img="img" src="{{ asset('images/search_btn.jpg') }}"  align="absmiddle"/>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>

<div style="clear:both"></div>


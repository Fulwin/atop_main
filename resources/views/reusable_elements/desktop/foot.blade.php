</div>

<div style="clear:both"></div>
<div  style=" width:100%; background: url('{{ asset('img/413.jpg') }}') top left repeat; padding-top:35px; overflow:hidden;" >
    <ul class="footer-wrap">
        <li class="homecase">
            <ul>
                <?php
                    $category = $footerLinks['about']['data'];
                    $subs = $footerLinks['about']['subs'];
                ?>
                <li class="sitesl">
                    <a style="font-size:14px; font-weight:bold;" href="{{ url('/about_us') }}" >
                        {{ $category->Cate_Title }}
                    </a>
                </li>
                @foreach($subs as $sub)
                    <li class="sitesl"><a href="{{ url('/about_us') }}#{{ $sub->Cate_Title }}"> {{ $sub->Cate_Title }}</a></li>
                @endforeach
            </ul>
        </li>
        <li class="homecase" >
            <ul>
                <?php
                    $category = $footerLinks['products']['data'];
                    $subs = $footerLinks['products']['subs'];
                ?>
                <li class="sitesl">
                    <a style="font-size:14px; font-weight:bold;" href="{{ url('/products') }}" >
                        {{ $category->Cate_Title }}
                    </a>
                </li>
                @foreach($subs as $sub)
                    <li class="sitesl"><a href="{{ url('/products/'.$sub->getTitleUrl()) }}"> {{ $sub->Cate_Title }}</a></li>
                @endforeach
            </ul>
        </li>
        <li class="homecase" >
            <ul>
                <li class="sitesl"  style="">
                    <a style="font-size:14px; font-weight:bold;" href="{{ url('/solutions') }}" >{{ session('lang')=='EN' ? 'Solution' : '解决方案' }}</a>
                </li>
                <?php
                    $category = $footerLinks['solution']['data'];
                    $subs = $footerLinks['solution']['subs'];
                ?>
                @foreach($subs as $sub)
                    <li class="sitesl"><a href="{{ url('/solutions/'.$sub->Down_ID) }}"> {{ $sub->Down_Title }}</a></li>
                @endforeach
            </ul>
        </li>
        <li class="homecase">
                <ul>
                    <?php
                        $category = $footerLinks['contact']['data'];
                        $subs = $footerLinks['contact']['subs'];
                    ?>
                    <li class="sitesl">
                        <a style="font-size:14px; font-weight:bold;" href="{{ url('/contact_us') }}" >
                            {{ $category->Cate_Title }}
                        </a>
                    </li>
                    @foreach($subs as $sub)
                        <li class="sitesl"><a href="{{ url('/contact_us#'.$sub->getTitleUrl()) }}"> {{ $sub->Cate_Title }}</a></li>
                    @endforeach
                </ul>

        </li>
        @if(session('lang') == 'CN')
            <li class="homecase">
                <ul>
                    <li>
                        <img src="{{ asset('img/atop_wechat.jpg') }}" width="180" alt="Wechat Atop">
                        <br><br>
                    </li>
                    <li class="sitesl" style="padding-right: 0;">
                        <a style="font-size:14px; font-weight:bold;text-align: center;width: 180px;" >
                            微信公众号
                        </a>
                    </li>
                </ul>
            </li>
        @endif
        <li class="homecase" style=" width:100%; text-align: center;">
            <a href="{{ url('/contact') }}"><img src="{{ asset('img/nn.png') }}" width="470" height="243" /></a>
        </li>
    </ul>
</div>

<div class="footer" style="">
    <ul style="margin:0 auto; width:1200px;">
        <li style="">
            <a href="{{ url('/contact_us') }}">{{ session('lang')=='EN' ? 'Contact Us' : '联系我们' }}</a> |
            <a href="{{ url('/solutions') }}">{{ session('lang')=='EN' ? 'Solution' : '解决方案' }}</a> |
            <a href="{{ url('/services') }}">{{ session('lang')=='EN' ? 'Services & Support' : '服务与支持' }}</a> |
            {{ session('lang')=='EN' ? 'Copyright © ATOP Corporation' : 'Copyright © 四川华拓光通信股份有限公司深圳分公司' }}
            {!! session('lang')=='CN' ? '<a target="_blank" href="http://www.miibeian.gov.cn">粤ICP备13084473号</a>' : null !!}
        </li>
    </ul>
</div>

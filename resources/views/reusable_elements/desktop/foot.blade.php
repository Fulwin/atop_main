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
                    <a style="font-size:14px; font-weight:bold;" href="{{ url('/about') }}" >
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
                    <a style="font-size:14px; font-weight:bold;" href="solutiontop.aspx" >{{ session('lang')=='EN' ? 'Solution' : '解决方案' }}</a>
                </li>
                <li class="sitesl"><a style="" href="solutionview2.aspx?DownID=16&CateID=87&DownCateID=87">PON</a> </li>
                <li class="sitesl"><a style="" href="solutionview2.aspx?DownID=13&CateID=87&DownCateID=87">Data center</a> </li>
                <li class="sitesl"><a style="" href="solutionview2.aspx?DownID=14&CateID=87&DownCateID=87">FTTX</a> </li>
                <li class="sitesl"><a style="" href="solutionview2.aspx?DownID=15&CateID=87&DownCateID=87">Wireless</a> </li>
                <?php
                    $category = $footerLinks['solution']['data'];
                    $subs = $footerLinks['solution']['subs'];
                ?>
                @foreach($subs as $sub)
                    <li class="sitesl"><a href="{{ url('/solution/'.$sub->getTitleUrl()) }}"> {{ $sub->Cate_Title }}</a></li>
                @endforeach
            </ul>
        </li>
        <li class="homecase">
            <ul>
                <ul>
                    <?php
                        $category = $footerLinks['contact']['data'];
                        $subs = $footerLinks['contact']['subs'];
                    ?>
                    <li class="sitesl">
                        <a style="font-size:14px; font-weight:bold;" href="{{ url('/contact') }}" >
                            {{ $category->Cate_Title }}
                        </a>
                    </li>
                    @foreach($subs as $sub)
                        <li class="sitesl"><a href="{{ url('/contact/'.$sub->getTitleUrl()) }}"> {{ $sub->Cate_Title }}</a></li>
                    @endforeach
                </ul>

            </ul>
        </li>
        <li class="homecase" style=" width:470px; float:right;">
            <a href="{{ url('/contact') }}"><img src="{{ asset('img/nn.png') }}" width="470" height="243" /></a>
        </li>
    </ul>
</div>


<div class="footer" style="">
    <ul style="margin:0 auto; width:1200px;">
        <li style="">
            <a href="{{ url('/contact') }}">{{ session('lang')=='EN' ? 'Contact Us' : '联系我们' }}</a> |
            <a href="{{ url('/solution') }}">{{ session('lang')=='EN' ? 'Solution' : '解决方案' }}</a> |
            <a href="{{ url('/service') }}">{{ session('lang')=='EN' ? 'Services & Support' : '服务与支持' }}</a> |
            {{ session('lang')=='EN' ? 'Copyright © ATOP Corporation' : 'Copyright © 四川华拓光通信股份有限公司深圳分公司' }}
        </li>
    </ul>
</div>

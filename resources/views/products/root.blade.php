@extends('layout_desktop')

@section('content')
    <div class="maincontent">
    <div class="maintext">
        @include('products.side_bar')
        <div class="rightpage">
            <div class="newscate">
                <ul>
                    <li class="catename">
                        {{ $category->Cate_Title }}
                    </li>
                    <li class="cateposition">
                        {{ session('lang')=='EN' ? 'Your current location is' : '您正在浏览' }}：
                        <a href="{{ url('/') }}">{{ session('lang')=='EN' ? 'Home' : '首页' }}</a> >
                        <a href="#">{{ $category->Cate_Title }}</a>
                    </li>
                </ul>
            </div>

            <div class="textcontentt">
            </div>

            <div class="contenttext">
                <div style="width:100%; padding-bottom:20px;">
                    {!! $category->Cate_Intro !!}
                </div>
                @foreach($tree as $categoryId=>$item)
                    <div style="float:left; width:880px; margin-bottom:40px; ">
                        <div style="float:left; width:210px;">
                            <a href="{{ url('/products/'.$categoryId) }}">
                                <img src="{{ asset($item['data']->Cate_ExField1) }}"
                                     border="0" width="210"  height="150"/>
                            </a>
                        </div>

                        <div style="float:right; width:620px; padding-left:40px; padding-top:15px; line-height:25px; ">
                            <div style="float:left; width:100%; text-align:left;">
                                <a style="color:#f78500; font-size:18px; font-family:微软雅黑;"
                                   href="{{ url('/products/'.$categoryId) }}">
                                    {{ $item['data']->Cate_Title }}
                                </a>
                            </div>
                            <div style="float:left; width:100%; text-align:left; padding:10px 0px;padding-right:20px;">
                                {!! $item['data']->Cate_Intro !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div style="clear:both"></div>
        </div>
    </div>
    </div>
@stop
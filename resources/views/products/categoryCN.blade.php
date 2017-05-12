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
                    <li class="cateposition">您正在浏览：<a href="{{ url('/') }}">首页</a> >
                        <a href="{{ url('/products/'.$parent->getIdString()) }}">{{ $parent->Cate_Title }}</a>&nbsp; >&nbsp;
                        <a href="#">{{ $category->Cate_Title }}</a>&nbsp; >&nbsp;
                    </li>
                </ul>
            </div>

            <div class="textcontentt">
            </div>

            @if (isset($is_mpo) && $is_mpo)
                @include('products.tables.mpo_table')
            @elseif (isset($is_wdm) && $is_wdm)
                @include('products.tables.wdm_table')
            @else
                @include('products.tables.general_table')
            @endif


        </div>
    </div>
@stop

@extends('layout_desktop')

@section('content')
    <div>
        <img src="{{ asset('/Upload/ATOPTechnology/services/services.jpg') }}" alt="华拓光通信" style="width: 100%;">
    </div>
    <div class="middle">
        <div style="margin:0 auto; width:1200px; padding:25px;">
            <div class="newscate">
                <ul>
                    <li class="catename">
                        {{ $tech->Down_Title }}
                    </li>
                    <li class="cateposition">Your current location is：<a href="{{ url('/') }}">{{ session('lang'=='EN') ? 'Home' : '首页' }}</a> >
                        <a href="">{{ session('lang')=='EN' ? 'Solution' : '解决方案' }}</a>&nbsp; >&nbsp;
                    </li>
                </ul>
            </div>
            <div class="textcontentt2" style="width:1200px;"></div>
        </div>
        <article class="wrap" style="margin:0 auto; width:1200px; padding:25px;">
            <section class="sec content2" style="position: relative;">
                @if(isset($tech) && $tech)
                    {!! $tech->Down_Content !!}
                @endif
            </section>
        </article>
    </div>
@stop
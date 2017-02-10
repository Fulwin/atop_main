@extends('layout_desktop')

@section('content')
    <div class="bannarspicculture"
         style="background:url('{{ asset('/Upload/catebannar/service&support-18444026038.jpg') }}') center top no-repeat;">
    </div>
    <div class="middle">
        <div style="margin:0 auto; width:1200px; padding:25px;">
            <div class="newscate">
                <ul>
                    <li class="catename">
                        {{ $tech->Down_Title }}
                    </li>
                    <li class="cateposition">Your current location is：<a href="{{ url('/') }}">Home</a> >
                        <a href="">Solution</a>&nbsp; >&nbsp;
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
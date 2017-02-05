@extends('layout_desktop')

@section('content')
    <div class="bannarspicculture"
         style="background:url('{{ asset('/Upload/catebannar/solutionsbanner-17475279305.jpg') }}') center top no-repeat;">
    </div>
    <div class="middle">
        <div style="margin:0 auto; width:1200px; padding:25px;">
            <div class="newscate">
                <ul>
                    <li class="catename">
                        Solution
                    </li>
                    <li class="cateposition">Your current location is：<a href="{{ url('/') }}">Home</a> >
                        <a href="">Solution</a>&nbsp; >&nbsp;
                    </li>
                </ul>
            </div>
            <div class="textcontentt2" style="width:1200px;"></div>
        </div>
        <article class="wrap">
            <section class="sec content2" style="position: relative;">
                @if(isset($download) && $download)
                    {!! $download->Down_Content !!}
                @endif
            </section>
        </article>
    </div>
@stop
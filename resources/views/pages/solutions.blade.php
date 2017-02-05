@extends('layout_desktop')

@section('content')
    <div class="bannarspicculture"
         style="background:url('{{ asset('/Upload/catebannar/solutionsbanner-17475279305.jpg') }}') center top no-repeat;">
    </div>
    <div class="middle">
        @foreach($downloads as $download)
            <section class="sec content2" style="position: relative;">
                <div>
                    <img id="dsImg" width="100%" src="{{ $download->Down_Image }}">
                    <a style="width: 7%;height: 25px;position: absolute;bottom: 5%;left: 50%;margin-left: -4%;border-radius:5px; background:#fff;box-shadow:0 0 5px #ccc; font-size:14px; text-align:center;"
                       href="{{ url('/solutions/'.$download->Down_ID) }}" >More</a>
                </div>
            </section>
        @endforeach
    </div>
@stop
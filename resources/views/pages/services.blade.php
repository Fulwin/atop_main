@extends('layout_desktop')

@section('content')
    <div class="bannarspicculture"
         style="background:url('{{ asset('/Upload/catebannar/solutionsbanner-17475279305.jpg') }}') center top no-repeat;">
    </div>

    <div class="middle">
        <section class="sec content2" style="position: relative;">
            <div>
                <img id="dsImg" width="100%" src="/Upload/quality/pon-17455811836.jpg">
                <a style="width: 7%;height: 25px;position: absolute;bottom: 5%;left: 50%;margin-left: -4%;border-radius:5px; background:#fff;box-shadow:0 0 5px #ccc; font-size:14px; text-align:center;"
                   href="{{ url('/support/1001') }}" >More</a>
            </div>
        </section>
        <section class="sec content2" style="position: relative;">
            <div>
                <img id="dsImg" width="100%" src="/Upload/quality/datacenter-17420821965.jpg">
                <a style="width: 7%;height: 25px;position: absolute;bottom: 5%;left: 50%;margin-left: -4%;border-radius:5px; background:#fff;box-shadow:0 0 5px #ccc; font-size:14px; text-align:center;"
                   href="{{ url('/support/1002') }}" >More</a>
            </div>
        </section>
        <section class="sec content2" style="position: relative;">
            <div>
                <img id="dsImg" width="100%" src="/Upload/quality/fttx-17440056015.jpg">
                <a style="width: 7%;height: 25px;position: absolute;bottom: 5%;left: 50%;margin-left: -4%;border-radius:5px; background:#fff;box-shadow:0 0 5px #ccc; font-size:14px; text-align:center;"
                   href="{{ url('/support/13') }}">More</a>
            </div>
        </section>
        <section class="sec content2" style="position: relative;">
            <div>
                <img id="dsImg" width="100%" src="/Upload/quality/wireless-17475320897.jpg">
                <a style="width: 7%;height: 25px;position: absolute;bottom: 5%;left: 50%;margin-left: -4%;border-radius:5px; background:#fff;box-shadow:0 0 5px #ccc; font-size:14px; text-align:center;"
                   href="{{ url('/downloads/150') }}">More</a>
            </div>
        </section>
    </div>
@stop
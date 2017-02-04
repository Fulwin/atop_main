@extends('layout_desktop')

@section('content')
    <div class="maincontent">
    <div class="maintext">
        <div class="rightpage2">
            <div class="textcontentt2"></div>
            <div class="contenttext2">
                <h1 style="float: left; width: 100%; text-align: center;font-size: 20px;font-weight: bold;">
                    {{ $news->BaseInfo_Title }}
                </h1>

                <div style="float: left; width: 100%; text-align: left">
                    {!! $news->BaseInfo_Content !!}
                </div>

                @if(isset($prevOne) && $prevOne)
                    <div style="float: left; width: 47%; color:#f78500; background:#eee; padding:15px;">
                        <p>
                            <br />
                            <strong>Prev</strong>&nbsp; &nbsp; &nbsp;
                            <a href="{{ url('/news/'.$prevOne->BaseInfo_Id) }}">
                                {{ $prevOne->BaseInfo_Title }}
                            </a>
                        </p>
                    </div>
                @endif

                @if(isset($nextOne) && $nextOne)
                    <div style="float: right; width: 47%; color:#f78500; background:#eee; padding:15px;">
                        <p>
                            <br />
                            <strong>Next</strong>&nbsp; &nbsp; &nbsp;
                            <a href="{{ url('/news/'.$nextOne->BaseInfo_Id) }}">
                                {{ $nextOne->BaseInfo_Title }}
                            </a>
                        </p>
                    </div>
                @endif
            </div>

        </div>
        <div style="clear:both"></div>
    </div>
    </div>

@stop

@extends('layout_desktop')

@section('content')
    <div class="maincontent">
    <div class="maintext">
        <div class="rightpage2">
            <div class="newscate">
                <?php
                $parent = $category->parent();
                ?>
                <ul>
                    <li class="catename">
                        {{ $category->Cate_Title }}
                    </li>
                    <li class="cateposition">Your current location is：<a href="{{ url('/') }}">Home</a> >
                        <a href="#">{{ $parent ? $parent->Cate_Title :null }}</a>&nbsp; >&nbsp;
                        <a href="{{ url('/news/'.$category->getTitleUrl()) }}">
                            {{ $category->Cate_Title }}
                        </a>&nbsp; >&nbsp;
                    </li>
                </ul>
            </div>
            <div class="textcontentt2"></div>
            <div class="contenttext2">
                <h1 style="float: left; width: 100%; text-align: center">
                    {{ $news->News_Title }}
                </h1>

                <div style="float: left; width: 100%; text-align: center; margin-top: 20px; margin-bottom: 50px; color:#ccc; border-bottom:#ccc dashed 1px;">
                    Date：{{ $news->News_AddTime }}
                </div>
                <div style="float: left; width: 100%; text-align: left">
                    {!! $news->News_Content !!}
                </div>

                @if(isset($prevOne) && $prevOne)
                    <div style="float: left; width: 47%; color:#f78500; background:#eee; padding:15px;">
                        <p>
                            <br />
                            <strong>Prev</strong>&nbsp; &nbsp; &nbsp;
                            <a href="{{ url('/news/'.$prevOne->News_Id) }}">
                                {{ $prevOne->News_Title }}
                            </a>
                        </p>
                    </div>
                @endif

                @if(isset($nextOne) && $nextOne)
                    <div style="float: right; width: 47%; color:#f78500; background:#eee; padding:15px;">
                        <p>
                            <br />
                            <strong>Next</strong>&nbsp; &nbsp; &nbsp;
                            <a href="{{ url('/news/'.$nextOne->News_Id) }}">
                                {{ $nextOne->News_Title }}
                            </a>
                        </p>
                    </div>
                @endif
            </div>

        </div>
        <div style="clear:both"></div>
    </div>
    <div class="maincontent">
@stop

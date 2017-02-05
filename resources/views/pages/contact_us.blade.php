@extends('layout_desktop')

@section('content')
    <div class="middle">
    <article class="wrap">
        <section class="tab">
            <div class="tab_nav">
                <div class="inner">
                    <ul class="about_tabul">
                        @foreach($contactSubsCategories as $key=>$sub)
                            <?php
                                $isLast = $key == count($contactSubsCategories) ? true : false;
                            ?>
                            <li class="{{ $isLast ? 'last no6' : 'no2' }}">
                                <a href="#{{ $sub->Cate_Title }}">{{ $sub->Cate_Title }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="cl"></div>
                </div>
            </div>
        </section>

        @foreach($contactSubsCategories as $key=>$sub)
            <a name="{{ $sub->Cate_Title }}"></a>
            <section class="{{ str_replace(' ','',$sub->Cate_Title) }}">
                <div class="inner">
                    @if($sub->Cate_Title == 'Contact Us')
                        <div class="CU por">
                            <div class="MC_title">
                                <h2>{{ $sub->Cate_Title }}</h2>
                                <p class="cu_t">ATOP Corporation</p>
                            </div>
                        </div>
                        <div class="Contact_inn">
                                <?php
                                    $baseInfos = $sub->baseInfos();
                                ?>
                                @foreach($baseInfos as $baseInfo)
                                    <div class="fl contact_info">
                                        {!! $baseInfo->BaseInfo_Content !!}
                                    </div>
                                    <div class="fr"><img src="{{ url($baseInfo->BaseInfo_Image) }}" width="100%"></div>
                                    <div class="cl"></div>
                                @endforeach
                        </div>
                    @else
                        <div class="MC_title">
                            <h2>{{ $sub->Cate_Title }}</h2>
                            <p class="cu_t">{!! $sub->Cate_Intro !!}</p>
                        </div>
                        <div class="MT_inn">
                            <div class="fl">
                                <ul class="right_people" style="padding-left:0px;">
                                    <?php
                                        $baseInfos = $sub->baseInfos();
                                    ?>
                                    @foreach($baseInfos as $baseInfo)
                                        <li>
                                            <img src="{{ $baseInfo->BaseInfo_Image }}">
                                            <div class="people_info">
                                                <div class="fl MT_nam">
                                                    <p>{{ $baseInfo->BaseInfo_Title }}</p>
                                                </div>
                                                <div class="fr MT_ico"><a href="#"></a></div>
                                            </div>
                                            <div class="MT_details" style="left:182px;">
                                                <h6>{{ $baseInfo->BaseInfo_Title }}</h6>
                                                {!! $baseInfo->BaseInfo_Content !!}
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="fr">
                                <img src="{{ url($sub->Cate_Image) }}" alt="" width="100%">
                            </div>
                            <div class="cl"></div>
                        </div>
                    @endif
                </div>
            </section>
        @endforeach
    </article>
    </div>
@stop
@extends('layout_desktop')

@section('content')
    <?php
        // dd($aboutCategories->toArray());
    ?>
    @if(session('lang')=='EN')
        <div class="bannarspicculture"
             style="background:url('{{ asset('/page_banner/aboutus-1680.jpg') }}') center top no-repeat;height: 389px;">
        </div>
    @else
        <div class="bannarspicculture"
             style="background:url('{{ $upload_files_prefix }}Upload/catebannar/aboutus_banner-18421822329.jpg') center top no-repeat;">
        </div>
    @endif
    <div class="maincontent">
        <div class="middle">
            <article class="wrap">
                <section class="tab">
                    <div class="tab_nav">
                        <div class="inner">
                            <ul class="about_tabul">
                                @foreach($aboutCategories as $cat)
                                    <li class="no2"><a href="#{{ $cat->Cate_Title }}">{{ $cat->Cate_Title }}</a></li>
                                @endforeach
                            </ul>
                            <div class="cl"></div>
                        </div>
                    </div>
                </section>

                @foreach($aboutCategories as $key => $cat)
                    <a name="{{ $cat->Cate_Title }}"></a>
                    <?php
                        $isMilestone = ($key == 1);
                        $companyStructure = ($key == 2);
                        $management = ($key == 3);
                        $qualityControl = ($key == 4);
                        $culture = ($key == 5);
                    ?>
                    @if($isMilestone)
                        <section class="Milestones">
                            <div class="inner">
                                <div class="MC_title">
                                    <h2>{{ $cat->Cate_Title }}
                                    </h2>
                                </div>
                                <div class="Milestones_inn" style="background:url('{{ $upload_files_prefix . $cat->Cate_Image }}') top center no-repeat; height:583px;">
                                    <div class="cl"></div>
                                </div>
                            </div>
                        </section>
                    @elseif($companyStructure)
                        <section class="CorporateStructure">
                            <div class="inner">
                                <div class="MC_title">
                                    <h2>{{ $cat->Cate_Title }}
                                    </h2>
                                </div>
                                <div class="CS_inn" style="background:url('{{ $upload_files_prefix . $cat->Cate_Image }}') top center no-repeat; height:583px;">
                                    <div class="cl"></div>
                                </div>
                            </div>
                        </section>
                    @elseif($management)
                        <section class="ManagementTeam">
                            <div class="inner">
                                <div class="MC_title">
                                    <h2>{{ $cat->Cate_Title }}
                                    </h2>
                                </div>
                                <div class="MT_inn">
                                    <?php
                                        $items = $cat->baseInfos();
                                        if($items) {
                                            foreach ($items as $index => $member) {
                                                ?>

                                                @if($index==0)
                                                <div class="fl {{ $index==0 ? 'ceo' : null }}">
                                                        <div class="por">
                                                            <img src="{{ $upload_files_prefix }}Upload/quality/jack-16413777034.jpg" alt="">
                                                            <div class="people_info">
                                                                <div class="fl MT_nam">
                                                                    <p>{{ $member->BaseInfo_Title }}</p>
                                                                    <p></p>
                                                                </div>
                                                                <div class="fr MT_ico"><a href="#"></a></div>
                                                            </div>
                                                            <div class="MT_details">
                                                                <h6>{{ $member->BaseInfo_Title }}</h6>
                                                                <span></span>
                                                                {!! $member->BaseInfo_Content !!}
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="fl">
                                                    <ul class="right_people">
                                                @else
                                                        <li> <img src="{{ $upload_files_prefix . $member->BaseInfo_Image }}" alt="" width="182" height="220">
                                                            <div class="people_info">
                                                                <div class="fl MT_nam">
                                                                    <p>{{ $member->BaseInfo_Title }}</p>
                                                                    <p></p>
                                                                </div>
                                                                <div class="fr MT_ico"><a href="#"></a></div>
                                                            </div>
                                                            <div class="MT_details" style="left:-418px; top:220px;">
                                                                <h6>{{ $member->BaseInfo_Title }}</h6>
                                                                <span></span>
                                                                {!! $member->BaseInfo_Content !!}
                                                            </div>
                                                        </li>
                                                        <?php
                                                            if($index == (count($items)-1)){
                                                                ?>
                                                    </ul>
                                                </div>
                                                <div class="cl"></div>
                                                                <?php
                                                            }
                                                        ?>
                                                @endif
                                                <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </section>
                    @elseif($qualityControl)
                        <section class="CorporateCulture" style="background:#e7e7e7; margin-top:40px;">
                            <div class="inner">
                                <div class="line" style="background:none;">
                                    <div class="MC_title">
                                        <h2>{{ $cat->Cate_Title }}</h2>
                                    </div>
                                </div>

                                <div class="Culture_inn2">
                                    <ul>
                                        <?php
                                            $items = $cat->baseInfos();
                                        ?>
                                        @foreach($items as $item)
                                        <li><a href="{{ url('/quality/'.$item->BaseInfo_Id) }}">
                                                <div class="act_nor" style="height:110px;">
                                                    <img src="{{ $upload_files_prefix . $item->BaseInfo_Image }}" alt="">
                                                </div>
                                            </a><div class="act_detail0"><a href="{{ url('/quality/'.$item->BaseInfo_Id) }}">
                                                    <h6 style="color:#333;height:60px; line-height:20px;">{{ $item->BaseInfo_Title }}</h6>

                                                </a>
                                            </div>
                                        </li>

                                        @endforeach
                                        <div class="cl"></div>
                                    </ul>
                                    <div class="more padt">
                                        <a href="{{ url('/quality') }}" style="background:#fff; color:#333!important;">More</a>
                                    </div>
                                </div>
                            </div>
                        </section>
                    @elseif($culture)
                        <section class="CorporateCulture">
                            <div class="inner">
                                <div class="line">
                                    <div class="MC_title">
                                        <h2>{{ $cat->Cate_Title }}</h2>
                                    </div>
                                </div>

                                <div class="Culture_inn">
                                    <ul>
                                        <?php
                                            $news = $cat->news();
                                        ?>
                                        @foreach($news as $index => $item)

                                        <li class="{{ $index==count($news)-1 ? 'last' : null }}">
                                            <a href="{{ url('/news/'.$item->News_Id) }}">
                                                <div class="act_nor">
                                                    <img src="{{ asset($item->News_Image) }}" alt="">
                                                </div>
                                            </a>
                                            <div class="act_detail">
                                                <a href="{{ url('/news/'.$item->News_Id) }}">
                                                    <h6>{{ $item->News_Title }}</h6>
                                                    <div class="act_txt">
                                                        {!! $item->News_Content !!}
                                                    </div>
                                                </a>
                                                <p class="act_more">
                                                    <a href="{{ url('/news/'.$item->News_Id) }}"></a>
                                                    <a href="{{ url('/news/'.$item->News_Id) }}">More&gt;&gt;</a>
                                                </p>
                                            </div>
                                        </li>
                                        @endforeach
                                            <div class="cl"></div>
                                    </ul>
                                    <div class="more padt">
                                        <a href="{{ url('/news') }}">More</a>
                                    </div>
                                </div>
                            </div>
                        </section>
                    @else
                        <section class="CompanyProfile">
                            <div class="inner">
                                <div class="MC_title">
                                    <h2>{{ $cat->Cate_Title }}
                                    </h2>
                                </div>
                                <div class="CP_inn">
                                    <?php
                                    $items = $cat->baseInfos();
                                    if($items) {
                                        foreach ($items as $item) {
                                            ?>
                                            {!! $item->BaseInfo_Content !!}
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </section>
                    @endif
                @endforeach
            </article>

        </div>
@stop
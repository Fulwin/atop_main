@extends('layout_desktop')

@section('content')
    <div>
        <img src="{{ asset('/Upload/ATOPTechnology/solutions/solutions.jpg')}}" alt="解决方案">
    </div>
    <div class="middle solutions-content">
        <h2>
          {{ session('lang')=='EN' ? 'SOLUTIONS': '解决方案中心' }}
        </h2>
        <p class="divider-wrap">
          <span class="divider"></span>
        </p>
        <p class="subtitle">

            {{ session('lang')=='EN' ? 'Enjoy reliable full series smart optical fiber solutions': '请感受我们高可靠性的全系列智能光纤解决方案' }}
        </p>
        <div class="solutions-row">
          @foreach($downloads as $download)
              <div class="solution-card">
                <div class="solution-avatar">
                  <a href="{{ url('/solutions/'.$download->Down_ID) }}">
                    <img src="{{ $download->Down_Image }}" alt="">
                  </a>
                </div>
                <div class="solution-content">
                  <a href="{{ url('/solutions/'.$download->Down_ID) }}">
                    <h2 class="title">{{ $download->Down_Title }}</h2>
                  </a>
                  <div class="solution-desc">
                    {!! $download->excerpt !!}
                  </div>
                </div>
                <div class="card-btn">
                  <a href="{{ url('/solutions/'.$download->Down_ID) }}">
                      {{ session('lang')=='EN' ? 'READ MORE': '了解详情' }}
                  </a>
                </div>
              </div>
          @endforeach
        </div>
        <div class="solutions-row solutions-extra-row">
          <div class="extra">
            <h3>ABOUT US</h3>
            <p class="subtitle">Local &amp; Innovation</p>
            <div class="the-box">
              <div class="box-icon">
                <span class="icon-about-us"></span>
              </div>
              <div class="box-content">
                <p>ATOP Corporation is a leading manufacturer of optical transceivers. ATOP is proficient in R&D, production and sales of optical components, transceivers and sub-system.</p>
              </div>
            </div>
          </div>
          <div class="extra">
            <h3>WHY US</h3>
            <p class="subtitle">Quality &amp; Budget</p>
            <div class="the-box">
              <div class="box-icon">
                <span class="icon-why-us">
                <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span>
                </span>
              </div>
              <div class="box-content">
                <p>
                  ATOP Corporation is a leading manufacturer
                  of optical transceivers. ATOP’s professional
                  research and production capabilities/capacity
                  is one of our key advantages. With many years
                  of experience in high speed transceivers design
                </p>
              </div>
            </div>
          </div>
          <div class="extra">
            <h3>PRODUCTS</h3>
            <p class="subtitle">High Quality</p>
            <div class="the-box">
              <div class="box-icon" style="padding-top:10px;">
                <span class="icon-products" style="font-size: 50px;"></span>
              </div>
              <div class="box-content">
                <p>
ATOP's optical transceiver solutions cover a
wide range of applications including data
communication, SDH, FTTX, Data center and
cloud computing.
                </p>
              </div>
            </div>
          </div>
        </div>
    </div>
@stop

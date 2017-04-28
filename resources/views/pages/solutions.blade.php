@extends('layout_desktop')

@section('content')
    <div>
        <img src="{{ asset('/Upload/ATOPTechnology/solutions/solutions.jpg')}}" alt="解决方案" style="width: 100%;">
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
                    <br>
                </div>
              </div>
          @endforeach
        </div>
        @if(session('lang')=='EN')
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
        @else
        <div class="solutions-row solutions-extra-row">
          <div class="extra">
            <h3>关于我们</h3>
            <p class="subtitle">
                坚守与创新
            </p>
            <div class="the-box">
              <div class="box-icon">
                <span class="icon-about-us"></span>
              </div>
              <div class="box-content">
                  <p>
                      华拓光通信是行业领先的光模块制造商，在光学元件、模块化产品和子系统的研发、生产和销售方面有着十分丰富的经验
                  </p>
              </div>
            </div>
          </div>
          <div class="extra">
            <h3>为什么选择我们</h3>
            <p class="subtitle">
                品质与预算
            </p>
            <div class="the-box">
              <div class="box-icon">
                <span class="icon-why-us">
                <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span>
                </span>
              </div>
              <div class="box-content">
                <p>
                    华拓光通信是行业领先的光模块制造商。华拓专业的研究和生产能力是我们的主要优势之一，在高速光模块设计方面拥有多年的经验
                </p>
              </div>
            </div>
          </div>
          <div class="extra">
            <h3>产品
            </h3>
            <p class="subtitle">高品质
            </p>
            <div class="the-box">
              <div class="box-icon" style="padding-top:10px;">
                <span class="icon-products" style="font-size: 50px;"></span>
              </div>
              <div class="box-content">
                <p>
                    华拓提供全系列的光器件解决方案，包括数据通信，SDH, FTTx , 数据中心和云计算
                </p>
              </div>
            </div>
          </div>
        </div>
        @endif
    </div>
@stop

@extends('layout_desktop')

@section('content')
    <div class="maincontent">
    <div class="maintext">
        @include('products.side_bar')
        <div class="rightpage">
            <div class="newscate">
                <ul>
                    <li class="cateposition">您正在浏览：<a href="{{ url('/products') }}">产品</a> >
                        <a itemprop="category" href="{{ url('/products/'.$category->Cate_Id) }}">{{ $category->Cate_Title }}</a>&nbsp; &nbsp;
                    </li>
                </ul>
            </div>

            <div class="textcontentt">
            </div>

            <div class="product-wrap">
                <div class="row">
                    <div class="image-wrap">
                      <div class="product-slider">
                        <ul>
                          <li>
                            <img itemprop="image" src="{{ $product->Products_BigImage }}" alt="{{ $product->Products_Title }}">
                          </li>
                          <?php $imageIndexRange = range(1,9); ?>
                          @foreach ($imageIndexRange as $index)
                              <?php
                                $fieldName = 'Products_BigImage' . $index;
                                if(!empty(trim($product->$fieldName))){
                                  ?>
                                  <li>
                                    <img itemprop="image" src="{{ $product->$fieldName }}" alt="{{ $product->Products_Title }}">
                                  </li>
                                  <?php
                                }
                              ?>
                          @endforeach
                        </ul>
                      </div>
                    </div>
                    <script>
                        $(function() { $('.product-slider').unslider({autoplay: true, arrows: false, delay: 5000}) });
                    </script>

                    <div class="desc-wrap mb40">
                        <h2>
                            <span class="name" itemprop="name">
                                {{ $product->Products_Title }}
                            </span>
                        </h2>
                        <p class="code" itemprop="sku">
                            产品编码: {{ $product->Products_CodeName }}
                        </p>
                        <p class="general">
                            产品描述
                        </p>
                        <div class="line"></div>
                        <div class="short" itemprop="description" style="padding-top: 15px;">
                            {!! $product->Products_Introduction !!}
                        </div>
                    </div>
                </div>

                <div class="textcontentt  mt40">
                </div>

                <div class="row">
                    <div class="feature-wrap">
                        <h4>
                            产品指标
                        </h4>
                        <ul>


                            @if(isset($is_mpo) && $is_mpo)
                                <li class="txt cl">连接器类型: {{ $product->mpo_connector_type }}</li>
                                <li class="txt cl">光纤类型: {{ $product->mpo_fiber_type }}</li>
                                <li class="txt cl">低插入损耗: {{ $product->mpo_low_il }}</li>
                                <li class="txt cl">标准插入损耗: {{ $product->mpo_high_il }}</li>
                                <li class="txt cl">回波损耗: {{ $product->mpo_return_loss }}</li>
                                <li class="txt cl">接口类型: {{ $product->Products_ExFlag7 }}</li>
                                <li class="txt cl">工作温度范围: {{ $product->Products_ExFlag8 }}</li>
                                <li class="txt cl">光缆长度: {{ $product->Products_ExFlag9 }}</li>
                            @elseif(isset($is_wdm) && $is_wdm)
                                <li class="txt cl">封装: {{ $product->Products_ExFlag1 }}</li>
                                <li class="txt cl">信道波长: {{ $product->Products_ExFlag3 }}</li>
                                <li class="txt cl">相邻信道隔离度: {{ $product->wdm_adjacent_channel_isolation }}</li>
                                <li class="txt cl">非相邻信道隔离度: {{ $product->wdm_non_adjacent_channel_isolation }}</li>
                                <li class="txt cl">插入损耗: {{ $product->wdm_insertion_loss }}</li>
                                <li class="txt cl">回波损耗: {{ $product->mpo_return_loss }}</li>
                                <li class="txt cl">工作温度范围: {{ $product->Products_ExFlag8 }}</li>
                            @else
                                <li class="txt cl">封装: {{ $product->Products_ExFlag1 }}</li>
                                <li class="txt cl">传输速率: {{ $product->Products_ExFlag2 }}</li>
                                <li class="txt cl">波长: {{ $product->Products_ExFlag3 }}</li>
                                <li class="txt cl">光器件: {{ $product->Products_ExFlag4 }}</li>
                                <li class="txt cl">发光范围: {{ $product->Products_ExFlag5 }}</li>
                                <li class="txt cl">收端灵敏度: {{ $product->Products_ExFlag6 }}</li>
                                <li class="txt cl">接口: {{ $product->Products_ExFlag7 }}</li>
                                <li class="txt cl">工作温度范围: {{ $product->Products_ExFlag8 }}</li>
                                <li class="txt cl">传输距离: {{ $product->Products_ExFlag9 }}</li>
                                <li class="txt cl">多速率兼容: {{ $product->Products_ExFlag10 }}</li>
                            @endif
                        </ul>
                    </div>
                    <div class="application-wrap">
                        <h4>
                            应用范围
                        </h4>
                        <div class="applications-content">
                          {!! $product->Products_Feature !!}
                        </div>
                        <br>
                        <div class="download-btn">
                            <a href="{{ url('/download_brochure/'.$product->Products_ID) }}">
                                下载规格书
                            </a>
                        </div>
                        <div class="download-btn">
                            <a href="#" id="request-btn-trigger">
                                咨询报价
                            </a>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>


                @if( (isset($is_mpo) && $is_mpo) ||  (isset($is_wdm) && $is_wdm))

                @else
                    <div class="textcontentt mt40">
                    </div>
                    <div class="row mt40">
                        <div class="eye-diagram-wrap">
                            <h4>眼图</h4>
                            <?php
                              $keys = range(1,3);
                              $imageTitleEn = [
                                  'RT','LT','HT'
                              ];
                              $imageTitleCn = [
                                  '常温','低温','高温'
                              ];
                              $imageTitle = session('lang','EN')=='EN' ? $imageTitleEn : $imageTitleCn;
                            ?>
                            @foreach ($keys as $index)
                              <?php
                                $fieldName = 'Products_EyeDiagram' . $index;
                              ?>
                              @if(!empty(trim($product->$fieldName)))
                                <div class="eye-diagram-img">
                                  <p>{{ $imageTitle[$index-1] }}</p>
                                  <img src="{{ asset($product->$fieldName) }}">
                                </div>
                              @endif
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="clearfix"></div>
                <div class="textcontentt mt40">
                </div>

                <div class="row mt40">
                    <div class="specification-wrap">
                        <h4>结构尺寸规格</h4>
                        @if(!empty(trim($product->Products_MechanicalSpecification)))
                          <img src="{{ asset($product->Products_MechanicalSpecification) }}" alt="" style="width: 90%; margin-bottom: 10px;">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div id="dialog-form">
        <div class="dialog-wrap-wrap">
          <h3>产品报价咨询表: {{ $product->Products_Title }} (产品编码: {{ $product->Products_CodeName }})</h3>
          <form method="POST" action="/quoto_request" id="request-quote-form">
            {{ csrf_field() }}
            <input type="hidden" name="code" value="{{ $product->Products_CodeName }}" id="quote-product-code">
            <div class="quote-input-wrap">
              <label for="quote-name">
                姓名
              </label>
              <input type="text" name="name" placeholder="您的姓名" class="quote-input" id="quote-name">
            </div>

            <div class="quote-input-wrap">
              <label for="quote-email">
                电子邮件
              </label>
              <input type="text" name="email" placeholder="您的电子邮件" class="quote-input" id="quote-email">
            </div>

            <div class="quote-input-wrap">
              <label for="quote-phone">
                电话
              </label>
              <input type="text" name="phone" placeholder="您的联系电话" class="quote-input" id="quote-phone">
            </div>

            <div class="quote-input-wrap">
              <label for="quote-company">
                公司名称
              </label>
              <input type="text" name="company" placeholder="公司名称" class="quote-input" id="quote-company">
            </div>

            <div class="quote-input-wrap">
              <label for="quote-message">
                说明信息
              </label>
              <textarea id="quote-message" class="quote-textarea" name="message" rows="8" cols="80" placeholder="请说明..."></textarea>
            </div>
          </form>
        </div>
    </div>
    <div id="submitTxt" data-txt="{{ session('lang')=='EN' ? 'Submit' : '提交' }}"></div>
    <div id="cancelTxt" data-txt="{{ session('lang')=='EN' ? 'Cancel' : '取消' }}"></div>
@stop

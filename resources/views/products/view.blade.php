@extends('layout_desktop')

@section('content')
    <div class="maincontent">
    <div class="maintext">
        @include('products.side_bar')
        <div class="rightpage">
            <div class="newscate">
                <ul>
                    <li class="cateposition">Your current location is：<a href="{{ url('/products') }}">Products</a> >
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
                            Part Number: {{ $product->Products_CodeName }}
                        </p>
                        <p class="general">
                            Description
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
                            PRODUCT FEATURES
                        </h4>
                        <ul>
                            <li class="txt cl">Package: {{ $product->Products_ExFlag1 }}</li>
                            <li class="txt cl">Data Rate: {{ $product->Products_ExFlag2 }}</li>
                            <li class="txt cl">Wavelength: {{ $product->Products_ExFlag3 }}</li>
                            <li class="txt cl">Component: {{ $product->Products_ExFlag4 }}</li>
                            <li class="txt cl">Output Power: {{ $product->Products_ExFlag5 }}</li>
                            <li class="txt cl">Rec. Sens: {{ $product->Products_ExFlag6 }}</li>
                            <li class="txt cl">Connector: {{ $product->Products_ExFlag7 }}</li>
                            <li class="txt cl">Case Temp.: {{ $product->Products_ExFlag8 }}</li>
                            <li class="txt cl">Reach: {{ $product->Products_ExFlag9 }}</li>
                            <li class="txt cl">Multi-rate: {{ $product->Products_ExFlag10 }}</li>
                        </ul>
                    </div>
                    <div class="application-wrap">
                        <h4>
                            APPLICATIONS
                        </h4>
                        <div class="applications-content">
                          {!! $product->Products_Feature !!}
                        </div>
                        <br>
                        <div class="download-btn">
                            <a href="{{ url('/download_brochure/'.$product->Products_ID) }}">
                                Download a Data Sheet
                            </a>
                        </div>
                        <div class="download-btn">
                            <a href="#" id="request-btn-trigger">
                                Request a Quote
                            </a>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="textcontentt mt40">
                </div>

                <div class="row mt40">
                    <div class="eye-diagram-wrap">
                        <h4>EYE DIAGRAM</h4>
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

                <div class="clearfix"></div>
                <div class="textcontentt mt40">
                </div>

                <div class="row mt40">
                    <div class="specification-wrap">
                        <h4>MECHANICAL SPECIFICATIONS</h4>
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
          <h3>Request A Quote For Product: {{ $product->Products_Title }} (Code: {{ $product->Products_CodeName }})</h3>
          <form method="POST" action="/quoto_request" id="request-quote-form">
            {{ csrf_field() }}
            <input type="hidden" name="code" value="{{ $product->Products_CodeName }}" id="quote-product-code">
            <div class="quote-input-wrap">
              <label for="quote-name">
                Name
              </label>
              <input type="text" name="name" placeholder="Your Name" class="quote-input" id="quote-name">
            </div>

            <div class="quote-input-wrap">
              <label for="quote-email">
                Email
              </label>
              <input type="text" name="email" placeholder="Your Email" class="quote-input" id="quote-email">
            </div>

            <div class="quote-input-wrap">
              <label for="quote-phone">
                Phone
              </label>
              <input type="text" name="phone" placeholder="Your Contact Number" class="quote-input" id="quote-phone">
            </div>

            <div class="quote-input-wrap">
              <label for="quote-company">
                Company
              </label>
              <input type="text" name="company" placeholder="Your Company" class="quote-input" id="quote-company">
            </div>

            <div class="quote-input-wrap">
              <label for="quote-message">
                Message
              </label>
              <textarea id="quote-message" class="quote-textarea" name="message" rows="8" cols="80" placeholder="Your message"></textarea>
            </div>

          </form>
        </div>
    </div>
    <div id="submitTxt" data-txt="{{ session('lang')=='EN' ? 'Submit' : '提交' }}"></div>
    <div id="cancelTxt" data-txt="{{ session('lang')=='EN' ? 'Cancel' : '取消' }}"></div>
@stop

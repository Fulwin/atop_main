<div class="leftpage">
    <div class="catemm">Products</div>
    <div style="text-align:center; margin:0 auto; width:100%;">
        <img src="{{ asset('/cate/producp.jpg') }}" width="21" height="10" />
    </div>
    <div id="DivList"  class="category_content">
        <style>
            .menu_1 a{  background:url('{{ asset('images/m1.jpg') }}') no-repeat left center; border-bottom:1px solid #e4e2e2; width:176px; height:30px; line-height:30px;padding-left:34px; text-decoration:none; color:#000000; font-weight:bold;  display:block;}
            .menu_1 a:hover{ background:url('{{ asset('images/m2.jpg') }}') no-repeat left center; width:176px; height:30px; line-height:30px;padding-left:34px; text-decoration:none; color:#ffffff; cursor:pointer;font-weight:bold; display:block;}
            .menu_1 .lefton{ background:url('{{ asset('images/m2.jpg') }}') no-repeat left center; width:176px; height:30px; line-height:30px;padding-left:34px; text-decoration:none; color:#ffffff; display:block;font-weight:bold; }

            .menu_2 a{ background:url('{{ asset('images/x3.jpg') }}') no-repeat 25px center; border-bottom:1px dashed #e4e2e2; height:24px; line-height:24px; padding-left:40px; color:#000000; text-decoration:none; display:block; }
            .menu_2 a:hover{background:url('{{ asset('images/x4.jpg') }}') no-repeat 25px center; border-bottom:1px dashed #e4e2e2; height:24px; line-height:24px; padding-left:40px; color:#A60100; text-decoration:none; display:block; cursor:pointer; }
            .menu_2 .eron{ background:url('{{ asset('images/x4.jpg') }}') no-repeat 25px center; border-bottom:1px dashed #e4e2e2; height:24px; line-height:24px; padding-left:40px; color:#A60100; text-decoration:none; display:block; cursor:pointer; }

            .menu3 a{ background-color:#CCCCCC;height:24px;}
            .menu_3 a:hover{ background-color:#FF0000;height:24px;}
        </style>
        <style type="text/css">

            .fly {
                font-size:14px;
                display:block;
                line-height:36px;
                height:36px;
                cursor:pointer;

                border-bottom:0px solid #fff;

                font-weight:bold;
                margin-top:15px;
            }

            .fly2 {
                display:block;
                line-height:36px;
                height:36px;
                padding:0 0 0 36px;
                cursor:pointer;
                background:url('{{ asset('images/left_b1.gif') }}') no-repeat;

            }
            .xiala {

                display:block;
                line-height:36px;
                height:36px;
                padding:0 0 0 36px;
                background:url('{{ asset('images/left_b1.gif') }}') no-repeat;

            }
            .xiala2 {

                display:block;
                line-height:36px;
                height:36px;
                padding:0 0 0 36px;
                background:url('{{ asset('images/left_b1.gif') }}') no-repeat;

            }
            .sanji {
                display:block;
                line-height:36px;
                height:36px;
                padding:0 0 0 36px;
                background:url('{{ asset('images/left_b1.gif') }}') no-repeat;
            }
            .sanjichage {

                display:block;
                line-height:36px;
                height:36px;
                padding:0 0 0 36px;

                background:url('{{ asset('images/left_b3.gif') }}') no-repeat;
            }
            .sanjichage2 {
                display:block;
                line-height:36px;
                height:36px;
                padding:0 0 0 36px;

                background:url('{{ asset('images/left_b3.gif') }}') no-repeat;

            }
            .za {
                background:url('{{ asset('images/left_b1.gif') }}') no-repeat;
            }
            .zb {
                background:url('{{ asset('images/left_b1.gif') }}') no-repeat;
            }
            .zc {
                background:url('{{ asset('images/left_b1.gif') }}') no-repeat;
            }
            .sel { color:#f78500!important; font-weight:bold;}
        </style>
        <ul class="ya">
            <?php
                $theIndex = 0;
            ?>
            @foreach($tree as $key=>$item)
                <li>
                    <?php
                        $category = $item['data'];
                    ?>
                    <a style="background: url('{{ asset('cate/65_11'.$theIndex.'.jpg') }}') left no-repeat #294162;"
                       href="{{ url('/products/'.$category->Cate_Id) }}" title="{{ $category->Cate_Title }}" id="aa90" class="fly">
                        {{ $category->Cate_Title }}
                    </a>
                    <ul style="" id="uu{{ $category->Cate_Id }}" abid="{{ $category->Cate_Id }}" class="yb">
                        <?php
                            $subs = $item['subs'];
                        ?>
                        @foreach($subs as $categoryId=>$subItem)
                            <li>
                                <a href="{{ url('/products/'.$categoryId) }}"
                                   title="{{ $subItem['data']->Cate_Title }}" id="bb{{$categoryId  }}" class="xiala">
                                    {{ $subItem['data']->Cate_Title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <?php
                    $theIndex++;
                ?>
            @endforeach
        </ul>
    </div>
</div>
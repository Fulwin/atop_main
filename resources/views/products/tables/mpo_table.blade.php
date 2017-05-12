@if(count($subs)>0)
    <div class="contenttext">
        <div style="width:100%; padding-bottom:20px;">
            {!! $category->Cate_Intro !!}
        </div>

        <style>
            .table-b table{border-right:1px solid #fff;border-bottom:1px solid #fff;background:#ddd;}
            .table-b table td{border-left:1px solid #fff;border-top:1px solid #fff}
            .table-c table{border-right:1px solid #fff;border-bottom:1px solid #fff;background:#eee;}
            .table-c table td{border-left:1px solid #fff;border-top:1px solid #fff; font-size:11px;}
            .table-c .mm {background:#ddd;}
        </style>

        @foreach($subs as $categoryId=>$item)
            <?php
            $category = $item['data'];
            $products = $category->products();
            ?>
            <a name="{{ $category->Cate_Title }}">
                <div style="float:left; width:150px; text-align:center; margin-top:10px; background:#e9720f; color:#fff;">{{ $category->Cate_Title }}</div>
            </a>
            <div style="float:left; width:100%; border-top:#e9720f solid 1px; margin-bottom:30px; padding-top:20px;">
                <div style="float:left; width:100%; " class="table-c">
                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tr class="mm">
                            <td align="center">产品编码</td>
                            <td align="center" class="mm">连接器类型</td>
                            <td align="center" class="mm">光纤类型</td>
                            <td align="center" class="mm">低插入损耗</td>
                            <td align="center" class="mm">标准插入损耗</td>
                            <td align="center" class="mm">回波损耗</td>
                            <td align="center" class="mm">接口类型</td>
                            <td align="center" class="mm">工作温度范围</td>
                            <td align="center" class="mm">光缆长度</td>
                            <td align="center" class="mm">下载</td>
                        </tr>

                        @if(count($products)==0)
                            Products coming soon...
                        @else
                            @foreach($products as $product)
                                <tr>
                                    <td align="center">
                                        <a href="{{ url('/product/view/'.$product->getIdString()) }}" style="text-decoration: underline;color: #294162;">
                                            {{ $product->Products_CodeName }}
                                        </a>
                                    </td>
                                    <td align="center">{{ $product->mpo_connector_type }}</td>
                                    <td align="center">{{ $product->mpo_fiber_type }}</td>
                                    <td align="center">{{ $product->mpo_low_il }}</td>
                                    <td align="center">{{ $product->mpo_high_il }}</td>
                                    <td align="center">{{ $product->mpo_return_loss }}</td>
                                    <td align="center">{{ $product->Products_ExFlag7 }}</td>
                                    <td align="center">{{ $product->Products_ExFlag8 }}</td>
                                    <td align="center">{{ $product->Products_ExFlag9 }}</td>
                                    <td align="center">
                                        <a href="{{ url('/download_brochure/'.$product->Products_ID) }}">
                                            <img src="{{ asset('mmm/pdficon.gif') }}" width="18" height="16" />
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </table>

                </div>
            </div>
        @endforeach
        <div style="clear:both"></div>
    </div>
@else
    <?php
    // 表示当前的目录没有下级目录了, 因此直接显示产品
    ?>
    <div class="contenttext">
        <div style="width:100%; padding-bottom:20px;">
            {!! $category->Cate_Intro !!}
        </div>

        <style>
            .table-b table{border-right:1px solid #fff;border-bottom:1px solid #fff;background:#ddd;}
            .table-b table td{border-left:1px solid #fff;border-top:1px solid #fff}
            .table-c table{border-right:1px solid #fff;border-bottom:1px solid #fff;background:#eee;}
            .table-c table td{border-left:1px solid #fff;border-top:1px solid #fff; font-size:11px;}
            .table-c .mm {background:#ddd;}
        </style>

        <div style="float:left; width:100%; margin-bottom:30px; padding-top:20px;">
            <div style="float:left; width:100%; " class="table-c">
                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                    <tr class="mm">
                        <td align="center">产品编码</td>
                        <td align="center" class="mm">连接器类型</td>
                        <td align="center" class="mm">光纤类型</td>
                        <td align="center" class="mm">低插入损耗</td>
                        <td align="center" class="mm">标准插入损耗</td>
                        <td align="center" class="mm">回波损耗</td>
                        <td align="center" class="mm">接口类型</td>
                        <td align="center" class="mm">工作温度范围</td>
                        <td align="center" class="mm">光缆长度</td>
                        <td align="center" class="mm">下载</td>
                    </tr>

                    @if(count($products)==0)
                        Products coming soon...
                    @else
                        @foreach($products as $product)
                            <tr>
                                <td align="center">
                                    <a href="{{ url('/product/view/'.$product->getIdString()) }}" style="text-decoration: underline;color: #294162;">
                                        {{ $product->Products_CodeName }}
                                    </a>
                                </td>
                                <td align="center">{{ $product->mpo_connector_type }}</td>
                                <td align="center">{{ $product->mpo_fiber_type }}</td>
                                <td align="center">{{ $product->mpo_low_il }}</td>
                                <td align="center">{{ $product->mpo_high_il }}</td>
                                <td align="center">{{ $product->mpo_return_loss }}</td>
                                <td align="center">{{ $product->Products_ExFlag7 }}</td>
                                <td align="center">{{ $product->Products_ExFlag8 }}</td>
                                <td align="center">{{ $product->Products_ExFlag9 }}</td>
                                <td align="center">
                                    <a href="{{ url('/download_brochure/'.$product->Products_ID) }}">
                                        <img src="{{ asset('mmm/pdficon.gif') }}" width="18" height="16" />
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </table>
            </div>
        </div>

        <div style="clear:both"></div>
    </div>
@endif
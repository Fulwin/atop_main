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
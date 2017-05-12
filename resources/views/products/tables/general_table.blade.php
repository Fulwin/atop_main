<table cellpadding="0" cellspacing="0" border="0" width="100%">
    <tr class="mm">
        <td align="center">产品编码</td>
        <td align="center" class="mm">封装</td>
        <td align="center" class="mm">传输速率</td>
        <td align="center" class="mm">波长</td>
        <td align="center" class="mm">光器件</td>
        <td align="center" class="mm">发光范围</td>
        <td align="center" class="mm">收端灵敏度</td>
        <td align="center" class="mm">接口</td>
        <td align="center" class="mm">温度</td>
        <td align="center" class="mm">传输距离</td>
        <td align="center" class="mm">多速率兼容</td>
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
                <td align="center">{{ $product->Products_ExFlag1 }}</td>
                <td align="center">{{ $product->Products_ExFlag2 }}</td>
                <td align="center">{{ $product->Products_ExFlag3 }}</td>
                <td align="center">{{ $product->Products_ExFlag4 }}</td>
                <td align="center">{{ $product->Products_ExFlag5 }}</td>
                <td align="center">{{ $product->Products_ExFlag6 }}</td>
                <td align="center">{{ $product->Products_ExFlag7 }}</td>
                <td align="center">{{ $product->Products_ExFlag8 }}</td>
                <td align="center">{{ $product->Products_ExFlag9 }}</td>
                <td align="center">{{ $product->Products_ExFlag10 }}</td>
                <td align="center">
                    <a href="{{ url('/download_brochure/'.$product->Products_ID) }}">
                        <img src="{{ asset('mmm/pdficon.gif') }}" width="18" height="16" />
                    </a>
                </td>
            </tr>
        @endforeach
    @endif
</table>
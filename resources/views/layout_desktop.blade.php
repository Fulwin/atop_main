@include('reusable_elements.desktop.head')

@include('reusable_elements.desktop.top')
@if($isHome)
        @include('reusable_elements.desktop.slide')
@endif
@if(isset($isNews) && $isNews)
        @include('reusable_elements.desktop.banner')
@endif

@if(isset($isProducts) && $isProducts)
        @include('products.banner')
@endif


@yield('content')

@include('reusable_elements.desktop.foot')
@include('reusable_elements.desktop.js')
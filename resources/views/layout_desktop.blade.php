@include('reusable_elements.desktop.head')

@include('reusable_elements.desktop.top')
@if($isHome)
        @include('reusable_elements.desktop.slide')
@else
        @include('reusable_elements.desktop.banner')
@endif

<div class="maincontent">
        @yield('content')
</div>

@include('reusable_elements.desktop.foot')
@include('reusable_elements.desktop.js')
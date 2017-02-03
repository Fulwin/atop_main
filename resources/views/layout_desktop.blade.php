@include('reusable_elements.desktop.head')

@include('reusable_elements.desktop.top')
@include('reusable_elements.desktop.slide')


<div class="maincontent">
        @yield('content')
</div>

@include('reusable_elements.desktop.foot')
@include('reusable_elements.desktop.js')
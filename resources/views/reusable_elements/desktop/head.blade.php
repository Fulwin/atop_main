<html class="no-js css-menubar" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="{{ isset($seo) ? $seo['description'] : $site->description }}">
    <meta name="author" content="{{ $site->author }}">
    <meta name="keywords" content="{{ isset($seo) ? $seo['keywords'] : $site->keyword }}">
    <meta name="csrf-token" content="{!! csrf_token() !!}">
    <title>{{ isset($seo) ? ($seo['title']) : $site->title }}</title>

    <link rel="stylesheet" href="{{ url('jQuery/sexylightbox.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ url('style/cn.css') }}" type="text/css" media="screen, project, print">
    <link rel="stylesheet" href="{{ url('css/unslider.css') }}">
    <link rel="stylesheet" href="{{ url('css/unslider-dots.css') }}">
    <link rel="stylesheet" href="{{ url('css/css.css') }}?version=2">
    <link rel="stylesheet" href="{{ url('css/megafish.css') }}?version=2">
    <link rel="stylesheet" href="{{ url('css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/tingle.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/atop_icons.css') }}">
    <link rel="stylesheet" href="{{ url('css/fix.css') }}?version=3">

    <script src="{{ asset('scripts/swfobject.js') }}" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>

    @if(true || session('lang') == 'CN')
        <link rel="stylesheet" href="http://apps.bdimg.com/libs/fontawesome/4.4.0/css/font-awesome.min.css">
    @else
        <script src="https://use.fontawesome.com/b09516297f.js"></script>
    @endif

    {{-- Super fish --}}
    <script src="{{ asset('js/hoverIntent.js') }}"></script>
    <script src="{{ asset('js/superfish.min.js') }}"></script>
    {{-- Super fish end --}}

    <script src="{{ asset('scripts/unslider-min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.SuperSlide.2.1.1.js') }}"></script>
    <script src="{{ asset('scripts/AC_RunActiveContent.js') }}" type="text/javascript"></script>

    <script src="{{ asset('scripts/jqueryslidemenu.js') }}" type="text/javascript"></script>
    <script src="{{ asset('scripts/MSClass.js') }}" type="text/javascript"></script>
    <script src="{{ asset('images/swfobject.js') }}" type="text/javascript"></script>
    <script src="{{ asset('sysaspx/common.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('jQuery/mootools-yui-compressed.js') }}"></script>
    <script type="text/javascript" src="{{ asset('jQuery/sexylightbox.v2.3.mootools.min.js') }}"></script>
    <script type="text/javascript">
        window.addEvent('domready', function(){
            SexyLightbox = new SexyLightBox({color:'white'});
        });
    </script>
    {{-- <script type="text/javascript" src="{{ url('js/cn.js') }}"></script> --}}
    <script type=text/javascript src="{{ url('images/scroll.js') }}"></script>
    <script type=text/javascript src="{{ url('js/tingle.min.js') }}"></script>
    <script type=text/javascript src="{{ url('js/utils.js') }}?version=1"></script>
</head>
<?php

?>
<body {!! isset($Microdata)  ? ('itemscope itemtype="'.$Microdata['type'].'"') : null !!}>

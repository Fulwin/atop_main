<html class="no-js css-menubar" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="{{ isset($seo) ? $seo['description'] : $site->description }}">
    <meta name="author" content="{{ $site->author }}">
    <meta name="keywords" content="{{ isset($seo) ? $seo['keywords'] : $site->keyword }}">
    <title>{{ isset($seo) ? ($seo['title'].' - '.$site->title) : $site->title }}</title>

    <link rel="stylesheet" href="{{ url('jQuery/sexylightbox.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ url('style/cn.css') }}" type="text/css" media="screen, project, print">
    <link rel="stylesheet" href="{{ url('css/unslider.css') }}">
    <link rel="stylesheet" href="{{ url('css/unslider-dots.css') }}">
    <link rel="stylesheet" href="{{ url('css/css.css') }}">
    <link rel="stylesheet" href="{{ url('css/megafish.css') }}">
    <link rel="stylesheet" href="{{ url('css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/fix.css') }}">

    <script src="{{ asset('scripts/swfobject.js') }}" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>

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
    <script type="text/javascript" src="{{ url('js/cn.js') }}"></script>
    <script type=text/javascript src="{{ url('images/scroll.js') }}"></script>
</head>
<body>

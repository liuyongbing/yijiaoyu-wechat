<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,minimum=1,user-scalable=no">
<meta name="format-detection" content="telephone=no, email=no">
<meta name="full-screen" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes" />
<!-- uc强制竖屏 -->
<meta name="screen-orientation" content="portrait">

<!-- UC强制全屏 -->
<meta name="full-screen" content="yes">

<!-- UC应用模式 -->
<meta name="browsermode" content="application">

<!-- QQ强制竖屏 -->
<meta name="x5-orientation" content="portrait">

<!-- QQ强制全屏 -->
<meta name="x5-fullscreen" content="true">

<!-- QQ应用模式 -->
<meta name="x5-page-mode" content="app">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset(elixir('css/base.css')) }}{{ $STATIC_VERSION }}" />
    @yield('style')
</head>

<body>
@include('layouts.header')

@yield('content')

@include('layouts.footer')
</body>
<script type="text/javascript" src="{{ asset(elixir('util/zepto.min.js')) }}{{ $STATIC_VERSION }}"></script>
<script type="text/javascript" src="{{ asset(elixir('util/zepto.fx.js')) }}{{ $STATIC_VERSION }}"></script>
<script type="text/javascript" src="{{ asset(elixir('util/zepto.fxmethods.js')) }}{{ $STATIC_VERSION }}"></script>
<script type="text/javascript" src="{{ asset(elixir('util/zepto.event.js')) }}{{ $STATIC_VERSION }}"></script>
<script type="text/javascript" src="{{ asset(elixir('util/zepto.touch.js')) }}{{ $STATIC_VERSION }}"></script>
<script type="text/javascript" src="{{ asset(elixir('util/flexible.js')) }}{{ $STATIC_VERSION }}"></script>
<script type="text/javascript" src="{{ asset(elixir('js/index.js')) }}{{ $STATIC_VERSION }}"></script>

@yield('script')
</html>
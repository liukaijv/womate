<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="{{$settings['site_keywords']}}">
    <meta name="description" content="{{$settings['site_description']}}">
    <title>{{$settings['site_title']}}@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/main.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/revolution-slider.css')}}"/>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{asset('js/jquery.themepunch.revolution.min.js')}}"></script>
    <script src="{{asset('js/parallax.js')}}"></script>
    <script src="{{asset('js/jquery.form.js')}}"></script>
    <script src="{{asset('js/jquery.lazyload.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>

</head>
<body>

@include('partials.header')

@yield('content')

@include('partials.footer')

@yield('footer')

<script>
    var _hmt = _hmt || [];
    (function () {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?8c76ce40387c4d2d777838e943ac848d";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
</body>
</html>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$site_title}} | @yield('title')</title>

    @include('backend.partials.asset')

    @yield('header')
</head>
<body>

<div id="wrapper">

    @include('backend.partials.sidebar')

    <div id="page-wrapper" class="gray-bg">

        @include('backend.partials.top')

        @include('backend.partials.flush')

        @yield('content')

        {{--@include('backend.partials.footer')--}}

    </div>

</div>

@yield('footer')
</body>
</html>
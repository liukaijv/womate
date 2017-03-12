<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{config('backend.site_title')}}</title>
    @yield('header')
</head>
<body class="hold-transition skin-blue sidebar-mini">

@include('backend.partials.header')

@include('backend.partials.sidebar')

<div class="content-wrapper">
    @include('backend.partials.info')
    @yield('content')
</div>

@include('backend.partials.footer')

@yield('footer')
</body>
</html>
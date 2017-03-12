<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{$site_title}} | @yield('title')</title>

    @include('backend.partials.asset')

</head>

<body class="gray-bg">

<div class="middle-box text-center animated fadeInDown">
    <div>
        <div>
            <h1 class="logo-name">wo</h1>
        </div>

        @include('backend.partials.flush')

        @include('backend.partials.errors')

        @yield('content')

    </div>
</div>

</body>

</html>

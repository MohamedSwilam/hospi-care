<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') {{ config('app.name', 'Medica Lab') }}</title>

    <link rel="icon" href="/images/logo/hospi-care-icon.png">

    <!-- Fonts -->

    <!-- Styles -->
    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons -->
    <link href="/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
    <!-- Icons -->
    <link href="/css/magnific-popup.css" rel="stylesheet" type="text/css" />
    <!-- Slider -->
    <link rel="stylesheet" href="/css/tiny-slider.css"/>
    <!-- Animation -->
    <link href="/css/animate.css" rel="stylesheet" />
    <link href="/css/animations-delay.css" rel="stylesheet" />
    <!-- Main Css -->
    <link href="/css/style.css" rel="stylesheet" type="text/css" id="theme-opt" />
    <link href="/css/colors/default.css" rel="stylesheet" id="color-opt">
{{--    <link href="/css/app.css" rel="stylesheet">--}}

</head>
<body>
    <div id="app">
        <!-- Loader -->
{{--        @include('partials.loader')--}}

        <!-- HEADER NAVBAR -->
        @include('partials.navbar')

        <!-- PAGE CONTENT -->
        <div class="page-wrappers">

            @yield('content')

            <!-- FOOTER -->
            @include('partials.footer')

            <!-- Back to top -->
                <a href="#" onclick="topFunction()" id="back-to-top" class="btn btn-icon btn-primary back-to-top"><i data-feather="arrow-up" class="icons"></i></a>
            <!-- Back to top -->
        </div>
    </div>

    <!-- javascript -->
    <script src="/js/bootstrap.bundle.min.js"></script>
    <!-- SLIDER -->
    <script src="/js/tiny-slider.js "></script>
    <script src="/js/tiny-slider-init.js "></script>
    <!-- Icons -->
    <script src="/js/feather.min.js"></script>
    <!-- Main Js -->
    <script src="/js/main.js"></script>

    @yield('extra-js')
</body>
</html>

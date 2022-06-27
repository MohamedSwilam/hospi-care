<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Medica Lab') }}</title>

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
    <link href="/css/app.css" rel="stylesheet">

</head>
<body>
<div id="app">
    <!-- MAINTENANCE PAGE -->
    <section class="bg-home d-flex align-items-center" data-jarallax='{"speed": 0.5}' style="background-image: url('images/Cover.jpg');">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12 text-center">
                    <a href="javascript:void(0)" class="logo h5 mb-10"><img src="/images/logo/hospi-care-logo-white.png" height="70" alt=""></a>
{{--                    <div class="text-uppercase text-white title-dark mt-2 mb-4 maintenance">COMMING SOON</div>--}}
{{--                    <p class="text-white-50 para-desc mx-auto para-dark">Perfect and awesome template to present your future product or service. Hooking audience attention is all in the opener.</p>--}}
                </div>
            </div>

{{--            <div class="row">--}}
{{--                <div class="col-md-12 text-center" style="margin-top: 75px;">--}}
{{--                    <div class="text-center">--}}
{{--                        <span id="maintenance" class="timer">COMING SOON</span></span>--}}
{{--                        <!-- <div id="maintenance" class="mb-4 overflow-hidden text-center"></div> -->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="row mt-5">
                @foreach($sites as $site)
                    <div class="col-lg-6 col-md-6 mt-4 pt-2">
                        <div class="card rounded border-0" style="background-color: transparent;">
                            <div class="position-relative" style="text-align: center;">
                                <a href="{{route('home')}}">
                                    <img style="max-width: 350px;max-height: 235px;width: auto;height: auto;border-radius: 15px !important;" src="https://hospicare.medica-lab.com{{$site['photo']['url']}}" class="card-img-top rounded-top" alt="...">
                                </a>
                                <div class="overlay rounded-top bg-dark"></div>
                            </div>
                            <div class="card-body content" style="text-align: center;width: 100%;">
{{--                                <h3><a href="{{route('home')}}" style="color: white;" class="">{{ $site['name'] }}</a></h3>--}}
                                <a href="{{route('home')}}" class="btn btn-pills btn-primary"><i class="mdi mdi-eye"></i> View {{ $site['name'] }} Site</a>
                            </div>
                        </div>
                    </div><!--end col-->
                @endforeach
            </div><!--end container-->
        </div> <!-- end container -->
    </section><!--end section-->
    <!-- MAINTENANCE PAGE -->
</div>

<!-- javascript -->
<script src="js/bootstrap.bundle.min.js"></script>
<!-- maintenance -->
{{--<script src="js/maintenance.init.js"></script>--}}
<!-- Icons -->
<script src="js/feather.min.js"></script>
<!-- Main Js -->
<script src="/js/main.js"></script>

@yield('extra-js')
</body>
</html>

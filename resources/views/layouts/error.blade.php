<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>404 | {{ config('app.name', 'Medica Lab') }}</title>

    <link rel="icon" href="/images/logo/hospi-care-icon.png">

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons -->
    <link href="/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.3/css/line.css">
    <!-- Main Css -->
    <link href="/css/style.css" rel="stylesheet" type="text/css" id="theme-opt" />
    <link href="/css/colors/default.css" rel="stylesheet" id="color-opt">

</head>
<body>
    <div class="back-to-home rounded d-none d-sm-block">
        <a href="{{route('home', $site)}}" class="btn btn-icon btn-soft-primary"><i data-feather="home" class="icons"></i></a>
    </div>

    <!-- ERROR PAGE -->
    <section class="bg-home d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12 text-center">
                    <img src="/images/404.svg" class="img-fluid" alt="">
                    <div class="text-uppercase display-3">Oh ! no</div>
                    <div class="text-capitalize text-dark mb-4 error-page">Page Not Found</div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-outline-primary">Go Back</a>
                    <a href="{{route('home', $site)}}" class="btn btn-primary ml-2">Go To Home</a>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- ERROR PAGE -->


    <!-- javascript -->
    <script src="/js/jquery-3.5.1.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/jquery.easing.min.js"></script>
    <script src="/js/scrollspy.min.js"></script>
    <!-- Icons -->
    <script src="/js/feather.min.js"></script>
    <script src="https://unicons.iconscout.com/release/v3.0.3/script/monochrome/bundle.js"></script>
    <!-- Main Js -->
    <script src="/js/main.js"></script>

</body>
</html>

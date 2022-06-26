@extends('layouts.website')

@section('title') About Us |  @endsection

@section('content')
    <!-- Hero Start -->
    <section class="bg-half d-table w-100" style="background: url('/images/company/aboutus.jpg');background-attachment: fixed;">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="page-next-level title-heading">
                        <h1 class="text-white title-dark"> About Us </h1>
                        <div class="page-next">
                            <nav aria-label="breadcrumb" class="d-inline-block">
                                <ul class="breadcrumb bg-white rounded shadow mb-0">
                                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">About Us</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div> <!--end container-->
    </section><!--end section-->
    <div class="position-relative">
        <div class="shape overflow-hidden text-white">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <!-- Hero End -->

    <section class="section">
        <div class="container">
            <div class="row align-items-center" id="counter">
                <div class="col-md-6">
                    <img src="/images/logo/hospi-care-logo-colored.png" style="max-width: 400px;" class="img-fluid" alt="">
                </div><!--end col-->

                <div class="col-md-6 mt-4 pt-2 mt-sm-0 pt-sm-0">
                    <div class="ms-lg-4">
                        <div class="d-flex mb-4">
                            <span class="text-primary h1 mb-0"><span class="counter-value display-1 fw-bold" data-target="10">0</span>+</span>
                            <span class="h6 align-self-end ms-2">Years <br> Experience</span>
                        </div>
                        <div class="section-title">
                            <h4 class="title mb-4">Who we are ?</h4>
                            <p class="text-muted">{{$site['about']}}</p>
                            <a href="{{route('contact')}}" class="btn btn-primary mt-3">Contact us</a>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

{{--        <div class="container mt-4">--}}
{{--            <div class="row justify-content-center">--}}
{{--                <div class="col-lg-2 col-md-2 col-6 text-center pt-4">--}}
{{--                    <img src="/images/client/amazon.svg" class="avatar avatar-ex-sm" alt="">--}}
{{--                </div><!--end col-->--}}

{{--                <div class="col-lg-2 col-md-2 col-6 text-center pt-4">--}}
{{--                    <img src="/images/client/google.svg" class="avatar avatar-ex-sm" alt="">--}}
{{--                </div><!--end col-->--}}

{{--                <div class="col-lg-2 col-md-2 col-6 text-center pt-4">--}}
{{--                    <img src="/images/client/lenovo.svg" class="avatar avatar-ex-sm" alt="">--}}
{{--                </div><!--end col-->--}}

{{--                <div class="col-lg-2 col-md-2 col-6 text-center pt-4">--}}
{{--                    <img src="/images/client/paypal.svg" class="avatar avatar-ex-sm" alt="">--}}
{{--                </div><!--end col-->--}}

{{--                <div class="col-lg-2 col-md-2 col-6 text-center pt-4">--}}
{{--                    <img src="/images/client/shopify.svg" class="avatar avatar-ex-sm" alt="">--}}
{{--                </div><!--end col-->--}}

{{--                <div class="col-lg-2 col-md-2 col-6 text-center pt-4">--}}
{{--                    <img src="/images/client/spotify.svg" class="avatar avatar-ex-sm" alt="">--}}
{{--                </div><!--end col-->--}}
{{--            </div><!--end row-->--}}
{{--        </div><!--end container-->--}}
    </section><!--end section-->

{{--    <section class="section bg-light">--}}
{{--        <div class="container">--}}
{{--            <div class="row justify-content-center">--}}
{{--                <div class="col-12">--}}
{{--                    <div class="section-title text-center mb-4 pb-2">--}}
{{--                        <h6 class="text-primary">Work Process</h6>--}}
{{--                        <h4 class="title mb-4">How do we works ?</h4>--}}
{{--                        <p class="text-muted para-desc mx-auto mb-0">Start working with <span class="text-primary font-weight-bold">Landrick</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>--}}
{{--                    </div>--}}
{{--                </div><!--end col-->--}}
{{--            </div><!--end row-->--}}

{{--            <div class="row">--}}
{{--                <div class="col-md-4 mt-4 pt-2">--}}
{{--                    <div class="card features feature-clean work-process bg-transparent process-arrow border-0 text-center">--}}
{{--                        <div class="icons text-primary text-center mx-auto">--}}
{{--                            <i class="uil uil-presentation-edit d-block rounded h3 mb-0"></i>--}}
{{--                        </div>--}}

{{--                        <div class="card-body">--}}
{{--                            <h5 class="text-dark">Discussion</h5>--}}
{{--                            <p class="text-muted mb-0">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div><!--end col-->--}}

{{--                <div class="col-md-4 mt-md-5 pt-md-3 mt-4 pt-2">--}}
{{--                    <div class="card features feature-clean work-process bg-transparent process-arrow border-0 text-center">--}}
{{--                        <div class="icons text-primary text-center mx-auto">--}}
{{--                            <i class="uil uil-airplay d-block rounded h3 mb-0"></i>--}}
{{--                        </div>--}}

{{--                        <div class="card-body">--}}
{{--                            <h5 class="text-dark">Strategy & Testing</h5>--}}
{{--                            <p class="text-muted mb-0">Generators convallis odio, vel pharetra quam malesuada vel. Nam porttitor malesuada.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div><!--end col-->--}}

{{--                <div class="col-md-4 mt-md-5 pt-md-5 mt-4 pt-2">--}}
{{--                    <div class="card features feature-clean work-process bg-transparent d-none-arrow border-0 text-center">--}}
{{--                        <div class="icons text-primary text-center mx-auto">--}}
{{--                            <i class="uil uil-image-check d-block rounded h3 mb-0"></i>--}}
{{--                        </div>--}}

{{--                        <div class="card-body">--}}
{{--                            <h5 class="text-dark">Reporting</h5>--}}
{{--                            <p class="text-muted mb-0">Internet Proin tempus odio, vel pharetra quam malesuada vel. Nam porttitor malesuada.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div><!--end col-->--}}
{{--            </div><!--end row-->--}}
{{--        </div><!--end container-->--}}

{{--        <div class="container mt-100 mt-60">--}}
{{--            <div class="row align-items-end mb-4 pb-4">--}}
{{--                <div class="col-md-8">--}}
{{--                    <div class="section-title text-center text-md-start">--}}
{{--                        <h6 class="text-primary">Services</h6>--}}
{{--                        <h4 class="title mb-4">What we do ?</h4>--}}
{{--                        <p class="text-muted mb-0 para-desc">Start working with <span class="text-primary fw-bold">Landrick</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>--}}
{{--                    </div>--}}
{{--                </div><!--end col-->--}}

{{--                <div class="col-md-4 mt-4 mt-sm-0">--}}
{{--                    <div class="text-center text-md-end">--}}
{{--                        <a href="javascript:void(0)" class="text-primary h6">See More <i class="uil uil-angle-right-b align-middle"></i></a>--}}
{{--                    </div>--}}
{{--                </div><!--end col-->--}}
{{--            </div><!--end row-->--}}

{{--            <div class="row">--}}
{{--                <div class="col-md-4 mt-4 pt-2">--}}
{{--                    <ul class="nav nav-pills nav-justified flex-column bg-white rounded shadow p-3 mb-0 sticky-bar" id="pills-tab" role="tablist">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link rounded active" id="webdeveloping" data-bs-toggle="pill" href="#developing" role="tab" aria-controls="developing" aria-selected="false">--}}
{{--                                <div class="text-center py-1">--}}
{{--                                    <h6 class="mb-0">Web Developing</h6>--}}
{{--                                </div>--}}
{{--                            </a><!--end nav link-->--}}
{{--                        </li><!--end nav item-->--}}

{{--                        <li class="nav-item mt-2">--}}
{{--                            <a class="nav-link rounded" id="database" data-bs-toggle="pill" href="#data-analise" role="tab" aria-controls="data-analise" aria-selected="false">--}}
{{--                                <div class="text-center py-1">--}}
{{--                                    <h6 class="mb-0">Database Analysis</h6>--}}
{{--                                </div>--}}
{{--                            </a><!--end nav link-->--}}
{{--                        </li><!--end nav item-->--}}

{{--                        <li class="nav-item mt-2">--}}
{{--                            <a class="nav-link rounded" id="server" data-bs-toggle="pill" href="#security" role="tab" aria-controls="security" aria-selected="false">--}}
{{--                                <div class="text-center py-1">--}}
{{--                                    <h6 class="mb-0">Server Security</h6>--}}
{{--                                </div>--}}
{{--                            </a><!--end nav link-->--}}
{{--                        </li><!--end nav item-->--}}

{{--                        <li class="nav-item mt-2">--}}
{{--                            <a class="nav-link rounded" id="webdesigning" data-bs-toggle="pill" href="#designing" role="tab" aria-controls="designing" aria-selected="false">--}}
{{--                                <div class="text-center py-1">--}}
{{--                                    <h6 class="mb-0">Web Designing</h6>--}}
{{--                                </div>--}}
{{--                            </a><!--end nav link-->--}}
{{--                        </li><!--end nav item-->--}}
{{--                    </ul><!--end nav pills-->--}}
{{--                </div><!--end col-->--}}

{{--                <div class="col-md-8 col-12 mt-4 pt-2">--}}
{{--                    <div class="tab-content" id="pills-tabContent">--}}
{{--                        <div class="tab-pane fade bg-white show active p-4 rounded shadow" id="developing" role="tabpanel" aria-labelledby="webdeveloping">--}}
{{--                            <img src="/images/work/7.jpg" class="img-fluid rounded shadow" alt="">--}}
{{--                            <div class="mt-4">--}}
{{--                                <p class="text-muted">This is required when, for example, the final text is not yet available. Dummy text is also known as 'fill text'. It is said that song composers of the past used dummy texts as lyrics.</p>--}}
{{--                                <a href="javascript:void(0)" class="text-primary">See More <i class="uil uil-angle-right-b align-middle"></i></a>--}}
{{--                            </div>--}}
{{--                        </div><!--end teb pane-->--}}

{{--                        <div class="tab-pane fade bg-white p-4 rounded shadow" id="data-analise" role="tabpanel" aria-labelledby="database">--}}
{{--                            <img src="/images/work/8.jpg" class="img-fluid rounded shadow" alt="">--}}
{{--                            <div class="mt-4">--}}
{{--                                <p class="text-muted">This is required when, for example, the final text is not yet available. Dummy text is also known as 'fill text'. It is said that song composers of the past used dummy texts as lyrics.</p>--}}
{{--                                <a href="javascript:void(0)" class="text-primary">See More <i class="uil uil-angle-right-b align-middle"></i></a>--}}
{{--                            </div>--}}
{{--                        </div><!--end teb pane-->--}}

{{--                        <div class="tab-pane fade bg-white p-4 rounded shadow" id="security" role="tabpanel" aria-labelledby="server">--}}
{{--                            <img src="/images/work/9.jpg" class="img-fluid rounded shadow" alt="">--}}
{{--                            <div class="mt-4">--}}
{{--                                <p class="text-muted">This is required when, for example, the final text is not yet available. Dummy text is also known as 'fill text'. It is said that song composers of the past used dummy texts as lyrics.</p>--}}
{{--                                <a href="javascript:void(0)" class="text-primary">See More <i class="uil uil-angle-right-b align-middle"></i></a>--}}
{{--                            </div>--}}
{{--                        </div><!--end teb pane-->--}}

{{--                        <div class="tab-pane fade bg-white p-4 rounded shadow" id="designing" role="tabpanel" aria-labelledby="webdesigning">--}}
{{--                            <img src="/images/work/12.jpg" class="img-fluid rounded shadow" alt="">--}}
{{--                            <div class="mt-4">--}}
{{--                                <p class="text-muted">This is required when, for example, the final text is not yet available. Dummy text is also known as 'fill text'. It is said that song composers of the past used dummy texts as lyrics.</p>--}}
{{--                                <a href="javascript:void(0)" class="text-primary">See More <i class="uil uil-angle-right-b align-middle"></i></a>--}}
{{--                            </div>--}}
{{--                        </div><!--end teb pane-->--}}
{{--                    </div><!--end tab content-->--}}
{{--                </div><!--end col-->--}}
{{--            </div><!--end row-->--}}
{{--        </div><!--end container-->--}}
{{--    </section><!--end section-->--}}

{{--    <!-- Start -->--}}
{{--    <section class="section bg-light pt-0">--}}
{{--        <div class="container">--}}
{{--            <div class="row justify-content-center">--}}
{{--                <div class="col-12 text-center">--}}
{{--                    <div class="video-solution-cta position-relative" style="z-index: 1;">--}}
{{--                        <div class="position-relative">--}}
{{--                            <img src="/images/cta-bg.jpg" class="img-fluid rounded-md shadow-lg" alt="">--}}
{{--                            <div class="play-icon">--}}
{{--                                <a href="https://www.youtube.com/watch?v=jNTZpfXYJa4" class="play-btn video-play-icon">--}}
{{--                                    <i class="mdi mdi-play text-primary rounded-circle bg-white shadow-lg"></i>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="content mt-md-4 pt-md-2">--}}
{{--                            <div class="row justify-content-center">--}}
{{--                                <div class="col-lg-10 text-center">--}}
{{--                                    <div class="row align-items-center">--}}
{{--                                        <div class="col-md-6 mt-4 pt-2">--}}
{{--                                            <div class="section-title text-md-left">--}}
{{--                                                <h6 class="text-white-50">Team</h6>--}}
{{--                                                <h4 class="title text-white title-dark mb-0">Meet Experience <br> Team Member</h4>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="col-md-6 col-12 mt-4 pt-md-2">--}}
{{--                                            <div class="section-title text-md-left">--}}
{{--                                                <p class="text-white-50 para-desc">Start working with Landrick that can provide everything you need to generate awareness, drive traffic, connect.</p>--}}
{{--                                                <a href="javascript:void(0)" class="text-white title-dark">Read More <i data-feather="arrow-right" class="fea icon-sm"></i></a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div><!--end col-->--}}
{{--            </div><!--end row -->--}}
{{--            <div class="feature-posts-placeholder bg-primary"></div>--}}
{{--        </div><!--end container-->--}}
{{--    </section><!--end section-->--}}
{{--    <!-- End -->--}}
@endsection

@section('extra-js')
    <!-- Counter -->
    <script src="/js/counter.init.js "></script>
@endsection

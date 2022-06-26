@extends('layouts.website')

@section('title') Home |  @endsection

@section('content')
{{--    {{die(json_encode($testimonials))}}--}}
    <section class="home-slider position-relative">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @for($i = 0; $i< count($site['sliders']); $i++)
                    <div class="carousel-item {{$i == 0 ? 'active' : ''}}" data-bs-interval="3000">
                        <div class="bg-home d-flex align-items-center" style="background: url({{$site['sliders'][$i]['photo']['url']}}) center center;">
                            <div class="bg-overlay"></div>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-12 text-center">
                                        <div class="title-heading mt-4">
                                            <h1 class="heading mb-3 text-white title-dark animated fadeInUpBig animation-delay-3">{{$site['sliders'][$i]['main_title_en']}}</h1>
                                            <p class="para-desc text-light para-dark mx-auto animated fadeInUpBig animation-delay-7">Your satisfaction is our ultimate goal, start working with Medica-lab and experience the guaranteed quality and service.</p>
                                            <div class="mt-4 pt-2 animated fadeInUpBig animation-delay-11">
                                                @if($site['sliders'][$i]['button_url'] != null && $site['sliders'][$i]['button_url'] != '' && $site['sliders'][$i]['button_url'] != 'null')
                                                    <a href="{{$site['sliders'][$i]['button_url']}}" class="btn btn-primary mt-2"><i class="uil uil-star"></i> Explore</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div><!--end container-->
                        </div><!--end slide-->
                    </div>
                @endfor
            </div>
            <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
            <div class="mouse-wrapper">
                <div class="mouse">
                    <div class="mouse-scroll"></div>
                </div>
            </div>
        </div>
    </section><!--end section-->
    <!-- Hero End -->

    <!-- About Start -->
    <section class="section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-6 col-12">
                    <img src="/images/logo/hospi-care-logo-colored.png" style="max-width: 350px;" class="img-fluid rounded" alt="">
                </div><!--end col-->

                <div class="col-lg-7 col-md-6 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="section-title ml-lg-4">
                        <h4 class="title mb-4">About Our Community</h4>
                        <p class="text-muted">
                            {{$site['about']}}
                        </p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--enc container-->
    </section><!--end section-->
    <!-- About End -->

    <!-- Start Client And Blog -->
    <section class="section bg-light">
        <!-- Start Client -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title mb-4 pb-2">
                        <h4 class="title mb-4">Clients' Feedback</h4>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row justify-content-center">
                <div class="col-lg-12 mt-4">
                    <div class="tiny-three-item">
                        @foreach($testimonials as $testimonial)
                            <div class="tiny-slide">
                                <div class="d-flex client-testi m-2">
                                    <img src="{{$testimonial['photo']['url']}}" class="avatar avatar-small client-image rounded shadow" alt="">
                                    <div class="flex-1 content p-3 shadow rounded bg-white position-relative">
                                        <p class="text-muted mt-2">{{ app()->getLocale() == 'en' ? $testimonial['feedback_en'] : $testimonial['feedback_fr'] }}</p>
                                        <h6 class="text-primary">- {{$testimonial['client_name']}}</h6>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
        <!-- End Client -->
    </section><!--end section-->
    <!-- End Client And Blog -->

    <!-- CTA START -->
    <section class="section">
        <!-- Start Categories -->
        <div class="container mt-60">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title mb-4 pb-2">
                        <h4 class="title mb-4">Top Products' Categories</h4>
                    </div>
                </div><!--end col-->
            </div><!--end row-->



            <div class="row">
                @foreach($categories as $category)
                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                        <div class="card blog rounded border-0 shadow">
                            <div class="position-relative" style="text-align: center;">
                                <img src="{{$category['photo']['url']}}" class="card-img-top rounded-top" alt="..." style="max-width: 100%;max-height: 250px;width: auto;height: auto;">
                                <div class="overlay rounded-top bg-dark"></div>
                            </div>
                            <div class="card-body content" style="text-align: center;width: 100%;">
                                <h5 style="text-align: center;width: 100%;"><a href="/categories/{{$category['id']}}" class="card-title title text-dark">{{app()->getLocale() == 'en' ? $category['name_en'] : $category['name_fr'] }}</a></h5>
                                    <a href="/categories/{{$category['id']}}" class="btn btn-pills btn-primary btn-sm"><i class="mdi mdi-eye"></i> View Category</a>
                            </div>
                        </div>
                    </div><!--end col-->
                @endforeach
            </div><!--end container-->
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <a href="{{route('categories')}}" class="btn btn-pills btn-primary mt-5"><i class="mdi mdi-eye"></i> View All Categories</a>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
        <!-- End Categories -->
    </section><!--end section-->
    <!-- CTA END -->

    <!-- Start Client And Blog -->
    <section class="section bg-light">
        <!-- Start Blog -->
        <div class="container mt-60">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title mb-4 pb-2">
                        <h4 class="title mb-4">Latest News</h4>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                @foreach($news as $blog)
                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                        <div class="card blog rounded border-0 shadow">
                            <div class="position-relative" style="text-align: center;">
                                <img src="{{$blog['photo']['url']}}" class="card-img-top rounded-top" alt="..." style="width: auto;height: auto;max-width: 100%;max-height: 250px;">
                                <div class="overlay rounded-top bg-dark"></div>
                            </div>
                            <div class="card-body content">
                                <h5><a href="/news/{{$blog['id']}}" class="card-title title text-dark">{{app()->getLocale() == 'en' ? $blog['title_en'] : $blog['title_fr'] }}</a></h5>
                                <div class="post-meta d-flex justify-content-between mt-3">
                                    <a href="/news/{{$blog['id']}}" class="text-muted readmore">Read More <i class="mdi mdi-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                @endforeach
            </div><!--end row-->
        </div><!--end container-->
        <!-- End Blog -->
    </section><!--end section-->
    <!-- End Client And Blog -->

@endsection

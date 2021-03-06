@extends('layouts.website')

@section('title') Contact Us |  @endsection

@section('content')
    <!-- Hero Start -->
    <section class="bg-half d-table w-100" style="background: url('/images/company/aboutus.jpg');background-attachment: fixed;">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="page-next-level title-heading">
                        <h1 class="text-white title-dark"> Contact Us </h1>
{{--                        <p class="text-white-50 para-desc mb-0 mx-auto">Start working with Landrick that can provide everything you need to generate awareness, drive traffic, connect.</p>--}}
                        <div class="page-next">
                            <nav aria-label="breadcrumb" class="d-inline-block">
                                <ul class="breadcrumb bg-white rounded shadow mb-0">
                                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
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

    <!-- Shape Start -->
    <div class="position-relative">
        <div class="shape overflow-hidden text-white">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <!--Shape End-->

    <!-- Start Contact -->
    <section class="section">
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-4 col-md-6  mt-4 pt-2">--}}
{{--                    <div class="card shadow rounded border-0">--}}
{{--                        <div class="card-body py-5">--}}
{{--                            <h4 class="card-title">Get In Touch !</h4>--}}
{{--                            <div class="custom-form mt-3">--}}
{{--                                <form method="post" name="myForm" onsubmit="return validateForm()">--}}
{{--                                    <p id="error-msg"></p>--}}
{{--                                    <div id="simple-msg"></div>--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-md-6">--}}
{{--                                            <div class="mb-3">--}}
{{--                                                <label class="form-label">Your Name <span class="text-danger">*</span></label>--}}
{{--                                                <div class="form-icon position-relative">--}}
{{--                                                    <i data-feather="user" class="fea icon-sm icons"></i>--}}
{{--                                                    <input name="name" id="name" type="text" class="form-control ps-5" placeholder="Name :">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="col-md-6">--}}
{{--                                            <div class="mb-3">--}}
{{--                                                <label class="form-label">Your Email <span class="text-danger">*</span></label>--}}
{{--                                                <div class="form-icon position-relative">--}}
{{--                                                    <i data-feather="mail" class="fea icon-sm icons"></i>--}}
{{--                                                    <input name="email" id="email" type="email" class="form-control ps-5" placeholder="Email :">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div><!--end col-->--}}

{{--                                        <div class="col-12">--}}
{{--                                            <div class="mb-3">--}}
{{--                                                <label class="form-label">Subject</label>--}}
{{--                                                <div class="form-icon position-relative">--}}
{{--                                                    <i data-feather="book" class="fea icon-sm icons"></i>--}}
{{--                                                    <input name="subject" id="subject" class="form-control ps-5" placeholder="subject :">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div><!--end col-->--}}

{{--                                        <div class="col-12">--}}
{{--                                            <div class="mb-3">--}}
{{--                                                <label class="form-label">Comments <span class="text-danger">*</span></label>--}}
{{--                                                <div class="form-icon position-relative">--}}
{{--                                                    <i data-feather="message-circle" class="fea icon-sm icons clearfix"></i>--}}
{{--                                                    <textarea name="comments" id="comments" rows="4" class="form-control ps-5" placeholder="Message :"></textarea>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-12">--}}
{{--                                            <div class="d-grid">--}}
{{--                                                <button type="submit" id="submit" name="send" class="btn btn-primary">Send Message</button>--}}
{{--                                            </div>--}}
{{--                                        </div><!--end col-->--}}
{{--                                    </div><!--end row-->--}}
{{--                                </form>--}}
{{--                            </div><!--end custom-form-->--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div><!--end col-->--}}

{{--                <div class="col-lg-8 col-md-6 pl-md-3 pr-md-3 mt-4 pt-2">--}}
{{--                    <div class="card map map-height-two rounded map-gray border-0">--}}
{{--                        <div class="card-body p-0">--}}
{{--                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39206.002432144705!2d-95.4973981212445!3d29.709510002925988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640c16de81f3ca5%3A0xf43e0b60ae539ac9!2sGerald+D.+Hines+Waterwall+Park!5e0!3m2!1sen!2sin!4v1566305861440!5m2!1sen!2sin" style="border:0" class="rounded" allowfullscreen=""></iframe>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div><!--end col-->--}}
{{--            </div><!--end row-->--}}
{{--        </div><!--end container-->--}}

        <div class="container mt-60">
            <div class="row">
                <div class="col-md-4">
                    <div class="card border-0 text-center features feature-clean">
                        <div class="icons text-primary text-center mx-auto">
                            <i class="uil uil-phone d-block rounded h3 mb-0"></i>
                        </div>
                        <div class="content mt-3">
                            <h5 class="font-weight-bold">Phone</h5>
                            <p class="text-muted">Call us through the following number</p>
                            <a href="tel:{{$site['phone']}}" class="text-primary">{{$site['phone']}}</a>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-md-4 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="card border-0 text-center features feature-clean">
                        <div class="icons text-primary text-center mx-auto">
                            <i class="uil uil-envelope d-block rounded h3 mb-0"></i>
                        </div>
                        <div class="content mt-3">
                            <h5 class="font-weight-bold">Email</h5>
                            <p class="text-muted">Email us through the following mail</p>
                            <a href="mailto:{{$site['email']}}" class="text-primary">{{$site['email']}}</a>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-md-4 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="card border-0 text-center features feature-clean">
                        <div class="icons text-primary text-center mx-auto">
                            <i class="uil uil-map-marker d-block rounded h3 mb-0"></i>
                        </div>
                        <div class="content mt-3">
                            <h5 class="font-weight-bold">Location</h5>
                            <p class="text-muted">{{$site['location_description']}}</p>
                            <a href="{{$site['location_url']}}" target="_blank" class="video-play-icon h6 text-primary">View on Google map</a>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </section><!--end section-->
    <!-- End contact -->
@endsection

@section('extra-js')
    <!-- Contact -->
    <script src="/js/contact.js"></script>
@endsection

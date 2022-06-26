@extends('layouts.website')

@section('title') Gallery |  @endsection

@section('content')
    <!-- Hero Start -->
    <section class="bg-half d-table w-100" style="background: url('images/company/aboutus.jpg');background-attachment: fixed;">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="page-next-level title-heading">
                        <h1 class="text-white title-dark"> Gallery </h1>
                        <p class="text-white-50 para-desc mb-0 mx-auto">Start working with Landrick that can provide everything you need to generate awareness, drive traffic, connect.</p>
                        <div class="page-next">
                            <nav aria-label="breadcrumb" class="d-inline-block">
                                <ul class="breadcrumb bg-white rounded shadow mb-0">
                                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Gallery</li>
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

    <!-- Start -->
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <ul class="col container-filter list-unstyled mb-0 text-center" id="filter">
                    <li class="list-inline-item"><a href="javascript:void(0)" class="categories-name tab-active border d-block text-dark rounded active" onclick="filterSelection('all')">All</a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)" class="categories-name tab-active border d-block text-dark rounded" onclick="filterSelection('branding')">Branding</a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)" class="categories-name tab-active border d-block text-dark rounded" onclick="filterSelection('designing')">Designing</a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)" class="categories-name tab-active border d-block text-dark rounded" onclick="filterSelection('photography')">Photography</a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)" class="categories-name tab-active border d-block text-dark rounded" onclick="filterSelection('development')">Development</a></li>
                </ul>
            </div><!--end row-->

            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2 filter-box branding">
                    <div class="card border-0 work-container work-classic">
                        <div class="card-body p-0">
                            <a href="page-portfolio-detail.html"><img src="/images/work/1.jpg" class="img-fluid rounded work-image" alt=""></a>
                            <div class="content pt-3">
                                <h5 class="mb-0"><a href="page-portfolio-detail.html" class="text-dark title">Iphone mockup</a></h5>
                                <h6 class="text-muted tag mb-0">Branding</h6>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2 filter-box designing">
                    <div class="card border-0 work-container work-classic">
                        <div class="card-body p-0">
                            <a href="page-portfolio-detail.html"><img src="/images/work/2.jpg" class="img-fluid rounded work-image" alt=""></a>
                            <div class="content pt-3">
                                <h5 class="mb-0"><a href="page-portfolio-detail.html" class="text-dark title">Mockup Collection</a></h5>
                                <h6 class="text-muted tag mb-0">Mockup</h6>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2 filter-box photography">
                    <div class="card border-0 work-container work-classic">
                        <div class="card-body p-0">
                            <a href="page-portfolio-detail.html"><img src="/images/work/3.jpg" class="img-fluid rounded work-image" alt=""></a>
                            <div class="content pt-3">
                                <h5 class="mb-0"><a href="page-portfolio-detail.html" class="text-dark title">Abstract images</a></h5>
                                <h6 class="text-muted tag mb-0">Abstract</h6>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2 filter-box development">
                    <div class="card border-0 work-container work-classic">
                        <div class="card-body p-0">
                            <a href="page-portfolio-detail.html"><img src="/images/work/4.jpg" class="img-fluid rounded work-image" alt=""></a>
                            <div class="content pt-3">
                                <h5 class="mb-0"><a href="page-portfolio-detail.html" class="text-dark title">Yellow bg with Books</a></h5>
                                <h6 class="text-muted tag mb-0">Books</h6>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2 filter-box branding">
                    <div class="card border-0 work-container work-classic">
                        <div class="card-body p-0">
                            <a href="page-portfolio-detail.html"><img src="/images/work/5.jpg" class="img-fluid rounded work-image" alt=""></a>
                            <div class="content pt-3">
                                <h5 class="mb-0"><a href="page-portfolio-detail.html" class="text-dark title">Company V-card</a></h5>
                                <h6 class="text-muted tag mb-0">V-card</h6>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2 filter-box branding">
                    <div class="card border-0 work-container work-classic">
                        <div class="card-body p-0">
                            <a href="page-portfolio-detail.html"><img src="/images/work/6.jpg" class="img-fluid rounded work-image" alt=""></a>
                            <div class="content pt-3">
                                <h5 class="mb-0"><a href="page-portfolio-detail.html" class="text-dark title">Mockup box with paints</a></h5>
                                <h6 class="text-muted tag mb-0">Photography</h6>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2 filter-box designing">
                    <div class="card border-0 work-container work-classic">
                        <div class="card-body p-0">
                            <a href="page-portfolio-detail.html"><img src="/images/work/7.jpg" class="img-fluid rounded work-image" alt=""></a>
                            <div class="content pt-3">
                                <h5 class="mb-0"><a href="page-portfolio-detail.html" class="text-dark title">Coffee cup</a></h5>
                                <h6 class="text-muted tag mb-0">Cups</h6>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2 filter-box development">
                    <div class="card border-0 work-container work-classic">
                        <div class="card-body p-0">
                            <a href="page-portfolio-detail.html"><img src="/images/work/8.jpg" class="img-fluid rounded work-image" alt=""></a>
                            <div class="content pt-3">
                                <h5 class="mb-0"><a href="page-portfolio-detail.html" class="text-dark title">Pen and article</a></h5>
                                <h6 class="text-muted tag mb-0">Article</h6>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2 filter-box photography">
                    <div class="card border-0 work-container work-classic">
                        <div class="card-body p-0">
                            <a href="page-portfolio-detail.html"><img src="/images/work/9.jpg" class="img-fluid rounded work-image" alt=""></a>
                            <div class="content pt-3">
                                <h5 class="mb-0"><a href="page-portfolio-detail.html" class="text-dark title">White mockup box</a></h5>
                                <h6 class="text-muted tag mb-0">Color</h6>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2 filter-box photography">
                    <div class="card border-0 work-container work-classic">
                        <div class="card-body p-0">
                            <a href="page-portfolio-detail.html"><img src="/images/work/10.jpg" class="img-fluid rounded work-image" alt=""></a>
                            <div class="content pt-3">
                                <h5 class="mb-0"><a href="page-portfolio-detail.html" class="text-dark title">Logo Vectors</a></h5>
                                <h6 class="text-muted tag mb-0">Logos</h6>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2 filter-box branding">
                    <div class="card border-0 work-container work-classic">
                        <div class="card-body p-0">
                            <a href="page-portfolio-detail.html"><img src="/images/work/11.jpg" class="img-fluid rounded work-image" alt=""></a>
                            <div class="content pt-3">
                                <h5 class="mb-0"><a href="page-portfolio-detail.html" class="text-dark title">Black and white T-shirt</a></h5>
                                <h6 class="text-muted tag mb-0">Clothes</h6>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2 filter-box branding">
                    <div class="card border-0 work-container work-classic">
                        <div class="card-body p-0">
                            <a href="page-portfolio-detail.html"><img src="/images/work/12.jpg" class="img-fluid rounded work-image" alt=""></a>
                            <div class="content pt-3">
                                <h5 class="mb-0"><a href="page-portfolio-detail.html" class="text-dark title">Yellow bg with cellphone</a></h5>
                                <h6 class="text-muted tag mb-0">Cellphone</h6>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->
@endsection

@section('extra-js')
    <!-- MK Lightbox -->
    <script src="/js/mklb.js"></script>
    <script src="/js/filter.init.js"></script>
@endsection

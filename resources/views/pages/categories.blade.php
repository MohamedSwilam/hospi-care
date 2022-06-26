@extends('layouts.website')

@section('title') Categories |  @endsection

@section('content')
    <!-- Hero Start -->
    <section class="bg-half d-table w-100" style="background: url('/images/company/aboutus.jpg');background-attachment: fixed;">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="page-next-level title-heading">
                        <h1 class="text-white title-dark"> Our Categories </h1>
                        <p class="text-white-50 para-desc mb-0 mx-auto">Start working with Landrick that can provide everything you need to generate awareness, drive traffic, connect.</p>
                        <div class="page-next">
                            <nav aria-label="breadcrumb" class="d-inline-block">
                                <ul class="breadcrumb bg-white rounded shadow mb-0">
                                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Categories</li>
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

    <!-- CTA START -->
    <section class="section">
        <!-- Start Categories -->
        <div class="container mt-60">
            <div class="container-fluid pt-2">
                <div class="row">
                    <div class="row">
                        @foreach($categories as $category)
                            <div class="col-lg-4 col-md-6 mt-4 pt-2">
                                <div class="card blog rounded border-0 shadow">
                                    <div class="position-relative">
                                        <img src="{{$category['photo']['url']}}" class="card-img-top rounded-top" alt="...">
                                        <div class="overlay rounded-top bg-dark"></div>
                                    </div>
                                    <div class="card-body content" style="text-align: center;width: 100%;">
                                        <h5 style="text-align: center;width: 100%;"><a href="/categories/{{$category['id']}}" class="card-title title text-dark">{{app()->getLocale() == 'en' ? $category['name_en'] : $category['name_fr'] }}</a></h5>
                                        <a href="/categories/{{$category['id']}}" class="btn btn-pills btn-primary btn-sm"><i class="mdi mdi-eye"></i> View Products</a>
                                    </div>
                                </div>
                            </div><!--end col-->
                        @endforeach
                    </div><!--end container-->

{{--                    <div class="col-md-4 mb-5 mt-4 pt-2 mt-sm-0 pt-sm-0">--}}
{{--                        <div class="py-5 rounded shadow" style="background: url('/images/shop/fea2.jpg') top center;">--}}
{{--                            <div class="p-4">--}}
{{--                                <h3>Category <br> Title 2</h3>--}}
{{--                                <a href="{{route('category-products', ['site' => 'slug' => 'category-name-1'])}}" class="btn btn-pills btn-sm btn-primary mt-2"><i class="mdi mdi-eye"></i> View</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div><!--end col-->--}}

{{--                    <div class="col-md-4 mb-5 mt-4 pt-2 mt-sm-0 pt-sm-0">--}}
{{--                        <div class="py-5 rounded shadow" style="background: url('/images/shop/fea3.jpg') top center;">--}}
{{--                            <div class="p-4">--}}
{{--                                <h3>Category <br> Title 3</h3>--}}
{{--                                <a href="{{route('category-products', ['site' => 'slug' => 'category-name-1'])}}" class="btn btn-pills btn-sm btn-primary mt-2"><i class="mdi mdi-eye"></i> View</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div><!--end col-->--}}

{{--                    <div class="col-md-4 mb-5 mt-4 pt-2 mt-sm-0 pt-sm-0">--}}
{{--                        <div class="py-5 rounded shadow" style="background: url('/images/shop/fea1.jpg') top center;">--}}
{{--                            <div class="p-4">--}}
{{--                                <h3>Category <br> Title 4</h3>--}}
{{--                                <a href="javascript:void(0)" class="btn btn-pills btn-sm btn-primary mt-2"><i class="mdi mdi-eye"></i> View</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div><!--end col-->--}}

{{--                    <div class="col-md-4 mb-5 mt-4 pt-2 mt-sm-0 pt-sm-0">--}}
{{--                        <div class="py-5 rounded shadow" style="background: url('/images/shop/fea2.jpg') top center;">--}}
{{--                            <div class="p-4">--}}
{{--                                <h3>Category <br> Title 5</h3>--}}
{{--                                <a href="javascript:void(0)" class="btn btn-pills btn-sm btn-primary mt-2"><i class="mdi mdi-eye"></i> View</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div><!--end col-->--}}

{{--                    <div class="col-md-4 mb-5 mt-4 pt-2 mt-sm-0 pt-sm-0">--}}
{{--                        <div class="py-5 rounded shadow" style="background: url('/images/shop/fea3.jpg') top center;">--}}
{{--                            <div class="p-4">--}}
{{--                                <h3>Category <br> Title 6</h3>--}}
{{--                                <a href="javascript:void(0)" class="btn btn-pills btn-sm btn-primary mt-2"><i class="mdi mdi-eye"></i> View</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div><!--end col-->--}}
{{--                    <div class="col-md-4 mb-5 mt-4 pt-2 mt-sm-0 pt-sm-0">--}}
{{--                        <div class="py-5 rounded shadow" style="background: url('/images/shop/fea1.jpg') top center;">--}}
{{--                            <div class="p-4">--}}
{{--                                <h3>Category <br> Title 7</h3>--}}
{{--                                <a href="javascript:void(0)" class="btn btn-pills btn-sm btn-primary mt-2"><i class="mdi mdi-eye"></i> View</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div><!--end col-->--}}

{{--                    <div class="col-md-4 mt-4 pt-2 mt-sm-0 pt-sm-0">--}}
{{--                        <div class="py-5 rounded shadow" style="background: url('/images/shop/fea2.jpg') top center;">--}}
{{--                            <div class="p-4">--}}
{{--                                <h3>Category <br> Title 8</h3>--}}
{{--                                <a href="javascript:void(0)" class="btn btn-pills btn-sm btn-primary mt-2"><i class="mdi mdi-eye"></i> View</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div><!--end col-->--}}

{{--                    <div class="col-md-4 mt-4 pt-2 mt-sm-0 pt-sm-0">--}}
{{--                        <div class="py-5 rounded shadow" style="background: url('/images/shop/fea3.jpg') top center;">--}}
{{--                            <div class="p-4">--}}
{{--                                <h3>Category <br> Title 9</h3>--}}
{{--                                <a href="javascript:void(0)" class="btn btn-pills btn-sm btn-primary mt-2"><i class="mdi mdi-eye"></i> View</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div><!--end col-->--}}
                </div><!--end row-->
            </div><!--end container-->
        </div><!--end container-->
        <!-- End Categories -->
    </section><!--end section-->
    <!-- CTA END -->
    <!-- End -->
@endsection

@section('extra-js')
    <!-- Counter -->
    <script src="/js/counter.init.js "></script>
@endsection

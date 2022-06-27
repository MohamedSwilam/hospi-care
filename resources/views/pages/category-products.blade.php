@extends('layouts.website')

@section('title') Category Products |  @endsection

@section('content')
    <!-- Hero Start -->
    <section class="bg-half d-table w-100" style="background: url('/images/company/aboutus.jpg');background-attachment: fixed;">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="page-next-level title-heading">
                        <h1 class="text-white title-dark"> {{ app()->getLocale() == 'en' ? $category['name_en'] : $category['name_fr'] }} </h1>
{{--                        <p class="text-white-50 para-desc mb-0 mx-auto">Start working with Landrick that can provide everything you need to generate awareness, drive traffic, connect.</p>--}}
                        <div class="page-next">
                            <nav aria-label="breadcrumb" class="d-inline-block">
                                <ul class="breadcrumb bg-white rounded shadow mb-0">
                                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('categories')}}">Categories</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ app()->getLocale() == 'en' ? $category['name_en'] : $category['name_fr'] }}</li>
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

    <!-- Start Products -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12 mt-5 pt-2 mt-sm-0 pt-sm-0">
{{--                    <div class="row align-items-center">--}}
{{--                        <div class="col-lg-8 col-md-7">--}}
{{--                            <div class="section-title">--}}
{{--                                <h5 class="mb-0">Showing 1–15 of 47 results</h5>--}}
{{--                            </div>--}}
{{--                        </div><!--end col-->--}}

{{--                        <div class="col-lg-4 col-md-5 mt-4 mt-sm-0 pt-2 pt-sm-0">--}}
{{--                            <div class="d-flex justify-content-md-between align-items-center">--}}
{{--                                <div class="form custom-form">--}}
{{--                                    <div class="form-group mb-0">--}}
{{--                                        <select class="form-control custom-select" id="Sortbylist-job">--}}
{{--                                            <option>Sort by latest</option>--}}
{{--                                            <option>Sort by popularity</option>--}}
{{--                                            <option>Sort by rating</option>--}}
{{--                                            <option>Sort by price: low to high</option>--}}
{{--                                            <option>Sort by price: high to low</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="mx-2">--}}
{{--                                    <a href="shop-grids.html" class="h5 text-muted"><i class="uil uil-apps"></i></a>--}}
{{--                                </div>--}}

{{--                                <div>--}}
{{--                                    <a href="shop-lists.html" class="h5 text-muted"><i class="uil uil-list-ul"></i></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div><!--end col-->--}}
{{--                    </div><!--end row-->--}}
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-lg-3 col-md-4 col-6 mt-4 pt-2">
                                <div class="card shop-list border-0 position-relative">
                                    <div class="shop-image position-relative overflow-hidden rounded shadow" style="text-align: center;">
                                        @if(count($product['product_photos']) > 0)
                                            <a href="{{route('product-details', [$product['category_id'], $product['id']])}}">
                                                <img src="https://hospicare.medica-lab.com{{$product['product_photos'][0]['url']}}" class="img-fluid" alt="" style="max-width: 100%;max-height: 200px;">
                                            </a>
                                        @endif
                                        @if(count($product['product_photos']) > 1)
                                            <a href="{{route('product-details', [$product['category_id'], $product['id']])}}" class="overlay-work">
                                                <img src="https://hospicare.medica-lab.com{{$product['product_photos'][1]['url']}}" class="img-fluid" alt="" style="max-width: 100%;max-height: 200px;">
                                            </a>
                                        @endif
                                        <ul class="list-unstyled shop-icons">
                                            <li class="mt-2"><a href="{{route('product-details', [$product['category_id'], $product['id']])}}" data-toggle="modal" data-target="#productview" class="btn btn-icon btn-pills btn-primary"><i data-feather="eye" class="icons"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="card-body content pt-4 p-2">
                                        <a href="{{route('product-details', [$product['category_id'], $product['id']])}}" class="text-dark product-name h6">{{ app()->getLocale() == 'en' ? $product['title_en'] : $product['title_fr'] }}</a>
                                    </div>
                                </div>
                            </div><!--end col-->
                        @endforeach
{{--                        <!-- PAGINATION START -->--}}
{{--                        <div class="col-12 mt-4 pt-2">--}}
{{--                            <ul class="pagination justify-content-center mb-0">--}}
{{--                                <li class="page-item"><a class="page-link" href="javascript:void(0)" aria-label="Previous"><i class="mdi mdi-arrow-left"></i> Prev</a></li>--}}
{{--                                <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="javascript:void(0)" aria-label="Next">Next <i class="mdi mdi-arrow-right"></i></a></li>--}}
{{--                            </ul>--}}
{{--                        </div><!--end col-->--}}
{{--                        <!-- PAGINATION END -->--}}
                    </div><!--end row-->
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End Products -->

@endsection

@section('extra-js')
@endsection

@extends('layouts.website')

@section('title') Product Details |  @endsection

@section('content')
    <!-- Hero Start -->
    <section class="bg-half d-table w-100" style="background: url('/images/company/aboutus.jpg');background-attachment: fixed;">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="page-next-level title-heading">
                        <h1 class="text-white title-dark"> Product Details </h1>
{{--                        <p class="text-white-50 para-desc mb-0 mx-auto">Start working with Landrick that can provide everything you need to generate awareness, drive traffic, connect.</p>--}}
                        <div class="page-next">
                            <nav aria-label="breadcrumb" class="d-inline-block">
                                <ul class="breadcrumb bg-white rounded shadow mb-0">
                                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('categories')}}">Categories</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('category-products', [$category['id']])}}">{{ app()->getLocale() == 'en' ? $category['name_en'] : $category['name_fr'] }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Product Details</li>
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

    <section class="section pb-20">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="tiny-single-item">
                        @foreach($product['product_photos'] as $photo)
                            <div class="tiny-slide" style="text-align: center;">
                                <img src="https://hospicare.medica-lab.com{{$photo['url']}}" class="img-fluid rounded" alt="" style="max-width:400px;max-height: 500px;">
                            </div>
                        @endforeach
                    </div>
                </div><!--end col-->

                <div class="col-md-7 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="section-title ml-md-4">
                        <h4 class="title">{{ app()->getLocale() == 'en' ? $product['title_en'] : $product['title_fr'] }}</h4>
                        <h5 class="mt-4 py-2">Overview :</h5>
                        <p class="text-muted">{{ app()->getLocale() == 'en' ? $product['overview_en'] : $product['overview_fr'] }}</p>

                        <ul class="mt-5 nav nav-pills shadow flex-column flex-sm-row d-md-inline-flex mb-0 p-1 bg-white rounded position-relative overflow-hidden" id="pills-tab" role="tablist">
                            <li class="nav-item m-1">
                                <a class="nav-link py-2 px-5 active rounded" id="description-data" data-bs-toggle="pill" href="#description" role="tab" aria-controls="description" aria-selected="false">
                                    <div class="text-center">
                                        <h6 class="mb-0">Description</h6>
                                    </div>
                                </a><!--end nav link-->
                            </li><!--end nav item-->

                            <li class="nav-item m-1">
                                <a class="nav-link py-2 px-5 rounded" id="additional-info" data-bs-toggle="pill" href="#additional" role="tab" aria-controls="additional" aria-selected="false">
                                    <div class="text-center">
                                        <h6 class="mb-0">Additional Information</h6>
                                    </div>
                                </a><!--end nav link-->
                            </li><!--end nav item-->
                        </ul>


                        <div class="tab-content mt-5" id="pills-tabContent">
                            <div class="card border-0 tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-data">
                                <p class="text-muted mb-0">{{ app()->getLocale() == 'en' ? $product['description_en'] : $product['description_fr'] }}</p>
                            </div>

                            <div class="card border-0 tab-pane fade" id="additional" role="tabpanel" aria-labelledby="additional-info">
                                <table class="table">
                                    <tbody>
                                    @foreach($product['product_details'] as $detail)
                                    <tr>
                                        <td style="width: 100px;">{{ app()->getLocale() == 'en' ? $detail['title_en'] : $detail['title_fr'] }}</td>
                                        <td class="text-muted">{{ app()->getLocale() == 'en' ? $detail['value_en'] : $detail['value_fr'] }}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        @if(count($relatedProducts) > 0)
            <div class="container mt-100 mt-60">
                <div class="row">
                    <div class="col-12">
                        <h5 class="mb-0">Related Products</h5>
                    </div><!--end col-->

                    <div class="col-12 mt-4">
                        <div class="tiny-four-item">
                            @foreach($relatedProducts as $relatedProduct)
                                <div class="tiny-slide">
                                    <div class="card shop-list border-0 position-relative m-2">
                                        <div class="shop-image position-relative overflow-hidden rounded shadow">
                                            @if(count($relatedProduct['product_photos']) > 0)
                                                <a href="{{route('product-details', [$relatedProduct['category_id'], $relatedProduct['id']])}}">
                                                    <img src="https://hospicare.medica-lab.com{{$relatedProduct['product_photos'][0]['url']}}" class="img-fluid" alt="" style="max-width: 100%;max-height: 200px;">
                                                </a>
                                            @endif
                                            @if(count($relatedProduct['product_photos']) > 1)
                                                <a href="{{route('product-details', [$relatedProduct['category_id'], $relatedProduct['id']])}}" class="overlay-work">
                                                    <img src="https://hospicare.medica-lab.com{{$relatedProduct['product_photos'][1]['url']}}" class="img-fluid" alt="" style="max-width: 100%;max-height: 200px;">
                                                </a>
                                            @endif
                                            <ul class="list-unstyled shop-icons">
                                                <li class="mt-2"><a href="{{route('product-details', [$relatedProduct['category_id'], $relatedProduct['id']])}}" data-toggle="modal" data-target="#productview" class="btn btn-icon btn-pills btn-soft-primary"><i data-feather="eye" class="icons"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="card-body content pt-4 p-2">
                                            <a href="{{route('product-details', [$relatedProduct['category_id'], $relatedProduct['id']])}}" class="text-dark product-name h6">{{ app()->getLocale() == 'en' ? $product['title_en'] : $product['title_fr'] }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        @endif
    </section><!--end section-->

@endsection

@section('extra-js')
<script></script>
@endsection

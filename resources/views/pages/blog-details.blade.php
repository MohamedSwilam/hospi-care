@extends('layouts.website')

@section('title') News Details |  @endsection

@section('content')
    <!-- Hero Start -->
    <section class="bg-half d-table w-100" style="background: url('/images/company/aboutus.jpg');background-attachment: fixed;">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="page-next-level title-heading">
                        <h1 class="text-white title-dark"> News Details </h1>
                        <p class="text-white-50 para-desc mb-0 mx-auto">{{app()->getLocale() == 'en' ? $news['title_en'] : $news['title_fr'] }}</p>
                        <div class="page-next">
                            <nav aria-label="breadcrumb" class="d-inline-block">
                                <ul class="breadcrumb bg-white rounded shadow mb-0">
                                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('news')}}">News</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Details</li>
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
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row">
                        <style>
                            .news-details img {
                                max-width: 100%;
                            }
                        </style>
                        <div class="col-md-12 news-details">
                            {!! app()->getLocale() == 'en' ? $news['details_en'] : $news['details_fr'] !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('extra-js')

@endsection

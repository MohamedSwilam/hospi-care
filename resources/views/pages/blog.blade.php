@extends('layouts.website')

@section('title') News |  @endsection

@section('content')
    <!-- Hero Start -->
    <section class="bg-half d-table w-100" style="background: url('/images/company/aboutus.jpg');background-attachment: fixed;">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="page-next-level title-heading">
                        <h1 class="text-white title-dark"> News </h1>
{{--                        <p class="text-white-50 para-desc mb-0 mx-auto">Start working with Landrick that can provide everything you need to generate awareness, drive traffic, connect.</p>--}}
                        <div class="page-next">
                            <nav aria-label="breadcrumb" class="d-inline-block">
                                <ul class="breadcrumb bg-white rounded shadow mb-0">
                                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">News</li>
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

    <!-- Blog STart -->
    <section class="section">
        <div class="container">
            <div class="row">
                @foreach($news as $blog)
                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                        <div class="card blog rounded border-0 shadow">
                            <div class="position-relative" style="text-align: center;">
                                <img src="https://hospicare.medica-lab.com{{$blog['photo']['url']}}" class="card-img-top rounded-top" alt="..." style="width: auto;height: auto;max-width: 100%;max-height: 250px;">
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
    </section><!--end section-->
    <!-- Blog End -->
@endsection

@section('extra-js')

@endsection

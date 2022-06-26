<!-- Footer Start -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-12 mb-0 mb-md-4 pb-0 pb-md-2">
                <a href="{{route('home')}}" class="logo-footer">
                    <img src="/images/logo/hospi-care-logo-white.png" height="150" alt="">
                </a>
                <p class="mt-4">Your satisfaction is our ultimate goal, start working with Medica-lab and experience the guaranteed quality and service.</p>
                <ul class="list-unstyled social-icon social mb-0 mt-4">
                    <li class="list-inline-item"><a href="https://www.facebook.com/Medica.lab.group/" target="_blank" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li>
                </ul><!--end icon-->
            </div><!--end col-->

            <div class="col-lg-2 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <h5 class="text-light footer-head">Our Sites</h5>
                <ul class="list-unstyled footer-list mt-4">
                    @foreach($sites as $siteInfo)
                        <li><a href="{{route('home', $siteInfo['slug'])}}" class="text-foot"><i class="mdi mdi-chevron-right mr-1"></i> {{$siteInfo['name']}}</a></li>
                    @endforeach
                </ul>
            </div><!--end col-->

            <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <h5 class="text-light footer-head">Usefull Links</h5>
                <ul class="list-unstyled footer-list mt-4">
                    <li><a href="{{route('home')}}" class="text-foot"><i class="mdi mdi-chevron-right mr-1"></i> Home</a></li>
                    <li><a href="{{route('news')}}" class="text-foot"><i class="mdi mdi-chevron-right mr-1"></i> News</a></li>
                    <li><a href="{{route('about')}}" class="text-foot"><i class="mdi mdi-chevron-right mr-1"></i> About Us</a></li>
                    <li><a href="{{route('contact')}}" class="text-foot"><i class="mdi mdi-chevron-right mr-1"></i> Contact Us</a></li>
                </ul>
            </div><!--end col-->

            <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <h5 class="text-light footer-head">Our Categories</h5>
                <ul class="list-unstyled footer-list mt-4">
                    @foreach($categories as $categoryInfo)
                        <li><a href="/categories/{{$categoryInfo['id']}}" class="text-foot"><i class="mdi mdi-chevron-right mr-1"></i> {{app()->getLocale() == 'en'?$categoryInfo['name_en']:$categoryInfo['name_fr']}}</a></li>
                    @endforeach
{{--                    <li><a href="{{route('home')}}" class="text-foot"><i class="mdi mdi-chevron-right mr-1"></i> Home</a></li>--}}
{{--                    <li><a href="{{route('news')}}" class="text-foot"><i class="mdi mdi-chevron-right mr-1"></i> News</a></li>--}}
{{--                    <li><a href="{{route('about')}}" class="text-foot"><i class="mdi mdi-chevron-right mr-1"></i> About Us</a></li>--}}
{{--                    <li><a href="{{route('contact')}}" class="text-foot"><i class="mdi mdi-chevron-right mr-1"></i> Contact Us</a></li>--}}
                </ul>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</footer><!--end footer-->
<footer class="footer footer-bar">
    <div class="container text-center">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="text-sm-left">
                    <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Hospicare. All Rights reserved.</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</footer><!--end footer-->
<!-- Footer End -->

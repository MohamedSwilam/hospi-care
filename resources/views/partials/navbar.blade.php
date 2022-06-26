<!-- Navbar STart -->
<header id="topnav" class="defaultscroll sticky">
    <div class="container">
        <!-- Logo container-->
        <div>
            <a class="logo" href="{{route('home')}}">
                <img src="/images/logo/hospi-care-logo-colored.png" class="l-dark" height="45" alt="">
                <img src="/images/logo/hospi-care-logo-white.png" class="l-light" height="60" alt="">
            </a>
        </div>

        <div class="buy-button">
            <a href="{{$site['catalog']['url']}}" target="_blank" class="btn btn-pills btn-primary btn-sm"><i class="mdi mdi-book"></i> Catalog</a>
            @if(app()->getLocale() == 'en')
                <a href="{{\Route::localizedUrl('fr')}}" class="ml-2"><img src="/images/flags/fr.png" class="l-dark" alt="fr" height="40"></a>
            @elseif(app()->getLocale() == 'fr')
                <a href="{{\Route::localizedUrl('en')}}" class="ml-2"><img src="/images/flags/en.png" class="l-dark" alt="en" height="40"></a>
            @endif
        </div><!--end login button-->
        <!-- End Logo container-->
        <div class="menu-extras">
            <div class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </div>
        </div>

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu nav-light">
                <li><a href="{{route('home')}}">{{ __('links.home') }}</a></li>
                <li class="has-submenu">
                    <a href="javascript:void(0)">Products</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        @foreach($categories as $category)
                            <li><a href="/categories/{{$category['id']}}">{{app()->getLocale() == 'en'?$category['name_en']:$category['name_fr']}}</a></li>
                        @endforeach
{{--                        @foreach($categories as $category)--}}
{{--                            <li class="has-submenu"><a href="javascript:void(0)"> {{app()->getLocale() == 'en'?$category['name_en']:$category['name_fr']}} </a><span class="submenu-arrow"></span>--}}
{{--                                <ul class="submenu">--}}
{{--                                    @foreach($category['products'] as $product)--}}
{{--                                        <li><a href="/categories/{{$category['id']}}"> {{app()->getLocale() == 'en'?$product['title_en']:$product['title_en']}}</a></li>--}}
{{--                                    @endforeach--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                        @endforeach--}}
                        <li class="has-submenu"><a href="/categories"> View All </a></li>
                    </ul>
                </li>
                <li><a href="{{route('news')}}">News</a></li>
                <li><a href="{{route('about')}}">About Us</a></li>
                <li><a href="{{route('contact')}}">Contact Us</a></li>
            </ul><!--end navigation menu-->

            <div class="buy-menu-btn d-none">
                <a href="{{$site['catalog']['url']}}" target="_blank" class="btn btn-pills btn-primary">Download Catalog</a>
            </div><!--end login button-->

        </div><!--end navigation-->
    </div><!--end container-->
</header><!--end header-->
<!-- Navbar End -->
<script>

</script>

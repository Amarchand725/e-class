<!DOCTYPE html>
    <html lang="en" >
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Online Courses | eClass-LearningManagementSystem</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="author" content="Media City" />
        <meta name="MobileOptimized" content="320" />

        <meta name="title" content="eClass-LearningManagementSystem">
        <meta name="description" content="eClass fills in as a stage that permits teachers from everywhere throughout the world to spread information.

        Let’s allow us to explain our product.

        Students take courses largely as a me ">
        <meta property="og:title" content="eClass-LearningManagementSystem ">
        <meta property="og:description" content="
                eClass fills in as a stage that permits teachers from everywhere throughout the world to spread information.
                Let’s allow us to explain our product.
                Students take courses largely as a me
            ">
        <meta property="og:image" content="{{ asset('public/website/images/logo/logo.png') }}">
        <meta itemprop="image" content="{{ asset('public/website/images/logo/logo.png') }}">
        <meta property="og:type" content="website">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:image" content="{{ asset('public/website/images/logo/logo.png') }}">
        <meta property="twitter:title" content="eClass-LearningManagementSystem ">
        <meta property="twitter:description" content="eClass fills in as a stage that permits teachers from everywhere throughout the world to spread information.

        Let’s allow us to explain our product.

        Students take courses largely as a me">
        <meta name="robots" content="all">
        <meta name="keywords" content="eClass">

        <!-- Chrome for Android theme color -->
        <meta name="theme-color" content="#DA1616">

        <!-- Add to homescreen for Chrome on Android -->
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="application-name" content="eClass-LearningManagementSystem">
        <link rel="icon" sizes="512x512" href="{{ asset('public/website/images/icons/icon-512x512.png') }}">

        <!-- Add to homescreen for Safari on iOS -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="eClass-LearningManagementSystem">

        <!-- Add Styles -->
        @include('web-views.layouts.styles')
        <!-- Add Styles -->

        <!-- Tile for Win8 -->
        <meta name="msapplication-TileColor" content="#3F3131">
        <meta name="msapplication-TileImage" content="{{ asset('public/website/images/icons/icon-512x512.png') }}">

        <script type="text/javascript">
            // Initialize the service worker
            if ('serviceWorker' in navigator) {
                navigator.serviceWorker.register('serviceworker.js', {
                    scope: '.'
                }).then(function (registration) {
                    // Registration was successful
                    console.log('Laravel PWA: ServiceWorker registration successful with scope: ', registration.scope);
                }, function (err) {
                    // registration failed :(
                    console.log('Laravel PWA: ServiceWorker registration failed: ', err);
                });
            }
        </script>
        <!-- end theme styles -->
    </head>
    <style type="text/css">
        :root {
            --linear-gradient-bg-color:linear-gradient(-45deg, #f44a4a 0, #6e1a52 100%);
            --linear-gradient-reverse-bg-color:linear-gradient(-45deg, #6e1a52 0, #f44a4a 100%);
            --linear-gradient-about-bg-color:linear-gradient(197.61deg, #f44a4a , #6e1a52);
            --linear-gradient-about-blue-bg-color:linear-gradient(40deg, #1a263a 33%, #4a8394 84%);
            --linear-gradient-career-bg-color:linear-gradient(22.72914987deg, #f5c252 4%, #6ac1d0);
            --background-blue-bg-color: #0284a2;
            --background-red-bg-color: #f44a4a; 
            --background-grey-bg-color:#f7f8fa;
            --background-light-grey-bg-color:#f9f9f9;
            --background-black-bg-color:#29303b;
            --background-white-bg-color:#ffffff;
            --background-mehroon-bg-color:#992337;
            --text-black-color:#29303b;
            --text-light-grey-color:#777777;
            --text-dark-grey-color:#686f7a;
            --text-red-color:#f44a4a;
            --text-blue-color:#0284a2;
            --text-dark-blue-color:#003845;
            --text-white-color:#ffffff;
        }

        #cookieWrapper {
            position: fixed;
            bottom: 0;
            width: 100%;
            z-index: 100;
            margin: 0;
            border-radius: 0;
            background-color: var(--background-blue-bg-color) !important;
        }

        .bg-primary {
            background-color: var(--background-blue-bg-color) !important;
        }
        .btn-warning {
            background-color: var(--background-red-bg-color)!important;
            border: 1px solid var(--background-red-bg-color)!important;
            color: var(--text-white-color);
        }
        .cookie-consent__message {
            color: var(--text-white-color);
        }
    </style>

    <!-- custom css -->
    @stack('css')
    <!-- custom css -->

    <div id="cookieWrapper" class="bg-primary text-white w-100 py-3 text-center cookierbar js-cookie-consent cookie-consent">
        <span class="cookie-consent__message">
            Your experience on this site will be improved by allowing cookies.&nbsp;&nbsp;
        </span>
        <button class="btn btn-sm btn-warning js-cookie-consent-agree cookie-consent__agree">
            Allow cookies
        </button>
    </div>
    <script>
        window.laravelCookieConsent = (function () {
            const COOKIE_VALUE = 1;
            const COOKIE_DOMAIN = '';

            function consentWithCookies() {
                setCookie('laravel_cookie_consent', COOKIE_VALUE, 7300);
                hideCookieDialog();
            }

            function cookieExists(name) {
                return (document.cookie.split('; ').indexOf(name + '=' + COOKIE_VALUE) !== -1);
            }

            function hideCookieDialog() {
                const dialogs = document.getElementsByClassName('js-cookie-consent');

                for (let i = 0; i < dialogs.length; ++i) {
                    dialogs[i].style.display = 'none';
                }
            }

            function setCookie(name, value, expirationInDays) {
                const date = new Date();
                date.setTime(date.getTime() + (expirationInDays * 24 * 60 * 60 * 1000));
                document.cookie = name + '=' + value
                    + ';expires=' + date.toUTCString()
                    + ';domain=' + COOKIE_DOMAIN
                    + ';path=/'
                    + '';
            }

            if (cookieExists('laravel_cookie_consent')) {
                hideCookieDialog();
            }

            const buttons = document.getElementsByClassName('js-cookie-consent-agree');

            for (let i = 0; i < buttons.length; ++i) {
                buttons[i].addEventListener('click', consentWithCookies);
            }

            return {
                consentWithCookies: consentWithCookies,
                hideCookieDialog: hideCookieDialog
            };
        })();
    </script>
    <body>
        <div class="preloader">
            <div class="status">
                <div class="status-message">
                    <img src="{{ asset('public/website/images/logo/preloader_logo.png') }}" alt="logo" class="img-fluid">
                </div>
            </div>
        </div>

        <!-- whatsapp chat button -->
        <div id="myButton"></div>

        <!-- end preloader -->
        <!-- top-nav bar start-->
        <div id="promo-outer">
            <div id="promo-inner">
                <a href="#">Keep your skills on point| Stay logged in to see your latest course recommendations, promos, and more.</a>
                <span id="close">x</span>
            </div>
        </div>
        <div id="promo-tab" class="display-none">SHOW</div>

        <!-- Add Navbar -->
        @include('web-views.layouts.navbar')
        <!-- Add Navbar -->

        <!-- start search -->
        <div id="find" class="small-screen-navigation">
            <button type="button" class="close">×</button>
            <form action="#" class="form-inline search-form" method="GET">
                <input type="find" name="searchTerm" class="form-control" id="search"  placeholder="Searchforcourses" value="">
                <button type="submit" class="btn btn-outline-info btn_sm">Search</button> 
            </form>
        </div>
        <!-- start end -->

        <!-- side navigation  -->
        <script>
            function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
            }

            function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            }
        </script>

        <div class="modal fade" data-backdrop="" style="z-index: 99999999999999999;" id="myModalinstructor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">

                <h4 class="modal-title" id="myModalLabel">Become An Instructor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="box box-primary">
                <div class="panel panel-sum">
                    <div class="modal-body">
                                    <div class="box-footer">
                        <button type="submit" onclick="window.location.href = 'login.html';" class="btn btn-lg col-md-3 btn-primary">Submit</button>
                        </div>
                        
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>

        <!-- categories-tab start-->
        <section id="categories-tab" class="categories-tab-main-block">
            <div class="container-xl">
                <div id="categories-tab-slider" class="categories-tab-block owl-carousel">
                    <div class="item categories-tab-dtl">
                        <a href="browse/categorya943.html?id=2&amp;category=devlopment"
                            title="Devlopment"><i class="fa fa-connectdevelop"></i>Devlopment</a>
                    </div>
                    <div class="item categories-tab-dtl">
                        <a href="browse/categoryf18b.html?id=6&amp;category=healthfitness"
                            title="Health &amp; Fitness"><i class="fa fa-heartbeat"></i>Health &amp; Fitness</a>
                    </div>
                    <div class="item categories-tab-dtl">
                        <a href="browse/category8e7e.html?id=4&amp;category=lifestyle"
                            title="Lifestyle"><i class="fa fa-yelp"></i>Lifestyle</a>
                    </div>
                    <div class="item categories-tab-dtl">
                        <a href="browse/category43bf.html?id=3&amp;category=music"
                            title="Music"><i class="fa fa-music"></i>Music</a>
                    </div>
                    <div class="item categories-tab-dtl">
                        <a href="browse/category15bc.html?id=1&amp;category=design"
                            title="Design"><i class="fa fa-slideshare"></i>Design</a>
                    </div>
                    <div class="item categories-tab-dtl">
                        <a href="browse/categoryc2e2.html?id=5&amp;category=photogarphy"
                            title="Photogarphy"><i class="fa fa-file-photo-o"></i>Photogarphy</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- categories-tab end-->

        <!-- Mian content -->
        @yield('content')
        <!-- Mian content -->

        <!-- Add Footer -->
        @include('web-views.layouts.footer')
        <!-- Add Footer -->

        <!-- Become an instructor -->
        @include('web-views.layouts.become-instructor')
        <!-- Become an instructor -->

        <!-- All scripts -->
        @include('web-views.layouts.scripts')
        <!-- All scripts -->

        <!-- Custom js -->
        @stack('js')
        <!-- Custom js -->

        <!-- Footer jquery -->
        @include('web-views.layouts.custome_js')
        <!-- Footer jquery -->
    </body>
</html> 

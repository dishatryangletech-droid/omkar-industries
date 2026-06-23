@props(['title' => 'Omkar – Industry & Factory HTML Template'])
<!doctype html>
<html class="no-js" lang="en">
<head>
    @php
        $frontendAsset = function ($path) {
            $version = file_exists(public_path($path)) ? filemtime(public_path($path)) : time();

            return asset($path) . '?v=' . $version;
        };
    @endphp
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $title ?? 'Omkar - Industry & Factory HTML Template' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/images/omkar-logo.png') }}">
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ $frontendAsset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ $frontendAsset('frontend/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ $frontendAsset('frontend/fonts/pbmit-induyst-icon/pbmit_induyst.css') }}">
    <link rel="stylesheet" href="{{ $frontendAsset('frontend/css/pbminfotech-base-icons.css') }}">
    <link rel="stylesheet" href="{{ $frontendAsset('frontend/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ $frontendAsset('frontend/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ $frontendAsset('frontend/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ $frontendAsset('frontend/css/aos.css') }}">
    <link rel="stylesheet" href="{{ $frontendAsset('frontend/css/shortcode.css') }}">
    <link rel="stylesheet" href="{{ $frontendAsset('frontend/css/base.css') }}">
    <link rel="stylesheet" href="{{ $frontendAsset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ $frontendAsset('frontend/css/responsive.css') }}">
    @livewireStyles
    <link rel="stylesheet" href="{{ $frontendAsset('frontend/css/custom-slider.css') }}">
    <link rel="stylesheet" href="{{ $frontendAsset('frontend/css/slide1-fix.css') }}">
    @stack('page-css')
</head>
<body>

    {{ $slot }}

    <!-- JS -->
    <!-- jQuery JS -->
    <script src="{{ $frontendAsset('frontend/js/jquery.min.js') }}"></script>
    <!-- Popper JS -->
    <script src="{{ $frontendAsset('frontend/js/popper.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ $frontendAsset('frontend/js/bootstrap.min.js') }}"></script>
    <!-- jquery Waypoints JS -->
    <script src="{{ $frontendAsset('frontend/js/jquery.waypoints.min.js') }}"></script>
    <!-- jquery Appear JS -->
    <script src="{{ $frontendAsset('frontend/js/jquery.appear.js') }}"></script>
    <!-- Numinate JS -->
    <script src="{{ $frontendAsset('frontend/js/numinate.min.js') }}"></script>
    <!-- Slick JS -->
    <script src="{{ $frontendAsset('frontend/js/swiper.min.js') }}"></script>
    <!-- Magnific JS -->
    <script src="{{ $frontendAsset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Circle Progress JS -->
    <script src="{{ $frontendAsset('frontend/js/circle-progress.js') }}"></script>
    <!-- countdown JS -->
    <script src="{{ $frontendAsset('frontend/js/jquery.countdown.min.js') }}"></script> 
    <!-- masonry JS -->
    <script src="{{ $frontendAsset('frontend/js/masonry.pkgd.min.js') }}"></script> 
    <!-- AOS -->
    <script src="{{ $frontendAsset('frontend/js/aos.js') }}"></script>
    <!-- GSAP -->
    <script src="{{ $frontendAsset('frontend/js/gsap.js') }}"></script>
    <!-- Scroll Trigger -->
    <script src="{{ $frontendAsset('frontend/js/ScrollTrigger.js') }}"></script>
    <!-- Split Text -->
    <script src="{{ $frontendAsset('frontend/js/SplitText.js') }}"></script>
    <!-- Isotope JS -->
    <script src="{{ $frontendAsset('frontend/js/isotope.pkgd.min.js') }}"></script>
    <!-- Theia Sticky Sidebar JS -->
    <script src="{{ $frontendAsset('frontend/js/theia-sticky-sidebar.js') }}"></script>
    <!-- GSAP Animation -->
    <script src="{{ $frontendAsset('frontend/js/gsap-animation.js') }}"></script>
    <!-- Chart JS -->
    <script src="{{ $frontendAsset('frontend/js/chart.js') }}"></script>
    <!-- Scripts JS -->
    <script src="{{ $frontendAsset('frontend/js/scripts.js') }}"></script>

    @livewireScripts
    @stack('page-js')
</body>
</html>

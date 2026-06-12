<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $title ?? 'Induyst – Industry & Factory HTML Template' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/images/fevicon.png') }}">
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css?v=1') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/fontawesome.css?v=1') }}">
    <link rel="stylesheet" href="{{ asset('frontend/fonts/pbmit-induyst-icon/pbmit_induyst.css?v=1') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/pbminfotech-base-icons.css?v=1') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/themify-icons.css?v=1') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/swiper.min.css?v=1') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css?v=1') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/aos.css?v=1') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/shortcode.css?v=1') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/base.css?v=1') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css?v=1') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css?v=1') }}">
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('frontend/css/custom-slider.css?v=1781266836.64119') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/slide1-fix.css') }}?v=1781247852">
</head>
<body>

    {{ $slot }}

    <!-- JS -->
    <!-- jQuery JS -->
    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <!-- Popper JS -->
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <!-- jquery Waypoints JS -->
    <script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
    <!-- jquery Appear JS -->
    <script src="{{ asset('frontend/js/jquery.appear.js') }}"></script>
    <!-- Numinate JS -->
    <script src="{{ asset('frontend/js/numinate.min.js') }}"></script>
    <!-- Slick JS -->
    <script src="{{ asset('frontend/js/swiper.min.js') }}"></script>
    <!-- Magnific JS -->
    <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Circle Progress JS -->
    <script src="{{ asset('frontend/js/circle-progress.js') }}"></script>
    <!-- countdown JS -->
    <script src="{{ asset('frontend/js/jquery.countdown.min.js') }}"></script> 
    <!-- masonry JS -->
    <script src="{{ asset('frontend/js/masonry.pkgd.min.js') }}"></script> 
    <!-- AOS -->
    <script src="{{ asset('frontend/js/aos.js') }}"></script>
    <!-- GSAP -->
    <script src="{{ asset('frontend/js/gsap.js') }}"></script>
    <!-- Scroll Trigger -->
    <script src="{{ asset('frontend/js/ScrollTrigger.js') }}"></script>
    <!-- Split Text -->
    <script src="{{ asset('frontend/js/SplitText.js') }}"></script>
    <!-- Isotope JS -->
    <script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
    <!-- Theia Sticky Sidebar JS -->
    <script src="{{ asset('frontend/js/theia-sticky-sidebar.js') }}"></script>
    <!-- GSAP Animation -->
    <script src="{{ asset('frontend/js/gsap-animation.js') }}"></script>
    <!-- Chart JS -->
    <script src="{{ asset('frontend/js/chart.js') }}"></script>
    <!-- Scripts JS -->
    <script src="{{ asset('frontend/js/scripts.js') }}"></script>

    @livewireScripts
</body>
</html>

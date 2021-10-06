<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="{{ config('app.keywords') }}" />
        <meta name="author" content="{{ config('app.name') }}" />
        <meta name="robots" content="{{ config('app.robots') }}" />
        <meta name="description" content="{{ config('app.description') }}" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" />
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" />

        <title>{{ config('app.name') }}</title>

        <!-- BOOTSTRAP STYLE SHEET -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
        <!-- FONTAWESOME STYLE SHEET -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/fontawesome/css/font-awesome.min.css') }}" />
        <!-- FLATICON STYLE SHEET -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/flaticon.min.css') }}">
        <!-- ANIMATE STYLE SHEET -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.min.css') }}">
        <!-- OWL CAROUSEL STYLE SHEET -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.min.css') }}">
        <!-- BOOTSTRAP SELECT BOX STYLE SHEET -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.min.css') }}">
        <!-- MAGNIFIC POPUP STYLE SHEET -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/magnific-popup.min.css') }}">
        <!-- LOADER STYLE SHEET -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/loader.min.css') }}">
        <!-- MAIN STYLE SHEET -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
        <!-- THEME COLOR CHANGE STYLE SHEET -->
        <link rel="stylesheet" class="skin" type="text/css" href="{{ asset('css/styles.css') }}">
        <!-- CUSTOM  STYLE SHEET -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
        <!-- REVOLUTION SLIDER CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('plugins/revolution/revolution/css/settings.css') }}">
        <!-- REVOLUTION NAVIGATION STYLE -->
        <link rel="stylesheet" type="text/css" href="{{ asset('plugins/revolution/revolution/css/navigation.css') }}">

        @stack('styles')

    </head>
    <body id="bg">

        <div class="page-wraper">

            @yield('content')

        </div>

        <script src="{{ asset('js/jquery-1.12.4.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>

        <script src="{{ asset('js/bootstrap-select.min.js') }}"></script><!-- FORM JS -->
        <script src="{{ asset('js/jquery.bootstrap-touchspin.min.js') }}"></script><!-- FORM JS -->

        <script src="{{ asset('js/magnific-popup.min.js') }}"></script><!-- MAGNIFIC-POPUP JS -->

        <script src="{{ asset('js/waypoints.min.js') }}"></script><!-- WAYPOINTS JS -->
        <script src="{{ asset('js/counterup.min.js') }}"></script><!-- COUNTERUP JS -->
        <script src="{{ asset('js/waypoints-sticky.min.js') }}"></script><!-- COUNTERUP JS -->

        <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script><!-- MASONRY  -->

        <script src="{{ asset('js/owl.carousel.min.js') }}"></script><!-- OWL  SLIDER  -->
        <script src="{{ asset('js/jquery.owl-filter.js') }}"></script>

        <script src="{{ asset('js/stellar.min.js') }}"></script><!-- PARALLAX BG IMAGE   -->
        <script src="{{ asset('js/scrolla.min.js') }}"></script><!-- ON SCROLL CONTENT ANIMTE   -->

        <script src="{{ asset('js/custom.js') }}"></script><!-- CUSTOM FUCTIONS  -->
        <script src="{{ asset('js/shortcode.js') }}"></script><!-- SHORTCODE FUCTIONS  -->

        <script  src="{{ asset('plugins/revolution/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
        <script  src="{{ asset('plugins/revolution/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>

        <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
        <script  src="{{ asset('plugins/revolution/revolution/js/extensions/revolution-plugin.js') }}"></script>

        <!-- REVOLUTION SLIDER SCRIPT FILES -->
        <script src="{{ asset('js/rev-script-2.js') }}"></script>

        @stack('scripts')

    </body>
</html>

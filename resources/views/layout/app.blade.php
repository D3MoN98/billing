<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <title>Splite-Admin Dashboard</title>

    <!--favicon -->
    <link rel="icon" href="favicon.ico" type="image/x-icon" />

    <!--Bootstrap.min css-->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.min.css') }}">

    <!--Style css-->
    <link rel="stylesheet" href="{{asset('css/style.css') }}">

    <!--Icons css-->
    <link rel="stylesheet" href="{{asset('css/icons.css') }}">

    <!--mCustomScrollbar css-->
    <link rel="stylesheet" href="{{asset('plugins/scroll-bar/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" href="{{asset('plugins/toggle-menu/sidemenu.css') }}">


    <!--Sidemenu css-->
    <link href="{{asset('plugins/horizontal-menu/dropdown-effects/fade-down.css" rel="stylesheet') }}">
    <link href="{{asset('plugins/horizontal-menu/webslidemenu.css" rel="stylesheet') }}">

    <!--Morris css-->
    <link rel="stylesheet" href="{{asset('plugins/morris/morris.css') }}">

    @stack('styles')


</head>

<body class="app {{$body_class ?? null}}">

    <!--Header Style -->
    <div class="wave -three"></div>

    <!--loader -->
    <div id="spinner"></div>

    <!--app open-->
    @yield('content')
    <!--app closed-->

    <!-- Back to top -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>


    <!--Jquery.min js-->
    <script src="{{asset('js/jquery.min.js') }}"></script>

    <!--popper js-->
    <script src="{{asset('js/popper.js') }}"></script>

    <!--Bootstrap.min js-->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!--Tooltip js-->
    <script src="{{asset('js/tooltip.js') }}"></script>

    <!-- Jquery star rating-->
    <script src="{{asset('plugins/rating/jquery.rating-stars.js') }}"></script>

    <!--Sidemenu js-->
    <script src="{{asset('plugins/toggle-menu/sidemenu.js') }}"></script>

    <!--Othercharts js-->
    <script src="{{asset('plugins/othercharts/jquery.knob.js') }}"></script>
    <script src="{{asset('plugins/othercharts/jquery.sparkline.min.js') }}"></script>

    <!--Chart js-->
    <script src="{{asset('plugins/Chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{asset('plugins/Chart.js/dist/Chart.extension.js') }}"></script>

    <!--Morris js-->
    <script src="{{asset('plugins/morris/morris.min.js') }}"></script>
    <script src="{{asset('plugins/morris/raphael.min.js') }}"></script>

    <!--mCustomScrollbar js-->
    <script src="{{asset('plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js') }}"></script>

    <!--Dashboard js-->
    <script src="{{asset('js/dashboard2.js') }}"></script>

    <!--Showmore js-->
    <script src="{{asset('js/jquery.showmore.js') }}"></script>

    <!--Sparkline js-->
    <script src="{{asset('js/sparkline.js') }}"></script>

    <!--OtherCharts js-->
    <script src="{{asset('js/othercharts.js') }}"></script>

    <!--Scripts js-->
    <script src="{{asset('js/scripts.js') }}"></script>

    @stack('scripts')


</body>

</html>

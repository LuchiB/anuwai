<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="/app/images/icon.png" type="image/x-icon" />

    <title>{{ $title ?? 'Home - Anuwai Arts' }}</title>

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    {{-- bootstrap 4 file --}}
    <link href="/app/css/bootstrap.css" rel="stylesheet" type="text/css" />

    {{-- custom styles --}}
    <link href="/app/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/app/css/ui.css" rel="stylesheet" type="text/css" />
    <link href="/app/css/responsive.min.css" rel="stylesheet" type="text/css" />
{{-- font awesome --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    {{-- sldier starts --}}
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css'>
    <link rel='stylesheet' href='/slider/slider.css'>
    {{-- sldier ends --}}

    <!--====== Jquery alert css ======-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">


</head>

<body>

    <!--====== PREALOADER  START ======-->
    <div class="preloader">
        <div class="preloader-body">
            <div class="cssload-container">
                <div class="cssload-speeding-wheel"></div>
            </div>
            <p>Loading...</p>
        </div>
    </div>
    <!--====== PREALOADER  ENDS  ======-->


    @yield('header')

    {{-- @yield('banner') --}}

    @yield('content')

    @include('partials.footer')

    <!-- jQuery -->
    {{-- <script src="/app/js/jquery-2.0.0.min.js" type="text/javascript"></script> --}}
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>


    <!-- custom javascript -->
    <script src="/app/js/script.js?v=2.0" type="text/javascript"></script>

    <!-- Bootstrap4 files-->
    <script src="/app/js/bootstrap.bundle.min.js" type="text/javascript"></script>


    <!-- Font awesome 5 -->
    <link href="/app/fonts/fontawesome/css/all.min.css@v=2.0.css" type="text/css" rel="stylesheet">

    {{-- slider starts --}}
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/animateCSS/1.2.2/jquery.animatecss.min.js'></script>
    {{-- slider ends --}}


    {{-- Jquery alert js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    {{-- @yield('footer') --}}

    <script src="/js/custom.js"></script>
    <script >
    // LOADER TIMER
$(window).on('load',function(){
    setTimeout(function(){ // allowing 3 secs to fade out loader
    $('.preloader').fadeOut('slow');
    },800);
    });
    //END---------------------->
    </script>

    @yield('scripts')
</body>

</html>

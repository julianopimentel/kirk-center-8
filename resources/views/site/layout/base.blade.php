<!DOCTYPE html>
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description"
        content="Tenha na palma de sua mão as informações da membresia de sua igreja, gestão de grupos ou células, lançamento das receitas do financeiro, desespesas e muito mais">
    <meta name="author" content="deskapps.net">
    <meta name="keyword" content="deskapps,igreja">
    <title>{{ __('general.logo') }} - {{ __('general.sublogo') }}</title>
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/favicon/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="assets/favicon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('assets/favicon/ms-icon-144x144.png') }}">

    <!-- Compartilhamento no whats-->
    <meta property="og:site_name" content="DeskApps">
    <meta property="og:title" content="Gestão de Igrejas">
    <meta property="og:description" content="Desenvolvedora de sistemas web e app para a gestão de igrejas.">
    <meta property="og:image" itemprop="image" content="https://deskapp.online/logo1.jpg">
    <meta property="og:type" content="website">

    <!-- Icons-->
    <link href="{{ asset('css/free.min.css?v=1') }}" rel="stylesheet">
    <!-- Main styles for this application-->

    <!-- Layout-->
    <link href="{{ asset('css/style1.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components.css') }}" rel="stylesheet">

    @yield('css')

    <link href="{{ asset('css/coreui-chartjs.css?v=1') }}" rel="stylesheet">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-80RW918J90"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-80RW918J90');
    </script>

    <!-- ========== Start Stylesheet ========== -->
    <link href="site/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="site/assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="site/assets/css/flaticon-set.css" rel="stylesheet" />
    <link href="site/assets/css/magnific-popup.css" rel="stylesheet" />
    <link href="site/assets/css/owl.carousel.min.css" rel="stylesheet" />
    <link href="site/assets/css/owl.theme.default.min.css" rel="stylesheet" />
    <link href="site/assets/css/animate.css" rel="stylesheet" />
    <link href="site/assets/css/bootsnav.css" rel="stylesheet" />
    <link href="site/style.css" rel="stylesheet">
    <link href="site/assets/css/responsive.css" rel="stylesheet" />



    <!-- ========== End Stylesheet ========== -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="site/assets/js/html5/html5shiv.min.js"></script>
      <script src="site/assets/js/html5/respond.min.js"></script>
    <![endif]-->

    <!-- ========== Google Fonts ========== -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet">

</head>

<body>

    <!-- Header
    ============================================= -->
    <header id="home">
        @include('site.layout.menu')

    </header>

    <div class="c-body">

        <main class="c-main">
            @include('layouts.shared.flash-message')
            @yield('content')

        </main>
    </div>

    @include('site.layout.footer')

   
    <!-- End Footer -->

    <!-- jQuery Frameworks
    ============================================= -->
    <script src="site/assets/js/jquery-1.12.4.min.js"></script>
    <script src="site/assets/js/bootstrap.min.js"></script>
    <script src="site/assets/js/equal-height.min.js"></script>
    <script src="site/assets/js/jquery.appear.js"></script>
    <script src="site/assets/js/jquery.easing.min.js"></script>
    <script src="site/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="site/assets/js/modernizr.custom.13711.js"></script>
    <script src="site/assets/js/owl.carousel.min.js"></script>
    <script src="site/assets/js/count-to.js"></script>
    <script src="site/assets/js/wow.min.js"></script>
    <script src="site/assets/js/jquery.backgroundMove.js"></script>
    <script src="site/assets/js/bootsnav.js"></script>
    <script src="site/assets/js/main.js"></script>

</body>

</html>

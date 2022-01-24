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

   <!-- Calendar -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
   <!-- Icons-->
   <link href="{{ asset('css/free.min.css?v=1') }}" rel="stylesheet">
   <!-- Main styles for this application-->
   <link href="{{ asset('css/style.css?v=1') }}" rel="stylesheet">

   <!-- Layout-->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
   <link href="{{ asset('css/style1.css') }}" rel="stylesheet">
   <link href="{{ asset('css/components.css') }}" rel="stylesheet">

   <!-- Alert-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

   <!-- Select2-->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

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
</head>

<!-- retirar minimized fica minimizado c-sidebar-minimized-->
<body class="c-app">
   <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
       @include('layouts.shared.nav-builder')

       @include('layouts.shared.header')

       <div class="c-body">

           <main class="c-main">
               @include('layouts.shared.flash-message')
               @yield('content')

           </main>
       </div>
   </div>
   <!-- CoreUI and necessary plugins-->
   <script src="{{ asset('js/coreui.bundle.min.js?v=1') }}"></script>
   <script src="{{ asset('js/coreui-utils.js?v=1') }}"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
   <!-- Mensagem flash https://medium.com/hacktive-devs/handling-feedback-in-web-laravel-applications-9f6691616218-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

   <script type="text/javascript">
       $('.show_confirm').click(function(event) {
           var form = $(this).closest("form");
           var name = $(this).data("name");
           event.preventDefault();
           swal({
                   title: `Tem certeza de que deseja excluir este registro?`,
                   text: "Se você excluir isso, ele desaparecerá para sempre.",
                   icon: "warning",
                   buttons: true,
                   dangerMode: true,
               })
               .then((willDelete) => {
                   if (willDelete) {
                       form.submit();
                   }
               });
       });
   </script>
   @yield('javascript')

</body>

</html>
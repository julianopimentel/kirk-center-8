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

        <!-- Start Navigation -->
        <nav class="navbar navbar-default navbar-fixed navbar-transparent white bootsnav">

            <div class="container-semi">

                <!-- Start Atribute Navigation -->
                <div class="attr-nav button-light">
                    <ul>
                        <li>
                            <a href="{{ route('login')}}">Entrar</a>
                        </li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="/">
                        <img src="site/assets/img/coreui-base-white-228x81.png" class="logo logo-display" alt="Logo"
                            width="140" height="60">
                        <img src="site/assets/img/coreui-base-white-228x81.png" class="logo logo-scrolled" alt="Logo"
                            width="120" height="60">
                    </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right" data-in="#" data-out="#">
                        <li>
                            <a class="smooth-menu" href="{{ route('features')}}">Features</a>
                        </li>
                        <li>
                            <a class="smooth-menu" href="/blog">Blog</a>
                        </li>
                        <li class="dropdown dropdown-right">
                            <a href="#" class="dropdown-toggle smooth-menu" data-toggle="dropdown">Suporte</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('contato')}}">Contato</a></li>
                                <li><a href="index-2.html">Central de Ajuda</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>

        </nav>
        <!-- End Navigation -->

    </header>
    <!-- End Header -->

    <!-- Start Banner
    ============================================= -->
    <div class="banner-area auto-height inc-form text-center text-light shadow theme-hard bg-fixed"
        style="background-image: url(site/assets/img/fundo1.png);">
        <div class="box-table">
            <div class="box-cell">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="content">
                                <h1>Sua Gestão de Igrejas <br> descomplicada!</h1>
                                <p>
                                    Você pode ter na palma de sua mão as informações da membresia de sua igreja, gestão
                                    de grupos ou células, lançamento de entradas e saídas do financeiro.
                                </p>
                                <a class="btn circle btn-light border btn-md" href="/features">Conheça</a>
                            </div>
                            <!-- Start Form -->
                            <div class="form col-md-6 col-md-offset-3">
                                <div class="form-info">
                                    <h4>Criar conta</h4>
                                    <form action="#">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="form-group">
                                                    <input class="form-control" placeholder="Name*" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="form-group">
                                                    <input class="form-control" placeholder="Email*" type="email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="form-group">
                                                    <input class="form-control" placeholder="Password*" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <button type="submit">
                                                    Cadastrar grátis
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- End Form -->
                        </div>
                    </div>
                </div>
                <div class="wavesshape">
                    <img src="site/assets/img/waves-shape.svg" alt="Shape">
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner -->

    <!-- Start Companies Area
    ============================================= -->
    <div class="companies-area text-center default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 info">
                    <h3>Temos a confiança de mais de<span> 2500+</span> 
                        <br>membros e parceiros</h3>
                    <p>
                        Nossa comunidade é formada por diferentes grupos sociais religiosos
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Companies Area -->

    <!-- Start About
    ============================================= -->
    <div id="about" class="about-area inc-thumb default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 thumb">
                    <img src="site/assets/img/membros.png" alt="Thumb">
                </div>
                <div class="col-md-6 info">
                    <h2>Membros também podem entrar e participar</h2>
                    <p>
                        Com apenas um passo, membros podem ter acesso a sua comunidade. Grupos, Eventos, Recados, Pedido
                        de oração e muito mais.
                    </p>
                    <ul>
                        <li>Dizimos: Tenha seu histórico financeiro de seus Dízimos e Ofertas.</li>
                        <li>Eventos: Confirme sua presença nos eventos divulgados.</li>
                        <li>Mural de Recado: Visualize as postagens/recados de sua Igreja.</li>
                        <li>Histórico de seus dízimos</li>
                        <li>Comente publicações da comunidade</li>
                        <li>Participe de grupos</li>
                        <li>Divulgação de Eventos</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End About -->

    <!-- Start Features Area
    ============================================= -->
    <div id="features" class="features-area bg-fixed background-move shadow-less default-padding bg-gray"
        style="background-image: url(site/assets/img/bg-2.png);">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2">
                    <div class="site-heading text-center">
                        <h2>Solução perfeita
                            para pequenas e grandes instituições.</h2>
                        <p>
                            Super personalizado, escolha quais informações gostaria de adicionar e quais ocultar
                            <br>
                            Gerencie várias instituições, apenas um clique e está em outra conta
                            Entre em contato com o nosso time comercial e faça um teste de 7 dias. Não é necessário cartão de crédito!
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7 feature-box">
                    <div class="features-items text-center">
                        <div class="row">
                            <!-- Single Item -->
                            <div class="col-md-6 col-sm-6 equal-height">
                                <div class="item">
                                    <div class="icon">
                                        <i class="flaticon-software"></i>
                                    </div>
                                    <div class="info">
                                        <h4>Personalizado</h4>
                                        <p>
                                            Do seu jeito as cores e dominio próprio.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            <div class="col-md-6 col-sm-6 equal-height">
                                <div class="item">
                                    <div class="icon">
                                        <i class="flaticon-support"></i>
                                    </div>
                                    <div class="info">
                                        <h4>Suporte</h4>
                                        <p>
                                            Precisou de ajuda?  Fale com o nosso tiem
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            <div class="col-md-6 col-sm-6 equal-height">
                                <div class="item">
                                    <div class="icon">
                                        <i class="flaticon-analysis-1"></i>
                                    </div>
                                    <div class="info">
                                        <h4>Dashboard</h4>
                                        <p>
                                            Te auxiliamos na tomada de decisão
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            <div class="col-md-6 col-sm-6 equal-height">
                                <div class="item">
                                    <div class="icon">
                                        <i class="flaticon-car"></i>
                                    </div>
                                    <div class="info">
                                        <h4>Configuração fácil</h4>
                                        <p>
                                            Comece em 30 segundos
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
                        </div>
                    </div>
                </div>
                <!-- Thumb -->
                <div class="col-md-5 thumb">
                    <img src="site/assets/img/illustrations/1.png" alt="Thumb">
                </div>
                <!-- End Thumb -->
            </div>
        </div>
    </div>
    <!-- End Features Area -->

    <!-- Start Video Area
    ============================================= -->
    <div class="video-area text-light bg-theme default-padding">
        <!-- Side Bg -->
        <div class="side-bg">
            <img src="site/assets/img/circle-shape.png" alt="Thumb">
        </div>
        <!-- End Side Bg -->
        <div class="container">
            <div class="row">
                <div class="item-box">
                    <div class="col-md-6 info">
                        <h2>O que você ganha com a
                            plataforma Kirk</h2>
                        <p>
                            Gerencie várias instituições, apenas em um clique e está em outra conta.
                        </p>
                        <h4>Você no controle de tudo</h4>
                        <ul>
                            <li>Multi Contas</li>
                            <li>Contas de usuário ilimitadas</li>
                            <li>Dashboard completo</li>
                            <li>Gestão financeira</li>
                            <li>Gestão de membresia</li>
                            <li>Controle os acessos de seus secretários ou tesoreiros</li>
                            <li>Relatórios avançados</li>
                            <li>Monstre aos membros a movimentação financeira</li>
                        </ul>
                        <a class="btn circle btn-light border btn-md" href="#">Conheça</a>
                    </div>
                    <div class="col-md-6 video">
                        <img src="site/assets/img/financeiro.png" alt="Thumb">
                        <a class="popup-youtube dark video-play-button"
                            href="https://www.youtube.com/watch?v=owhuBrGIOsE">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Video Area -->

    <!-- Start Faq
    ============================================= -->
    <div id="faq" class="faq-area bg-gray default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-5 thumb">
                    <img src="site/assets/img/illustrations/2.svg" alt="Thumb">
                </div>
                <div class="col-md-7 faq-items">
                    <div class="heading">
                        <h2>Pergunta e Resposta frequentes
                        </h2>
                    </div>
                    <!-- Start Accordion -->
                    <div class="acd-items acd-arrow">
                        <div class="panel-group symb" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac1">
                                            Sou membro de uma igreja, preciso realizar algum pagamento?
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <p>
                                            A plataforma é totalmente gratuita aos usuários membros das instituições parceiras.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac2">
                                            Gostaria de utilizar a plataforma em minha igreja
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                            Caso seja o Líder titular da instituição, entre em contato conosco e liberamos 7 dias grátis para usar e testar com a sua liderança.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac3">
                                            Consigo gerenciar minha igreja Sede e Filiais?
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac3" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                            Sim, todas as contas criadas são individuais, não possuindo nenhum vinculo entre elas. Você libera o acesso aos membros e caso a pessoa seja membra em mais de uma instutição ela terá o acesso aos 2 contas, podendo escolher qual deseja entrar e visualizar.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Accordion -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Faq  -->

    <!-- Start Blog Area
    ============================================= -->
    <div id="blog" class="blog-area default-padding bottom-less">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2">
                    <div class="site-heading text-center">
                        <h2>Novidades</h2>
                        <p>
                            Veja as principais mudanças e melhorias.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="blog-items">
                    <!-- Single Item -->
                    <div class="col-md-4 single-item">
                        <div class="item">
                            <div class="thumb">
                                <a href="#"><img src="site/assets/img/800x600.png" alt="Thumb"></a>
                            </div>
                            <div class="info">
                                <div class="content">
                                    <div class="date">
                                        15 Aug, 2019
                                    </div>
                                    <h4>
                                        <a href="#">Direct wicket little of talked lasted formed</a>
                                    </h4>
                                    <p>
                                        Pronounce we attention admitting on assurance of suspicion conveying. That his
                                        west quit had met till.
                                    </p>
                                    <a href="#">Read More <i class="fas fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single Item -->
                    <!-- Single Item -->
                    <div class="col-md-4 single-item">
                        <div class="item">
                            <div class="thumb">
                                <a href="#"><img src="site/assets/img/800x600.png" alt="Thumb"></a>
                            </div>
                            <div class="info">
                                <div class="content">
                                    <div class="date">
                                        27 Nov, 2019
                                    </div>
                                    <h4>
                                        <a href="#">Supported neglected met therefore unwilling</a>
                                    </h4>
                                    <p>
                                        Pronounce we attention admitting on assurance of suspicion conveying. That his
                                        west quit had met till.
                                    </p>
                                    <a href="#">Read More <i class="fas fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single Item -->
                    <!-- Single Item -->
                    <div class="col-md-4 single-item">
                        <div class="item">
                            <div class="thumb">
                                <a href="#"><img src="site/assets/img/800x600.png" alt="Thumb"></a>
                            </div>
                            <div class="info">
                                <div class="content">
                                    <div class="date">
                                        18 Sep, 2019
                                    </div>
                                    <h4>
                                        <a href="#">Concerns greatest margaret absolute entrance</a>
                                    </h4>
                                    <p>
                                        Pronounce we attention admitting on assurance of suspicion conveying. That his
                                        west quit had met till.
                                    </p>
                                    <a href="#">Read More <i class="fas fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single Item -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Area -->

    <!-- Start Contact
    ============================================= -->
    <div id="contact" class="contact-area bg-gray default-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2">
                    <div class="site-heading text-center">
                        <h2>Experimente uma maneira mais inteligente de gerenciar sua Igreja.
                        </h2>
                        <p>
                            Plataforma simples, desenvolvido com muito amor
                        </p>
                        <br>
                        <br>
                        <a class="btn circle btn-dark border btn-md" href="/contato">Fale com a gente</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact -->
    <!-- Start Footer
    ============================================= -->
    <footer class="default-padding-top bg-light">
        <div class="container">
            <div class="row">
                <div class="f-items">
                    <div class="col-md-4 col-sm-6 equal-height item">
                        <div class="f-item">
                            <img src="site/assets/img/logo.png" alt="Logo">
                            <p>
                                <a class="elementor-icon elementor-social-icon elementor-social-icon-instagram elementor-repeater-item-2678399"
                                    href="https://www.instagram.com/kirk.digital/" target="_blank">
                                    <span class="elementor-screen-only">Instagram</span>
                                    <i class="fab fa-instagram"></i> </a>
                            </p>
                            <p>
                                <i>Por favor, escreva seu e-mail e receba nossas incríveis atualizações, notícias e
                                    suporte</i>
                            </p>
                            <div class="newsletter">
                                <form action="#">
                                    <div class="input-group stylish-input-group">
                                        <input type="email" name="email" class="form-control"
                                            placeholder="Enter your e-mail here">
                                        <button type="submit">
                                            <i class="fa fa-paper-plane"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 equal-height item">
                        <div class="f-item link">
                            <h4>Soluções</h4>
                            <ul>
                                <li>
                                    <a href="#">Gestão Financeira</a>
                                </li>
                                <li>
                                    <a href="#">Gestão de Membros</a>
                                </li>
                                <li>
                                    <a href="#">Dashboard</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 equal-height item">
                        <div class="f-item link">
                            <h4>Comunidade</h4>
                            <ul>
                                <li>
                                    <a href="#">Blog</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 equal-height item">
                        <div class="f-item twitter-widget">
                            <h4>Contato</h4>
                            <div class="address">
                                <ul>
                                    <li>
                                        <div class="icon">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <div class="info">
                                            <h5>Email:</h5>
                                            <span>contato@kirkapp.online</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                        <div class="info">
                                            <h5>Phone:</h5>
                                            <span>+44-20-7328-4499</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Footer Bottom -->
        <div class="footer-bottom default-padding-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="col-lg-6 col-md-6 col-sm-7">
                            <p>&copy; {{ date('Y') }} DeskApps - Todos os direitos reservados. <a
                                    href="#">validthemes</a></p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-5 text-right link">
                            <ul>
                                <li>
                                    <a href="#">Termos de Uso</a>
                                </li>
                                <li>
                                    <a href="#">Privacidade</a>
                                </li>
                                <li>
                                    <a href="#">Suporte</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>
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

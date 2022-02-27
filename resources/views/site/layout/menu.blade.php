
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
                        <img src="site/assets/img/logo.png" class="logo logo-scrolled" alt="Logo"
                            width="130" height="80">
                    </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right" data-in="#" data-out="#">
                        <li>
                            <a class="smooth-menu" href="{{ route('features')}}">Por que Usar?</a>
                        </li>
                        <li>
                            <a class="smooth-menu" href="{{ route('blog')}}">Blog</a>
                        </li>
                        <li class="dropdown dropdown-right">
                            <a href="#" class="dropdown-toggle smooth-menu" data-toggle="dropdown">Suporte</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('contato')}}">Contato</a></li>
                                <li><a href="#">Central de Ajuda</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>

        </nav>
        <!-- End Navigation -->
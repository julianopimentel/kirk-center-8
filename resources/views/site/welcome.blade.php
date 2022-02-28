@extends('site.layout.base')
@section('content')

    <!-- Start Banner
    ============================================= -->
    <div class="banner-area auto-height inc-form text-center text-light shadow theme-hard bg-fixed"
        style="background-image: url(site/assets/img/fundo.png);">
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
                                <a class="btn circle btn-light border btn-md" href="{{ route('features')}}">Conheça</a>
                            </div>
                            <!-- Start Form -->
                            <div class="form col-md-6 col-md-offset-3">
                                <div class="form-info">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <a class="btn circle btn-dark border btn-md" href="{{ route('register')}}"> Criar conta grátis</a>

                                            </div>
                                        </div>
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
                        <a class="btn circle btn-light border btn-md" href="{{ route('features')}}">Conheça</a>
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
                        <a class="btn circle btn-dark border btn-md" href="{{ route('contato')}}">Fale com a gente</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact -->

    @endsection

    @section('javascript')
    
    @endsection
    
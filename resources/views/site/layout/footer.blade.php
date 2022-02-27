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
                                            <span>{{ contato() }}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                        <div class="info">
                                            <h5>Phone:</h5>
                                            <span>{{ telefone() }}</span>
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
                                    <a href="{{ route('terms')}}">Termos de Uso</a>
                                </li>
                                <li>
                                    <a href="{{ route('privacy')}}">Privacidade</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>
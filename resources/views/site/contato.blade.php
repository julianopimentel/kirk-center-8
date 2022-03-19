@extends('site.layout.base')
@section('content')
    <!-- Start Breadcrumb
        ============================================= -->
    <div class="breadcrumb-area shadow dark bg-fixed text-center padding-xl text-light"
        style="background-image: url(site/site/assets/img/2440x1578.png);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>Contato</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Contact
        ============================================= -->
    <div id="contact" class="contact-area bg-gray default-padding">
        <div class="container">
            <div class="row">
                <div class="contact-items">

                    <!-- End Thumb -->
                    <div class="col-md-4 thumb">
                        <img src="site/assets/img/illustrations/5.png" alt="Thumb">
                    </div>
                    <!-- End Thumb -->

                    <!-- Contact Form -->
                    <div class="col-md-7 col-md-offset-1 contact-form">
                        <form method="POST" action="{{ route('envio') }}">
                            @csrf
                            @method('PUT')
                                                        <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" id="name" name="name" placeholder="Name" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" id="email" name="email" placeholder="Email*"
                                            type="email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" id="phone" name="phone" placeholder="Phone"
                                            type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group comments">
                                        <textarea class="form-control" id="comments" name="comments" placeholder="Mensagem *"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <button type="submit" name="submit" id="submit">
                                        Enviar <i class="fa fa-paper-plane"></i>
                                    </button>
                                </div>
                                <button class="btn btn-success" type="submit" title="Salvar"><i
                                        class="c-icon c-icon-sm cil-save"></i></button>

                            </div>
                        </form>
                    </div>
                    <!-- End Contact Form -->
                </div>

                <!-- Address List -->
                <div class="address-list text-center col-md-12">
                    <div class="item-box">
                        <!-- Single Item -->
                        <div class="col-md-4 equal-height single-item">
                            <div class="item">
                                <i class="fas fa-map-marked-alt"></i>
                                <h4>Location</h4>
                                <p>
                                    {{ localidade() }}
                                </p>
                            </div>
                        </div>
                        <!-- End Single Item -->
                        <!-- Single Item -->
                        <div class="col-md-4 equal-height single-item">
                            <div class="item">
                                <i class="fas fa-phone"></i>
                                <h4>Contato</h4>
                                <h2>{{ telefone() }}</h2>
                            </div>
                        </div>
                        <!-- End Single Item -->
                        <!-- Single Item -->
                        <div class="col-md-4 equal-height single-item">
                            <div class="item">
                                <i class="fas fa-envelope-open"></i>
                                <h4>Email</h4>
                                <p>
                                    {{ contato() }}
                                </p>
                            </div>
                        </div>
                        <!-- End Single Item -->
                    </div>
                </div>
                <!-- End Address List -->

            </div>
        </div>
    </div>
    <!-- End Contact -->
@endsection

@section('javascript')
@endsection

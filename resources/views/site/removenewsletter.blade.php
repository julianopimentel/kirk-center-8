@extends('site.layout.base')
@section('content')
    <!-- Start Breadcrumb
        ============================================= -->
    <div class="breadcrumb-area shadow dark bg-fixed text-center padding-xl text-light"
        style="background-image: url(site/site/assets/img/2440x1578.png);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner -->

    <!-- Start Services Area
        ============================================= -->
    <div id="services" class="features-area carousel-shadow default-padding bottom-less">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2">
                    <div class="site-heading text-center">
                        <h2>Remover do Newsletter</h2>
                        <p>
                            Você não recebera as novidades de nossa plataforma, mas fique a vontade para acessar o nosso
                            blog e ficar por dentro!<br>
                        </p>
                    </div>

                    <form action="{{ route('delete.newsletter') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail">Email</label>
                            <input type="email" name="user_email" id="exampleInputEmail" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Retirar</button>
                    </form>
                    <br><br>
                    <span>
                    Apenas removeremos você do serviços de campanha, ainda receberá os e-mails das instituições caso possui algum cadastro. Para remover pedimos que entre em contato conosco.
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- End Services Area -->
@endsection

@section('javascript')
@endsection

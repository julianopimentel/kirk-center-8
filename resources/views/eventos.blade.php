@if ($appPermissao->home_dados == true)
    @extends('layouts.base')
    @section('content')
        <div class="container-fluid">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="invoice">
                            <div class="invoice-print">
                                <div class="row">
                                    <div class="row g-0">
                                        @foreach ($eventos as $eventos)
                             
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $eventos->title }}</h5>
                                                <p class="card-text">Data Inicio: {{ $eventos->start }}  /  Data Fim: {{ $eventos->end }}</p>
                                                <a class="btn btn-primary" href="#">Confirmar presença</a>
                                                <p class="card-text"><small class="text-medium-emphasis">Last updated 3
                                                        mins ago</small></p>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- /.row-->
        </div>
        </div>
    @endsection

    @section('javascript')

    @endsection
@else
    @include('errors.redirecionar')
@endif

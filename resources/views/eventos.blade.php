@if ($appPermissao->home_dados == true)
    @extends('layouts.base')
    @section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4><strong>Eventos</strong></h4>
            </div>
                                        @if (!$eventos->isEmpty())
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
                                        @else
                                        <div class="container-fluid">
                                            <div class="fade-in">
                                            Nenhum evento publicado até o momento.
                                            </div>
                                        </div>
                                        @endif
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

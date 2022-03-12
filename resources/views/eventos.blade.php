@if ($appPermissao->home_dados == true)
    @extends('layouts.base')
    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h4><strong>Eventos Pendentes</strong></h4>
                        </div>
                        @if (!$eventos->isEmpty())
                            @foreach ($eventos as $eventos)
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $eventos->title }}</h5>
                                        <p class="card-text"><strong>Periodo</strong> entre
                                            {{ datalimpa($eventos->start) }} e
                                            {{ datalimpa($eventos->end) }}
                                            <strong>Horário:</strong> {{ hora($eventos->hora_inicio) }}
                                            às {{ hora($eventos->hora_final) }}
                                        </p>
                                        <p class="card-text">Requer Aprovação: @if ($eventos->requer_aprovacao == true)
                                                Sim
                                            @else
                                                Não
                                            @endif
                                        </p>
                                        <form method="POST" action="{{ route('calendar.storeConfirm', $eventos->id) }}">
                                            @csrf
                                            <button class="btn btn-sm btn-success" type="submit">Confirmar
                                                presença</button>
                                        </form>
                                        <p class="card-text"><small class="text-medium-emphasis">
                                                Cadastrado em {{ datarecente($eventos->created_at) }}
                                            </small></p>
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


                <div class="col-sm-12 col-md-12 col-lg-8 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h4><strong>Eventos Confirmados</strong></h4>
                        </div>
                        @foreach ($eventos_confirm as $eventos_confirm)
                            <div class="col-md-12">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $eventos_confirm->eventoorigem->title }}</h5>
                                    <p class="card-text"><strong>Periodo</strong> entre
                                        {{ datalimpa($eventos_confirm->eventoorigem->start) }} e
                                        {{ datalimpa($eventos_confirm->eventoorigem->end) }}
                                        <strong>Horário:</strong> {{ hora($eventos_confirm->eventoorigem->hora_inicio) }}
                                        às {{ hora($eventos_confirm->eventoorigem->hora_final) }}
                                    </p>
                                    <p class="card-text"><strong>Status:</strong>
                                        @if ($eventos_confirm->aprovado == true)
                                            Aprovado
                                        @else
                                            Não aprovado
                                        @endif
                                    </p>
                                    @if ($eventos_confirm->eventoorigem->status == true)
                                        <form method="POST"
                                            action="{{ route('calendar.storeRemove', $eventos_confirm->id) }}">
                                            @csrf
                                            <button class="btn btn-sm btn-danger" type="submit">Retirar
                                                presença</button>
                                        </form>
                                    @endif
                                    <p class="card-text"><small class="text-medium-emphasis">Confirmado em
                                            {{ datarecente($eventos_confirm->created_at) }}
                                        </small></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('javascript')
    @endsection
@else
    @include('errors.redirecionar')
@endif

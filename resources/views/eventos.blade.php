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
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $eventos->title }}</h5>
                                        <p class="card-text">Data Inicio: {{ $eventos->start }}<br> Data Fim:
                                            {{ $eventos->end }}</p>
                                        <form method="POST" action="{{ route('calendar.storeConfirm', $eventos->id) }}">
                                            @csrf
                                            <button class="btn btn-sm btn-success" type="submit">Confirmar
                                                presença</button>
                                        </form>
                                        <p class="card-text"><small class="text-medium-emphasis">Ultima
                                                atualização
                                                :@php
                                                    
                                                    $dateTime1 = new DateTime($eventos->created_at);
                                                    $dateTime2 = new DateTime();
                                                    $interval = $dateTime1->diff($dateTime2);
                                                    if ($interval->format('%y') > 0) {
                                                        if ($dateTime2 >= $interval->format('%y')) {
                                                            echo $interval->format('%y anos') . PHP_EOL;
                                                        }
                                                    }
                                                    if ($interval->format('%m') > 0) {
                                                        if ($dateTime2 >= $interval->format('%m')) {
                                                            echo $interval->format('%m meses') . PHP_EOL;
                                                        }
                                                    } else {
                                                        if ($interval->format('%d') > 0) {
                                                            if ($dateTime2 >= $interval->format('%d')) {
                                                                echo $interval->format('%d dias') . PHP_EOL;
                                                            }
                                                        } else {
                                                            if ($dateTime2 >= $interval->format('%h')) {
                                                                if ($dateTime2 >= $interval->format('%h')) {
                                                                    echo $interval->format('%h horas') . PHP_EOL;
                                                                }
                                                                if ($dateTime2 >= $interval->format('%i')) {
                                                                    echo $interval->format('%i minutos') . PHP_EOL;
                                                                }
                                                                if ($dateTime2 >= $interval->format('%s')) {
                                                                    echo $interval->format('%s segundos') . PHP_EOL;
                                                                }
                                                            }
                                                        }
                                                    }
                                                    
                                                @endphp</small></p>
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
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $eventos_confirm->eventoorigem->title }}</h5>
                                    <p class="card-text">Data Inicio: {{ $eventos_confirm->eventoorigem->start }}<br>
                                        Data Fim:
                                        {{ $eventos_confirm->eventoorigem->end }}</p>
                                    @if ($eventos_confirm->eventoorigem->status == true)
                                        <form method="POST"
                                            action="{{ route('calendar.storeRemove', $eventos_confirm->id) }}">
                                            @csrf
                                            <button class="btn btn-sm btn-danger" type="submit">Retirar
                                                presença</button>
                                        </form>
                                    @endif
                                    <p class="card-text"><small class="text-medium-emphasis">Confirmado em
                                            @php
                                                
                                                $dateTime1 = new DateTime($eventos_confirm->created_at);
                                                $dateTime2 = new DateTime();
                                                $interval = $dateTime1->diff($dateTime2);
                                                if ($interval->format('%y') > 0) {
                                                    if ($dateTime2 >= $interval->format('%y')) {
                                                        echo $interval->format('%y anos') . PHP_EOL;
                                                    }
                                                }
                                                if ($interval->format('%m') > 0) {
                                                    if ($dateTime2 >= $interval->format('%m')) {
                                                        echo $interval->format('%m meses') . PHP_EOL;
                                                    }
                                                } else {
                                                    if ($interval->format('%d') > 0) {
                                                        if ($dateTime2 >= $interval->format('%d')) {
                                                            echo $interval->format('%d dias') . PHP_EOL;
                                                        }
                                                    } else {
                                                        if ($dateTime2 >= $interval->format('%h')) {
                                                            if ($dateTime2 >= $interval->format('%h')) {
                                                                echo $interval->format('%h horas') . PHP_EOL;
                                                            }
                                                            if ($dateTime2 >= $interval->format('%i')) {
                                                                echo $interval->format('%i minutos') . PHP_EOL;
                                                            }
                                                            if ($dateTime2 >= $interval->format('%s')) {
                                                                echo $interval->format('%s segundos') . PHP_EOL;
                                                            }
                                                        }
                                                    }
                                                }
                                                
                                            @endphp</small></p>
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

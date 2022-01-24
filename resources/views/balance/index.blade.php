@if ($appPermissao->view_financial == true)
@extends('layouts.base')
@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">
                    <div class="form-groups row">
                        <div class="col-sm-2 col-md-2 col-lg-4 col-xl-10">
                                <h4>Financeiro</h4>
                            
                            <div class="card-body">
                                <div class="form-group row">

                                    <div class="col-sm-5 col-md-7 col-lg-7 col-xl-7">

                                        <div class="inner">

                                            <h3><i class="c-icon c-icon-2xl cil-cash text-dark"></i> {{ $appSystem->currency }} {{ $amount }}
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="col-sm-8 col-md-5 col-lg-5 col-xl-5">
                                        <div class="box-header">
                                            @if ($appPermissao->add_entrada_financial == true)
                                                <a href="{{ route('balance.depositar') }}"
                                                    class="btn btn-success"><i class="c-icon c-icon-sm cil-plus"></i> Entrada</a>
                                            @endif
                                            @if ($appPermissao->add_retirada_financial == true)
                                                @if ($amount > 1)
                                                    <a href="{{ route('balance.withdraw') }}"
                                                        class="btn btn-danger"><i class="c-icon c-icon-sm cil-minus"></i> Retirada</a>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <table class="table table-responsive-sm table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 35px">Recibo</th>
                                                <th style="width: 120px">Movimentação</th>
                                                <th>Valor</th>
                                                <th>Tipo</th>
                                                <th>Forma de Pagamento</th>
                                                <th>Pessoa</th>
                                                <th>Observação</th>
                                                <th style="width: 80px">Data</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($historics as $historic)
                                                <tr>
                                                    <td>{{ $historic->id }}</td>
                                                    <td>{{ $historic->type($historic->type) }}</td>
                                                    <td>{{ $appSystem->currency }} {{ number_format($historic->amount), 2, '.', ',' }}</td>
                                                    <td>
                                                        @if ($historic->tipo)
                                                            <span class="{{ $historic->status->class }}">
                                                                {{ $historic->status->name }}
                                                            </span>
                                                        @else
                                                            - - -
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($historic->pag)
                                                            <span class="{{ $historic->statuspag->class }}">
                                                                {{ $historic->statuspag->name }}
                                                            </span>
                                                        @else
                                                            - - -
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($historic->user_id_transaction)
                                                            @if ($historic->userSender !== null)
                                                                {{ $historic->userSender->name }}
                                                            @else
                                                                Pessoa removida
                                                            @endif
                                                        @else
                                                            - - -
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($historic->observacao)
                                                            {{ $historic->observacao }}
                                                        @else
                                                            - - -
                                                        @endif
                                                    </td>
                                                    <td>{{ $historic->date }}</td>
                                                </tr>
                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                                    @if (isset($dataForm))
                                        {!! $historics->appends($dataForm)->links() !!}
                                    @else
                                    <div class="col-sm-8 col-md-4 col-lg-4 col-xl-4">
                                        <div class="box-header">
                                            <a href="{{ url('historic') }}"
                                                class="btn btn-primary"><i class="c-icon c-icon-sm cil-list"></i> Ver Histórico</a>
                                        </div>
                                    </div>
                                    @endif
                            <!-- /.row-->
                    </div>
                    <!-- /.row-->
                </div>
            </div>
        @stop
        @else
        @include('errors.redirecionar')
        @endif
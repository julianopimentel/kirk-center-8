@if ($appPermissao->report_view and $appPermissao->view_financial == true)
@extends('layouts.base')
@section('content')

    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                            <div class="card-header">
                                <div class="form-groups row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h5>Historico Financeiro</h5>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('financialrep.search') }}" method="POST" class="form form-inline">
                                {!! csrf_field() !!}
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-md-2">
                                            <strong>Data de movimentação</strong>
                                        </div>
                                        De:
                                        <div class="col-sm-5 col-md-3 col-lg-3 col-xl-3">
                                            <div class="inner">
                                                <input type="date" name="datefrom" class="form-control" required>
                                            </div>
                                        </div>
                                        Até:
                                        <div class="col-sm-5 col-md-3 col-lg-3 col-xl-3">
                                            <div class="inner">
                                                <input type="date" name="dateto" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-1">
                                            <strong>Tipo</strong>
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-2">
                                            Movimentação
                                            <div class="inner">
                                                <select name="type" class="form-control">
                                                    <option value="">Selecionar</option>
                                                    @foreach ($types as $key => $type)
                                                        <option value="{{ $key }}">{{ $type }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-2">
                                            Tipo
                                            <div class="inner">
                                                <select class="form-control" id="tipo" name="tipo">
                                                    <option value="">Selecionar</option>
                                                    @foreach ($statusfinan as $statusfinan)
                                                        <option value="{{ $statusfinan->id }}">
                                                            {{ $statusfinan->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-2">
                                            Pagamento
                                            <div class="inner">
                                                <select class="form-control" id="pag" name="pag">
                                                    <option value="">Selecionar</option>
                                                    @foreach ($statuspag as $statuspags)
                                                        <option value="{{ $statuspags->id }}">
                                                            {{ $statuspags->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 col-md-2 col-lg-2 col-xl-1">
                                            <div class="box-header">
                                                <button type="submit" class="btn btn-primary" title="Pesquisar"><i
                                                    class="c-icon c-icon-sm cil-zoom"></i></button>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 col-md-2 col-lg-2 col-xl-1">
                                            <div class="box-header">
                                                <a href="{{ url('/report/financial') }}"
                                                    class="btn btn-danger" title="Limpar"><i
                                                    class="c-icon c-icon-sm cil-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="box-body">
                                @if (!$historics->isEmpty())
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
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($historics as $historic)
                                                <tr>
                                                    <td>{{ $historic->id }}</td>
                                                    <td>{{ $historic->type($historic->type) }}</td>
                                                    <td>R$ {{ number_format($historic->amount), 2, '.', ',' }}</td>
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
                                                    <td width="1%">
                                                        @if ($appPermissao->view_financial == true)
                                                            <a href="{{ route('transaction.show' , $historic->id) }}"><i
                                                                    class="c-icon c-icon-sm cil-notes text-primary"></i></a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                            @endforelse
                                        </tbody>
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Total:</th>
                                                <th>R$ {{ number_format($total_preco), 2, '.', ',' }}</th>
                                                <th></th>
                                                <th>Total Entrada:</th>
                                                <th>R$ {{ number_format($total_entrada), 2, '.', ',' }}</th>
                                                <th>Total Saida:</th>
                                                <th>R$ {{ number_format($total_saida), 2, '.', ',' }}</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                    </table>
                                    @if (isset($dataForm))
                                        {!! $historics->appends($dataForm)->links() !!}
                                    @else
                                        {!! $historics->links() !!}
                                    @endif
                            </div>
                        @else
                            @endif
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
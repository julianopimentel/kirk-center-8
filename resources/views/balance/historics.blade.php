@if ($appPermissao->view_financial == true)
@extends('layouts.base')
@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="container">
                            <div class="card-header">
                                <form action="{{ route('historic.search') }}" method="POST" class="form form-inline">
                                    {!! csrf_field() !!}
                                    
                                        <strong>Recibo</strong>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-sm-5 col-md-3 col-lg-3 col-xl-2">
                                                <div class="inner">
                                                    <input type="number" name="id" class="form-control"
                                                        placeholder="1000">
                                                </div>
                                            </div>
                                            <div class="col-sm-5 col-md-3 col-lg-3 col-xl-3">
                                                <div class="inner">
                                                    <input type="date" name="datefrom" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-5 col-md-3 col-lg-3 col-xl-3">
                                                <div class="inner">
                                                    <input type="date" name="dateto" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-8 col-md-4 col-lg-4 col-xl-1">
                                                <div class="box-header">
                                                    <button type="submit" class="btn btn-success" title="Pesquisar"><i class="c-icon c-icon-sm cil-search"></i></button>
                                                </div>
                                            </div>
                                            <div class="col-sm-8 col-md-4 col-lg-4 col-xl-1">
                                                <div class="box-header">
                                                    <a href="{{ url('historic') }}"
                                                        class="btn btn-danger" title="Limpar"><i class="c-icon c-icon-sm cil-trash"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-sm-8 col-md-4 col-lg-4 col-xl-1">
                                                <div class="box-header">
                                                    <a href="{{ url('financial') }}"
                                                        class="btn btn-primary" title="Voltar"><i class="c-icon c-icon-sm cil-action-undo"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--
                                            <div class="form-group row">
                                                <div class="col-md-1">
                                                <strong>Tipo</strong> 
                                                </div>Movimentação:
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-2">
                                                    <div class="inner">
                                                        <select name="type" class="form-control">
                                                            <option value="">Selecionar</option>
                                                            @foreach ($types as $key => $type)
                                                                <option value="{{ $key }}">{{ $type }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                Tipo
                                                <div class="col-md-2">
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
                                                Forma de pagamento
                                                <div class="col-md-2">
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
                                                <div class="col-sm-8 col-md-4 col-lg-4 col-xl-1">
                                                    <div class="box-header">
                                                        <a href="{{ url('historic') }}"
                                                        class="btn btn-danger">{{ __('Limpar') }}</a>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8 col-md-4 col-lg-4 col-xl-1">
                                                    <div class="box-header">
                                                        <a href="{{ url('financial') }}"
                                                        class="btn btn-dark">{{ __('Voltar') }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        -->
                            </div>
                            </form>
                        </div>
                        <div class="box-body">
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
                                            <td width="1%">
                                                @if ($appPermissao->view_financial == true)
                                                    <a href="{{ url('/financial/' . $historic->id) }}"><i
                                                            class="c-icon c-icon-sm cil-notes text-primary"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                            @if (isset($dataForm))
                                {!! $historics->appends($dataForm)->links() !!}
                            @else
                                {!! $historics->links() !!}
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /.row-->
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
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

                                                <h3><i class="c-icon c-icon-2xl cil-cash text-dark"></i>
                                                    {{ $appSystem->currency }} {{ $amount }}
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="col-sm-8 col-md-5 col-lg-5 col-xl-5">
                                            <div class="box-header">
                                                @if ($appPermissao->add_entrada_financial == true)
                                                    <a href="{{ route('balance.depositar') }}" class="btn btn-success"><i
                                                            class="c-icon c-icon-sm cil-plus"></i> Entrada</a>
                                                @endif
                                                @if ($appPermissao->add_retirada_financial == true)
                                                    @if ($amount > 1)
                                                        <a href="{{ route('balance.withdraw') }}"
                                                            class="btn btn-danger"><i
                                                                class="c-icon c-icon-sm cil-minus"></i> Retirada</a>
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
                                            <td>{{ $appSystem->currency }}
                                                {{ number_format($historic->amount), 2, '.', ',' }}</td>
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
                                        <a href="{{ url('historic') }}" class="btn btn-primary"><i
                                                class="c-icon c-icon-sm cil-list"></i> Ver Histórico</a>
                                    </div>
                                </div>
                            @endif
                            <!-- /.row-->
                        </div>
                        <!-- /.row-->
                    </div>
                </div>

                @if (!empty($_GET['month']) && !empty($_GET['year']))
                    @php
                        $month = $_GET['month'];
                        $year = $_GET['year'];
                    @endphp
                @else
                    @php
                        $month = date('m');
                        $year = date('Y');
                    @endphp
                @endif

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            @include('balance.messages')

                            <!-- Dashboard -->
                            <div class="card">
                                <div class="card-header text-center">
                                    <strong>{{ translatedMonth($month) }} - {{ $year }}</strong>
                                </div>

                                <!-- Options -->
                                <div class="card-body">
                                    <div class="d-flex justify-content-between flex-wrap d-print-none">
                                        <div class="mb-3">
                                            <button class="btn btn-primary" type="submit" data-toggle="modal"
                                                data-target="#storeCategory">Categoria</button>
                                            <button class="btn btn-primary" type="submit" data-toggle="modal"
                                                data-target="#storeTransaction">Transação</button>
                                        </div>

                                        <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                            <button class="btn btn-sm btn-secondary"
                                                onclick="document.title='relatorio_{{ $month }}_{{ $year }}';window.print()">Imprimir
                                                relatório</button>
                                        </div>
                                    </div>

                                    <!-- Dashboard Navigation -->
                                    <div class="d-flex justify-content-between flex-wrap d-print-none">
                                        <div class="form-group">
                                            <select class="form-control" name="year"
                                                onchange="location.replace('?month={{ str_pad($month, 2, 0, STR_PAD_LEFT) }}&year='+this.value)">
                                                <option value="none" selected disabled hidden>{{ date('Y') }}</option>
                                                @for ($y = 2020; $y <= 2030; $y++)
                                                    <option value="{{ $y == $year ? old('y') : $y }}"
                                                        {{ $y == $year ? 'selected' : '' }}>{{ $y }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>

                                        <div>
                                            <ul class="nav nav-tabs" role="tablist">
                                                @for ($m = 1; $m <= 12; $m++)
                                                    <li class="nav-item">
                                                        <a href="?month={{ str_pad($m, 2, 0, STR_PAD_LEFT) }}&year={{ $year ?? '' }}"
                                                            class="nav-link text-primary {{ $m == $month ? 'active' : '' }}">{{ substr(translatedMonth($m), 0, 3) }}</a>
                                                    </li>
                                                @endfor
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- Content -->
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active">
                                            <div class="row mt-2 d-print-none">
                                                <div class="col-sm-4 my-2">
                                                    <div class="card">
                                                        <div class="card-header text-center">
                                                            <strong>Balanço mensal</strong>
                                                        </div>
                                                        <div class="card-body">
                                                            <p class="card-text text-success">Receita:
                                                                {{ formattedMoney($month_one) }}</p>
                                                            <p class="card-text text-danger">Despesa:
                                                                {{ formattedMoney($month_zero) }}</p>
                                                        </div>
                                                        <div class="card-footer">
                                                            <strong
                                                                class="{{ $month_one - $month_zero >= 0 ? 'text-success' : 'text-danger' }}">Total:
                                                                {{ formattedMoney($month_one - $month_zero) }}</strong>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-4 my-2">
                                                    <div class="card">
                                                        <div class="card-header text-center">
                                                            <strong>Balanço anual</strong>
                                                        </div>
                                                        <div class="card-body">
                                                            <p class="card-text text-success">Receita:
                                                                {{ formattedMoney($year_one) }}</p>
                                                            <p class="card-text text-danger">Despesa:
                                                                {{ formattedMoney($year_zero) }}</p>
                                                        </div>
                                                        <div class="card-footer">
                                                            <strong
                                                                class="{{ $year_one - $year_zero >= 0 ? 'text-success' : 'text-danger' }}">Total:
                                                                {{ formattedMoney($year_one - $year_zero) }}</strong>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-4 my-2">
                                                    <div class="card">
                                                        <div class="card-header text-center">
                                                            <strong>Balanço geral</strong>
                                                        </div>
                                                        <div class="card-body">
                                                            <p class="card-text text-success">Receita:
                                                                {{ formattedMoney($all_one) }}</p>
                                                            <p class="card-text text-danger">Despesa:
                                                                {{ formattedMoney($all_zero) }}</p>
                                                        </div>
                                                        <div class="card-footer">
                                                            <strong
                                                                class="{{ $all_one - $all_zero >= 0 ? 'text-success' : 'text-danger' }}">Total:
                                                                {{ formattedMoney($all_one - $all_zero) }}</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Content table-->
                                            <div class="table-responsive mt-4">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Data</th>
                                                            <th scope="col">Transação</th>
                                                            <th scope="col">Categoria</th>
                                                            <th scope="col" class="text-right">Valor</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($transactions as $transaction)
                                                            <tr>
                                                                <td>{{ date('d/m/Y', strtotime($transaction->date)) }}
                                                                </td>
                                                                <td>
                                                                    <a href="" target="_blank" data-toggle="modal"
                                                                        data-target="#updateTransaction{{ $transaction->id }}">{{ $transaction->description }}</a>
                                                                    @include('modals.update-transaction')
                                                                </td>
                                                                <td>
                                                                    <a href="" target="_blank" data-toggle="modal"
                                                                        data-target="#updateCategory{{ $transaction->category->id }}">{{ $transaction->category->name }}</a>
                                                                    @include('modals.update-category')
                                                                </td>
                                                                <td class="text-right">
                                                                    <span
                                                                        class="{{ $transaction->type == 1 ? 'text-success' : 'text-danger' }}">{{ formattedMoney($transaction->value) }}</span>
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="5" class="text-center">Nenhuma transação
                                                                    encontrada...</td>
                                                            </tr>
                                                        @endforelse
                                                        <tr
                                                            class="table-secondary {{ $month_one - $month_zero >= 0 ? 'text-success' : 'text-danger' }}">
                                                            <td colspan="3">
                                                                <strong>Total do mês</strong>
                                                            </td>
                                                            <td colspan="4" class="text-right">
                                                                <strong>{{ formattedMoney($month_one - $month_zero) }}</strong>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-right">
                                        <span>Por <a href="https://www.diegovernan.com.br" target="_blank"
                                                class="text-primary">Diego Vernan</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @stop
        @else
            @include('errors.redirecionar')
@endif

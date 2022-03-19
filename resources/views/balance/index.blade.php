@if ($appPermissao->view_financial == true)
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
    
    @extends('layouts.base')
    @section('content')
        <div class="container-fluid">
            <div class="fade-in">
                <div class="card">
                    @include('balance.messages')

                    <div class="card-header text-center">
                        <strong>{{ translatedMonth($month) }} - {{ $year }}</strong>
                    </div>

                    <!-- Options -->
                    <div class="card-body">
                        <div class="d-flex justify-content-between flex-wrap d-print-none">
                            <div class="mb-3">
                                @if ($appPermissao->add_entrada_financial == true)
                                    <button class="btn btn-success" type="submit" data-toggle="modal"
                                        data-target="#storeTransactionEntrada"><i
                                                class="c-icon c-icon-sm cil-plus"></i> Entrada</button>
                                                @include('balance.depositar')
                                @endif
                                @if ($appPermissao->add_retirada_financial == true)
                                    @if ($amount > 1)
                                    <button class="btn btn-danger" type="submit" data-toggle="modal" data-target="#storeTransaction"><i
                                        class="c-icon c-icon-sm cil-minus"></i> Retirada</button>
                                    @include('balance.withdraw')
                                    @endif
                                @endif
                            </div>

                            <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                <button class="btn btn-sm btn-secondary"
                                    onclick="document.title='relatorio_{{ $month }}_{{ $year }}';window.print()"> <i class="fas fa-print"></i> Imprimir
                                    </button>
                            </div>
                        </div>

                        <!-- Dashboard Navigation -->
                        <div class="d-flex justify-content-between flex-wrap d-print-none">
                            <div class="form-group">
                                <select class="form-control" name="year"
                                    onchange="location.replace('{{ route('transaction.index') }}?month={{ str_pad($month, 2, 0, STR_PAD_LEFT) }}&year='+this.value)">
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
                                            <a href="{{ route('transaction.index') }}?month={{ str_pad($m, 2, 0, STR_PAD_LEFT) }}&year={{ $year ?? '' }}"
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
                                                    {{ $appSystem->currency }} {{ formattedMoney($month_one) }}</p>
                                                <p class="card-text text-danger">Despesa:
                                                    {{ $appSystem->currency }} {{ formattedMoney($month_zero) }}</p>
                                            </div>
                                            <div class="card-footer">
                                                <strong
                                                    class="{{ $month_one - $month_zero >= 0 ? 'text-success' : 'text-danger' }}">Total:
                                                    {{ $appSystem->currency }} {{ formattedMoney($month_one - $month_zero) }}</strong>
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
                                                    {{ $appSystem->currency }} {{ formattedMoney($year_one) }}</p>
                                                <p class="card-text text-danger">Despesa:
                                                    {{ $appSystem->currency }} {{ formattedMoney($year_zero) }}</p>
                                            </div>
                                            <div class="card-footer">
                                                <strong
                                                    class="{{ $year_one - $year_zero >= 0 ? 'text-success' : 'text-danger' }}">Total:
                                                    {{ $appSystem->currency }} {{ formattedMoney($year_one - $year_zero) }}</strong>
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
                                                    {{ $appSystem->currency }} {{ formattedMoney($all_one) }}</p>
                                                <p class="card-text text-danger">Despesa:
                                                    {{ $appSystem->currency }} {{ formattedMoney($all_zero) }}</p>
                                            </div>
                                            <div class="card-footer">
                                                <strong
                                                    class="{{ $all_one - $all_zero >= 0 ? 'text-success' : 'text-danger' }}">Total: {{ $appSystem->currency }}
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
                                                <th style="width: 120px">Transação</th>
                                                <th scope="col">Categoria</th>
                                                <th>Forma de Pagamento</th>
                                                <th>Pessoa</th>
                                                <th>Observação</th>
                                                <th scope="col" class="text-right">Valor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($transactions as $transaction)
                                                <tr>
                                                    <td>{{ $transaction->date }}</td>
                                                    <td>{{ $transaction->type($transaction->type) }}</td>
                                                    <td>
                                                        @if ($transaction->tipo)
                                                            <span class="{{ $transaction->status->class }}">
                                                                {{ $transaction->status->name }}
                                                            </span>
                                                        @else
                                                            - - -
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($transaction->pag)
                                                            <span class="{{ $transaction->statuspag->class }}">
                                                                {{ $transaction->statuspag->name }}
                                                            </span>
                                                        @else
                                                            - - -
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($transaction->user_id_transaction)
                                                            @if ($transaction->userSender !== null)
                                                                {{ $transaction->userSender->name }}
                                                            @else
                                                                Pessoa removida
                                                            @endif
                                                        @else
                                                            - - -
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($transaction->observacao)
                                                            {{ $transaction->observacao }}
                                                        @else
                                                            - - -
                                                        @endif
                                                    </td>
                                                    <td class="text-right">
                                                        <span
                                                            class="{{ $transaction->type == 'I' ? 'text-success' : 'text-danger' }}">{{ $appSystem->currency }} {{ formattedMoney($transaction->amount) }}</span>
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
                                                <td colspan="4">
                                                    <strong>Total do mês</strong>
                                                </td>
                                                <td colspan="4" class="text-right">
                                                    <strong>{{ $appSystem->currency }} {{ formattedMoney($month_one - $month_zero) }}</strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery('.money').mask("#0,00", {
                    reverse: true
                });
            });
        </script>
    @stop
@else
    @include('errors.redirecionar')
@endif

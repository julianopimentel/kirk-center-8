@if ($appPermissao->view_financial == true)
    @extends('layouts.base')
    @section('content')
        <div class="container-fluid">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

                        <div class="invoice">
                            <div class="invoice-print">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="invoice-title">
                                            <h2>Invoice</h2>
                                            <div class="text-right">Recibo #{{ $historics->id }}</div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <address>
                                                    <strong>Destino:</strong><br>
                                                    {{ $account->name_company }}<br>
                                                    @if ($account->address1 != null)
                                                        {{ $account->address1 }}<br>
                                                    @endif
                                                    @if ($account->cep != null)
                                                        {{ $account->cep }}<br>
                                                    @endif
                                                    @if ($account->city && $account->state != null)
                                                        {{ $account->city }} / {{ $account->state }}
                                                    @elseif($account->city != null)
                                                        {{ $account->city }}
                                                    @elseif($account->state != null)
                                                        {{ $account->state }}
                                                    @elseif($account->country != null)
                                                        {{ $account->country }}
                                                    @endif
                                                </address>
                                            </div>
                                            @if ($people !== null)
                                                <div class="col-md-6 text-md-right">
                                                    <address>
                                                        <strong>Enviado por:</strong><br>
                                                        {{ $people->name }}<br>
                                                        {{ $people->email }}<br>
                                                        {{ $people->mobile }}<br>
                                                        {{ $people->address }} CEP: {{ $people->cep }}<br>
                                                        @if ($people->city && $people->state != null)
                                                            {{ $people->city }} / {{ $people->state }}
                                                        @elseif($people->city != null)
                                                            {{ $people->city }}
                                                        @elseif($people->state != null)
                                                            {{ $people->state }}
                                                        @elseif($people->country != null)
                                                            {{ $people->country }}
                                                        @endif
                                                    </address>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <address>
                                                    <strong>Método de pagamento:</strong><br>
                                                    Tipo: {{ $statusfinan->name }}<br>
                                                    @if ($people !== null)
                                                        Forma de pagamento: {{ $statuspag->name }}
                                                    @endif
                                                </address>
                                            </div>
                                            <div class="col-md-6 text-md-right">
                                                <address>
                                                    <strong>Date de lançamento:</strong><br>
                                                    {{ $historics->date }}<br>
                                                    <br>
                                                </address>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @php
                                    $products = json_decode($historics->itens);
                                @endphp

                                @if (!$listar == null)
                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                            <div class="section-title"><strong>Resumo</strong></div>
                                            <p class="section-lead">Todos os itens aqui não podem ser excluídos..</p>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-md">
                                                    <tr>
                                                        <th>Item</th>
                                                        <th class="text-center">Valor</th>
                                                        <th class="text-center">Quatidade</th>
                                                        <th class="text-right">Taxa</th>
                                                        <th class="text-right">Total</th>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            @forelse ($products->item as $user)
                                                                {{ $user }} <br>
                                                            @empty
                                                            @endforelse
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $appSystem->currency }}
                                                            @forelse ($products->quantity as $user)
                                                                {{ $user }} <br>
                                                            @empty
                                                            @endforelse
                                                        </td>
                                                        <td class="text-center">
                                                            @forelse ($products->price as $user)
                                                                {{ $user }} <br>
                                                            @empty
                                                            @endforelse
                                                        </td>
                                                        <td class="text-right">
                                                            {{ $appSystem->currency }}
                                                            @forelse ($products->tax as $user)
                                                                {{ $user }} <br>
                                                            @empty
                                                            @endforelse
                                                        </td>
                                                        <td class="text-right">
                                                            {{ $appSystem->currency }}
                                                            @forelse ($products->total as $user)
                                                                {{ $user }} <br>
                                                            @empty
                                                            @endforelse
                                                        </td>
                                                    </tr>
                                                </table>
                                            @else
                                            <div class="row mt-4">
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                @endif
                            </div>
                            <div class="row mt-6">
                                <div class="col-lg-6">
                                    <div class="section-title"><strong>Observação do pagamento</strong></div>
                                    <p class="section-lead">{{ $historics->observacao }}</p>

                                </div>
                                <div class="col-lg-6 text-right">
                                    <hr class="mt-2 mb-2">
                                    <div class="invoice-detail-item">
                                        <div class="row">
                                            <div class="col-md-6 ml-auto float-right">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <th>Subtotal:</th>
                                                                <td>{{ $appSystem->currency }}{{ $historics->sub_total }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Taxa:</th>
                                                                <td>{{ $appSystem->currency }}{{ $historics->total_tax }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Desconto:</th>
                                                                <td>{{ $appSystem->currency }}{{ $historics->discount }}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="invoice-detail-name">Total</div>
                                        <div class="invoice-detail-value invoice-detail-value-lg">
                                            {{ $appSystem->currency }} {{ $historics->amount }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                    <button class="btn btn-warning btn-icon icon-left"
                onclick="document.title='relatorio_individual_{{ $historics->id }}_{{ date('Y-m-d') }}';window.print()"><i class="fas fa-print"></i></button>
            </div>
        </div>
        </div>
        </div>
        @if (Auth()->user()->isAdmin() == true)
            Detalhes: User: {{ $usuario->name }} / Date: {{ date('jS F, Y', strtotime($historics->created_at)) }}

        @endif
        <!-- /.row-->
        </div>
        </div>
    @endsection

    @section('javascript')

    @endsection
@else
    @include('errors.redirecionar')
@endif

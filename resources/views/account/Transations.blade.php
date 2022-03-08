@extends('layouts.baseminimal')

@section('content')
    <div class="loader loader-default is-active">
    </div>
    <div class="container-fluid">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="form-groups row">
                        <div class="col-10">
                            <h4><strong>Histórico de Pagamentos</strong></h4>
                        </div>
                        <div class="col-2">
                            <button class="btn btn-primary" type="submit" data-toggle="modal"
                                data-target="#storeAddIntegrador"><i class="c-icon c-icon-sm cil-plus"></i>
                                </button>
                                @include('account.add.addFinanceiro')
                        </div>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Integrador</th>
                            <th>Type</th>
                            <th>Quatidade</th>
                            <th>Observação</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pagamentos as $pagamento)
                            <tr>
                                <td>{{ datanormal($pagamento->created_at) }}
                                    <td>{{ $pagamento->getintegrador->name_company }} </td>
                                <td>
                                    @if ($pagamento->type == 1)
                                        Normal
                                    @endif
                                </td>
                                <td>{{ $pagamento->quantity }} </td>
                                <td>{{ $pagamento->note }} </td>
                                <td>{{ formattedMoney($pagamento->total) }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $pagamentos->links() }}
            </div>
        </div>
    </div>
@endsection

@section('javascript')
@endsection

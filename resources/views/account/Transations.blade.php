@extends('layouts.baseminimal')

@section('content')
    <div class="loader loader-default is-active"></div>
    <div class="container-fluid">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                        <h4><strong>Histórico de Pagamentos</strong></h4>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Data</th>
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
                                <td>{{ $pagamento->type }} </td>
                                <td>{{ $pagamento->quantity }} </td>
                                <td>{{ $pagamento->note }} </td>
                                <td>{{ $pagamento->total }} </td>
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

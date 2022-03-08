@if (Auth::user()->isAdmin() == true)
    @extends('layouts.baseminimal')
    @section('content')
        <div class="container-fluid">
            <div class="card">

                <div class="card-header">
                    <h4>{{ __('account.information') }}</h4>
                </div>
                <div class="row">
                    <div class="form-group col-sm-4 col-md-6 col-lg-6 col-xl-6">
                        @if (Auth::user()->license - $countinst >= 1 || Auth::user()->isAdmin() == true)
                            <a href="{{ route('account.create') }}" class="btn btn-primary m-2" title="Adicionar"> <i
                                    class="c-icon c-icon-sm cil-plus"></i></a>
                        @endif
                    </div>
                    <div class="form-group col-sm-2 col-md-2 col-lg-2 col-xl-2">
                        <label for="ccmonth">{{ __('account.license') }}</label><br>
                        <label for="ccmonth">{{ $license->license }}</label>
                    </div>
                    <div class="form-group col-sm-2 col-md-2 col-lg-2 col-xl-2">
                        <label for="ccmonth">{{ __('account.used') }}</label><br>
                        <label for="ccmonth">{{ $countinst }}</label>
                    </div>
                    <div class="form-group col-sm-2 col-md-2 col-lg-2 col-xl-2">
                        <label for="ccmonth">{{ __('account.available') }}</label><br>
                        <label for="ccmonth">{{ $license->license - $countinst }}</label>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Documento</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Usuário Responsável</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>{{ $license->doc }}</td>
                                <td>{{ $license->name_company }}</td>
                                <td>{{ $license->email }}</td>
                                <td>{{ $license->getUser->name }}</td>
                                <td>Status</td>
                            </tr>
                    </tbody>
                </table>
            </div>
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
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pagamentos as $pagamento)
                            <tr>
                                <td>
                                    {{ datanormal($pagamento->created_at) }}</td>
                                <td>
                                 @if ( $pagamento->type == 1)
                                    Normal
                                @endif
                                </td>
                                <td>{{ $pagamento->quantity }} </td>
                                <td>{{ formattedMoney($pagamento->total) }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $pagamentos->links() }}
            </div>
        @endsection

        @section('javascript')

        @endsection
    @else
        @include('errors.redirecionar')
@endif

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
                            <th>{{ __('account.doc') }}</th>
                            <th>{{ __('account.name') }}</th>
                            <th>{{ __('account.email') }}</th>
                            <th>{{ __('account.user_integrador') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>{{ $license->doc }}</td>
                                <td>{{ $license->name_company }}</td>
                                <td>{{ $license->email }}</td>
                                <td>{{ $license->getUser->name }}</td>
                            </tr>
                    </tbody>
                </table>
            </div>
            <div class="card">
                <div class="card-header">
                        <h4><strong>{{ __('account.hist_pag') }}</strong></h4>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('account.date') }}</th>
                            <th>{{ __('account.type') }}</th>
                            <th>{{ __('account.quantity') }}</th>
                            <th>{{ __('account.total') }}</th>
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
                                <td>R$ {{ formattedMoney($pagamento->total) }} </td>
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

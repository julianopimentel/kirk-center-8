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
                        <label for="ccmonth">{{ Auth::user()->license }}</label>
                    </div>
                    <div class="form-group col-sm-2 col-md-2 col-lg-2 col-xl-2">
                        <label for="ccmonth">{{ __('account.used') }}</label><br>
                        <label for="ccmonth">{{ $countinst }}</label>
                    </div>
                    <div class="form-group col-sm-2 col-md-2 col-lg-2 col-xl-2">
                        <label for="ccmonth">{{ __('account.available') }}</label><br>
                        <label for="ccmonth">{{ Auth::user()->license - $countinst }}</label>
                    </div>
                </div>
            </div>

        @endsection

        @section('javascript')

        @endsection
    @else
        @include('errors.redirecionar')
@endif

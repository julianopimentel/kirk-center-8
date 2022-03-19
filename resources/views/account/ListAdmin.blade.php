@if (Auth::user()->menuroles == 'admin')
    @extends('layouts.baseminimal')

    @section('content')
        <div class="container-fluid">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <form action="{{ route('account.search') }}" method="POST" class="form form-inline">
                                    {!! csrf_field() !!}
                                    <div class="form-group row">
                                        <div class="col-5">
                                            <h4><strong>{{ __('account.select') }}</strong></h4>
                                        </div>
                                        <div class="col-3">
                                            <div class="inner">
                                                <input type="text" id='name_company' name="name_company"
                                                    class="form-control" placeholder="Nome">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="inner">
                                                <select class="form-control" id="integrador" name="integrador">
                                                    <option value="">Integrador</option>
                                                    @foreach ($integradores as $integrador)
                                                        <option value="{{ $integrador->id }}">
                                                            {{ $integrador->name_company }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-1">
                                            <div class="box-header">
                                                <button type="submit" class="btn btn-primary" title="Pesquisar"><i
                                                        class="c-icon c-icon-sm cil-zoom"></i></button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>{{ __('account.id') }}</th>
                                            <th>{{ __('account.name') }}</th>
                                            <th>{{ __('account.integrador') }}</th>
                                            <th>{{ __('account.type') }}</th>
                                            <th colspan="3">
                                                <Center>{{ __('account.action') }}</Center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($institutions as $institution)
                                            <tr>
                                                <td width="10%">{{ $institution->id }}</td>
                                                <td width="40%">{{ $institution->name_company }} </td>
                                                <td width="40%">{{ $institution->getintegrador->name_company }} </td>
                                                <td>
                                                    <span class="{{ $institution->status->class }}">
                                                        {{ $institution->status->name }}
                                                    </span>
                                                </td>

                                                <td width="1%">
                                                    @if (Auth::user()->isAdmin())
                                                        <a href="{{ route('account.edit', $institution->id) }}"
                                                            class="btn btn-primary-outline"><i
                                                                class="c-icon c-icon-sm cil-pencil text-success"></i></a>
                                                    @endif
                                                </td>
                                                <td width="1%">
                                                    @if (Auth::user()->isAdmin())
                                                        <form action="{{ route('account.destroy', $institution->id) }}"
                                                            method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-primary-outline show_confirm"
                                                                data-toggle="tooltip" title='Delete'><i
                                                                    class="c-icon c-icon-sm cil-trash text-danger"></i></button>
                                                        </form>
                                                    @endif
                                                </td>
                                                <td width="1%">
                                                    <form method="post"
                                                        action="{{ route('tenant', ['id' => $institution->id]) }}">
                                                        @method('POST')
                                                        @csrf
                                                        <button class="btn btn-primary-outline" data-toggle="modal"
                                                            data-target=".cd-load"><i
                                                                class="c-icon c-icon-sm cil-room text-dark"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @if (isset($dataForm))
                                    {!! $institutions->appends($dataForm)->links() !!}
                                @else
                                    {!! $institutions->links() !!}
                                @endif
                            </div>
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

@extends('layouts.baseminimal')

@section('content')
    <div class="loader loader-default is-active">
    </div>
    <div class="container-fluid">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="form-group row">
                        <div class="col-9">
                            <h4>Integradores</h4>
                        </div>
                        <div class="col-2">
                            <button class="btn btn-primary" type="submit" data-toggle="modal"
                                data-target="#storeAddIntegrador"><i class="c-icon c-icon-sm cil-plus"></i>
                                </button>
                                @include('account.add.addIntegrador')
                        </div>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Documento</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Usuário Responsável</th>
                            <th>Status</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($integradores as $integrador)
                            <tr>
                                <td>{{ $integrador->doc }}</td>
                                <td>{{ $integrador->name_company }}</td>
                                <td>{{ $integrador->email }}</td>
                                <td>{{ $integrador->getUser->name }}</td>
                                <td>
                                    <span class="{{ $integrador->status->class }}">
                                        {{ $integrador->status->name }}
                                    </span>
                                </td>
                                <td>Botão de bloquear</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $integradores->links() }}
            </div>
        </div>
    </div>
@endsection

@section('javascript')
@endsection

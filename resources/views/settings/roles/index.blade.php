@if ($appPermissao->settings_roles == true)
    @extends('layouts.base')
    @section('content')
        <div class="container-fluid">
            <div class="fade-in">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Permissões</h5>
                            </div>
                            <div class="card-body">
                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-8">
                                    <div class="row">
                                        <a href="{{ route('roles.create') }}"
                                            class="btn btn-primary m-2" title="Adicionar"><i
                                            class="c-icon c-icon-sm cil-plus"></i></a>
                                    </div>
                                </div>
                                <br>
                                @if (session('message'))
                                    <div class="alert alert-warning" role="alert">
                                        {{ session('message') }}
                                    </div>
                                @endif
                                <table class="table table-striped datatable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Created at</th>
                                            <th>Updated at</th>
                                            <th colspan="3">
                                                <Center>{{ __('account.action') }}</Center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $role)
                                            <tr>
                                                <td>
                                                    {{ $role->name }}
                                                </td>
                                                <td>
                                                    {{ $role->created_at }}
                                                </td>
                                                <td>
                                                    {{ $role->updated_at }}
                                                </td>
                                                <!-- <td width="1%">
                                                <a href="{{ route('roles.show', $role->id) }}"
                                                    class="btn btn-primary-outline"><i
                                                        class="c-icon c-icon-sm cil-notes text-primary"></i></a>
                                            </td>
                                            -->
                                                <td width="1%">
                                                    <a href="{{ route('roles.edit', $role->id) }}"
                                                        class="btn btn-primary-outline"><i
                                                            class="c-icon c-icon-sm cil-pencil text-success"></i></a>
                                                </td>
                                                <td width="1%">
                                                    @if ($role->id > 4)
                                                        <form action="{{ route('roles.destroy', $role->id) }}"
                                                            method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-primary-outline show_confirm"
                                                                data-toggle="tooltip" title='Delete'><i
                                                                    class="c-icon c-icon-sm cil-trash text-danger"></i></button>
                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
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

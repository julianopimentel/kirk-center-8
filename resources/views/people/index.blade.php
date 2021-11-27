@if ($appPermissao->view_people == true)
@extends('layouts.base')
@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">
                    <div class="form-groups row">
                        <div class="col-10">
                            <h4>Pessoas</h4>
                        </div>
                        <div class="col-2">
                            @if ($appPermissao->add_people == true)
                                <div class="row">
                                    <a href="{{ route('people.create') }}"
                                        class="btn btn-primary">{{ __('Adicionar') }}</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <form action="{{ route('people.search') }}" method="POST" class="form form-inline">
                    {!! csrf_field() !!}
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-3">
                                <div class="inner">
                                    <input type="text" id='name' name="name" class="form-control" placeholder="Nome">
                                </div>
                            </div>
                            <div class="col-sm-8 col-md-2 col-lg-2 col-xl-2">
                                <div class="inner">
                                    <select class="form-control" id="statuses" name="statuses">
                                        <option value="">Status</option>
                                        @foreach ($statuses as $statuses)
                                            <option value="{{ $statuses->id }}">{{ $statuses->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-8 col-md-2 col-lg-2 col-xl-2">
                                <div class="box-header">
                                    <button type="submit" class="btn btn-primary">Pesquisar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="box-body">
                    <table class="table table-responsive-sm table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Mobile</th>
                                <th>Permissão</th>
                                <th>Status</th>
                                <th colspan="3">
                                    <Center>{{ __('account.action') }}</Center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($peoples as $people)
                                <tr>
                                    <td><strong>{{ $people->name }}</strong>
                                        @if ($people->is_verify == false)
                                            <span class="badge badge-danger">NEW</span>
                                        @endif
                                    </td>
                                    <td>{{ $people->email }}</td>
                                    <td>{{ $people->mobile }}</td>
                                    <td>{{ $people->roleslocal->name }}</td>
                                    <td>
                                        <span class="{{ $people->status->class }}">
                                            {{ $people->status->name }}
                                        </span>
                                    </td>
                                    <td width="1%">
                                        @if ($appPermissao->view_people == true)
                                            <a href="{{ route('people.show', $people->id) }}"><i
                                                    class="c-icon c-icon-sm cil-notes text-primary"></i></a>
                                        @endif
                                    </td>
                                    <td width="1%">
                                        @if ($appPermissao->edit_people == true)

                                            <a href="{{ route('people.edit', $people->id) }}"><i
                                                    class="c-icon c-icon-sm cil-pencil text-success"></i></a>

                                        @endif
                                    </td>
                                    <td width="1%">
                                        @if ($appPermissao->delete_people == true)

                                            @if ($people->user_id)
                                                <form
                                                    action="{{ url('people/' . $people->id . '/' . $people->user_id) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <a class="show_confirm" data-toggle="tooltip" title='Delete'><i
                                                            class="c-icon c-icon-sm cil-trash text-danger"></i></a>
                                                </form>
                                            @elseif ($people->user_id == null)
                                                <form
                                                    action="{{ url('people/' . $people->id . '/' . ($people->user_id = 0)) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <a class="show_confirm" data-toggle="tooltip" title='Delete'><i
                                                            class="c-icon c-icon-sm cil-trash text-danger"></i></a>
                                                </form>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                    @if (isset($dataForm))
                        {!! $peoples->appends($dataForm)->links() !!}
                    @else
                        {!! $peoples->links() !!}

                    @endif
                </div>
            </div>
        </div>
        <!-- /.row-->
    </div>
    </div>
    </div>
    </div>
    <script>
        $("#name").on("input", function() {
            $(this).val($(this).val().toUpperCase());
        });
    </script>
@endsection

@section('javascript')

@endsection
@else
@include('errors.redirecionar')
@endif

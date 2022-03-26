@if ($appPermissao->view_people == true)
    @extends('layouts.base')
    @section('content')
        <div class="container-fluid">
            <div class="fade-in">
                <div class="card">
                    <div class="card-header">
                        <div class="col-sm-4 col-md-2 col-lg-2 col-xl-2">
                            <h4>{{ __('layout.people') }}</h4>
                        </div>

                        @if ($appPermissao->add_people == true)
                            <a href="{{ route('people.create') }}" class="add_button btn btn-sm btn-primary"
                                title="Adicionar"><i class="c-icon c-icon-sm cil-plus"></i>{{ __('people.people') }}</a>
                        @endif
                        <p>&nbsp;
                            <a href="{{ route('peoplevisit.create') }}" class="add_button btn btn-sm btn-dark"
                                title="Adicionar"><i class="c-icon c-icon-sm cil-plus"></i>{{ __('people.visit') }}</a>

                    </div>
                    <form action="{{ route('people.search') }}" method="POST" class="form form-inline">
                        {!! csrf_field() !!}
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-3">
                                    <div class="inner">
                                        <input type="text" id='name' name="name" class="form-control"
                                            placeholder="{{ __('people.name') }}">
                                    </div>
                                </div>
                                <div class="col-sm-8 col-md-2 col-lg-2 col-xl-2">
                                    <div class="inner">
                                        <select class="form-control" id="is_verify" name="is_verify">
                                            <option value="true">{{ __('people.people') }}</option>
                                            <option value="false">{{ __('people.visit') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-8 col-md-2 col-lg-2 col-xl-2">
                                    <div class="inner">
                                        <select class="form-control" id="statuses" name="statuses">
                                            <option value="">{{ __('people.status') }}</option>
                                            @foreach ($statuses as $statuses)
                                                <option value="{{ $statuses->id }}">{{ $statuses->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-8 col-md-2 col-lg-2 col-xl-2">
                                    <div class="box-header">
                                        <button type="submit" class="btn btn-primary" title="Pesquisar"><i
                                                class="c-icon c-icon-sm cil-zoom"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="box-body">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>{{ __('people.name') }}</th>
                                    <th>{{ __('people.email') }}</th>
                                    <th>{{ __('people.mobile') }}</th>
                                    <th>{{ __('people.role') }}</th>
                                    <th>{{ __('people.status') }}</th>
                                    <th colspan="3">
                                        <Center>{{ __('account.action') }}</Center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($peoples as $people)
                                    <tr>
                                        <td><strong>
                                                @if ($appPermissao->edit_people == true)
                                                <a href="" target="_blank" data-toggle="modal"
                                                    data-target="#ViewPeople{{ $people->id }}">{{ $people->name }}</a>
                                                @include('people.view')
                                                @else
                                                {{ $people->name }}
                                                @endif
                                            </strong>
                                            @if ($people->is_verify == false)
                                                <span class="badge badge-info"> {{ __('people.visit') }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $people->email }}</td>
                                        <td>{{ $people->phone }}</td>
                                        <td>{{ $people->roleslocal->name }}</td>
                                        <td>
                                            <span class="{{ $people->status->class }}">
                                                {{ $people->status->name }}
                                            </span>
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

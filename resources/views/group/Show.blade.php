@if ($appPermissao->view_group == true)
@extends('layouts.base')
@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-9">
                    <div class="card">
                        <div class="card-header"><h4>Pessoas nesse grupo</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive-sm table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Pessoa</th>
                                        <th>Celular</th>
                                        <th>Date registered</th>
                                        <th colspan="3">
                                            <center>Ação</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pessoasgrupos as $pessoasgrupo)
                                        <tr>
                                            <td>{{ $pessoasgrupo->usuario->name }}
                                                @if ($pessoasgrupo->usuario->id == $responsavel->id)
                                                    <span class="badge badge-info">Responsável</span>
                                                @endif
                                            </td>
                                            <td>{{ $pessoasgrupo->usuario->mobile }}</td>
                                            <td>{{ $pessoasgrupo->registered }}</td>
                                            <td width="1%">
                                                @if ($appPermissao->edit_people == true)
                                                    <a href="{{ route('people.edit', $pessoasgrupo->usuario->id) }}"><i
                                                            class="c-icon c-icon-sm cil-notes text-primary"></i></a>
                                                @endif

                                            </td>
                                            <td width="1%">
                                                @if ($appPermissao->delete_group_people == true and !($pessoasgrupo->usuario->id == $responsavel->id))
                                                    <form action="{{ url('/group/' . $pessoasgrupo->id . '/delete') }}"
                                                        method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <a class="show_confirm" data-toggle="tooltip" title='Delete'><i
                                                                class="c-icon c-icon-sm cil-trash text-danger"></i></a>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.row-->
                </div>
                {{ session(['group' => $group->id]) }}
                @if ($appPermissao->add_group_people == true)
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header"><strong>Buscar Pessoa</strong></div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('group.storepeoplegroup') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <select class="itemName form-control" id="itemName" name="itemName"
                                                required></select>
                                        </div>
                                    </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-sm btn-primary" type="submit">Adicionar</button>
                                <a href="{{ route('group.index') }}" class="btn btn-sm btn-dark">{{ __('Return') }}</a>
                            </div>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('.itemName').select2({
            placeholder: 'Select an item',

            ajax: {
                url: '/select2-autocomplete-people',
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });
    </script>

@endsection

@section('javascript')

@endsection
@else
@include('errors.redirecionar')
@endif

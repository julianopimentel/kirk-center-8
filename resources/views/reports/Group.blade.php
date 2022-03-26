@if ($appPermissao->report_view and $appPermissao->view_group == true)
@extends('layouts.base')
@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="card">
            <div class="card-header">
                <div class="form-groups row">
                    <div class="col-10">
                        <h5>Grupos</h5>
                    </div>
                    <div class="col-2">
                    </div>
                </div>
            </div>
                            <form action="{{ route('grouprep.search') }}" method="POST" class="form form-inline">
                                {!! csrf_field() !!}
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-3">
                                            <div class="inner">
                                                <input type="text" id='name' name="name" class="form-control"
                                                    placeholder="Nome">
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
                                            <th>Name</th>
                                            <th>Responsável</th>
                                            <th>Type</th>
                                            <th>Pessoas</th>
                                            <th>Status</th>
                                            <th>Note</th>
                                            <th>Dt Created</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($groups as $group)
                                            <tr>
                                                <td><strong>{{ $group->name_group }}</strong></td>
                                                <td>
                                                    @if ($group->user_id)
                                                        {{ $group->responsavel->name }}
                                                    @else
                                                        - - -
                                                    @endif
                                                </td>
                                                <td>{{ $group->type }}</td>
                                                <td>{{ $group->count }}</td>
                                                <td>
                                                    <span class="{{ $group->status->class }}">
                                                        {{ $group->status->name }}
                                                    </span>
                                                </td>
                                                <td>{{ $group->note }}</td>
                                                <td>{{ $group->created_at }}</td>
                                            </tr>
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                                @if (isset($dataForm))
                                    {!! $groups->appends($dataForm)->links() !!}
                                @else
                                    {!! $groups->links() !!}

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
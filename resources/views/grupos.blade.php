@if ($appPermissao->home_grupo == true)
    @extends('layouts.base')
    @section('content')

        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h4><strong>Meus grupos</strong></h4>
                </div>
                @if (!$groups->isEmpty())
                    <table class="table table-responsive-sm table-striped">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Tipo</th>
                                <th>Integrantes</th>
                                <th>Mensagem</th>
                                <th>Status</th>
                                <th>Chat do Grupo</th>
                            </tr>
                        </thead>
                       
 
                        <tbody>
                            @forelse($groups as $group)
                                <tr>
                                    <td><strong>{{ $group->grupo->name_group }}</strong></td>
                                    <td>{{ $group->grupo->type }}</td>
                                    <td width="1%">{{ $group->grupo->count }}</td>
                                    <td>{{ $group->grupo->note }}</td>
                                    <td>
                                        <span class="{{ $group->grupo->status->class }}">
                                            {{ $group->grupo->status->name }}
                                        </span>
                                    </td>
                                    <td width="1%">
                                        <a href="{{ route('group.edit', $group->grupo->id) }}"
                                        class="btn btn-primary-outline"><i
                                            class="c-icon c-icon-sm cil-room text-success"></i></a></td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
            </div>
        @else
            <div class="container-fluid">
                <div class="fade-in">
                    Não possuiu vinculo com grupos, fale com o administrador da conta
                </div>
            </div>
    @endif
    </div>
@endsection

@section('javascript')

@endsection
@else
@include('errors.redirecionar')
@endif

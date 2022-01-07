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
                                <th>Integrantes do grupo</th>
                                <th>Responsável</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($groups as $group)
                                <tr>
                                    <td><strong>{{ $group->grupo->name_group }}</strong></td>
                                    <td>{{ $group->grupo->type }}</td>
                                    <td>{{ $group->grupo->count }}</td>
                                </tr>
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

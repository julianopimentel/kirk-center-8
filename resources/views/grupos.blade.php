@if ($appPermissao->home_grupo == true)
@extends('layouts.base')
@section('content')

    <div class="container-fluid">
                @if (!$groups->isEmpty())
                    <div class="card">
                        <div class="card-header">
                            <h6><strong>Meus grupos</strong></h6>
                        </div>
                        <table class="table table-responsive-sm table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Pessoas</th>
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
    
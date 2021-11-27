@if ($appPermissao->home_financeiro_valores == true)
@extends('layouts.base')
@section('content')

    <div class="container-fluid">
                @if (!$dizimos->isEmpty())
                    <div class="card">
                        <div class="card-header">
                            <h6><strong>Seus valores</strong></h6>
                        </div>

                        <table class="table table-responsive-sm table-striped">
                            <thead>
                                <tr>
                                    <th>Value</th>
                                    <th>Type</th>
                                    <th>Forma de pagamento</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($dizimos as $dizimo)
                                    <tr>
                                        <td>R$ {{ $dizimo->amount }}</td>
                                        <td>{{ $dizimo->status->name }}</td>
                                        <td>
                                            <span class="{{ $dizimo->statuspag->class }}">
                                                {{ $dizimo->statuspag->name }}
                                            </span>
                                        </td>
                                        <td>{{ $dizimo->date }}</td>
                                    </tr>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                        {{ $dizimos->links() }}
                    </div>
                    @else
                    <div class="container-fluid">
                        <div class="fade-in">
                        Você ainda não possui dizimos informados ao seu usuário!
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
    
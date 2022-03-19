@if ($appPermissao->home_financeiro_valores == true)
    @extends('layouts.base')
    @section('content')
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h4><strong>Meus dízimos e ofertas</strong></h4>
                </div>
                @if (!$dizimos->isEmpty())
                    <table class="table table-responsive-sm table-striped">
                        <thead>
                            <tr>
                                <th>Valor</th>
                                <th>Tipo</th>
                                <th>Forma de pagamento</th>
                                <th>Data</th>
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
                    Você ainda não possui dízimos/ofertas associados ao seu usuário!
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

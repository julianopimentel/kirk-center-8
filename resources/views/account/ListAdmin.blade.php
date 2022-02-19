@if (Auth::user()->isAdmin() == true)
@extends('layouts.baseminimal')

@section('content')
    <div class="loader loader-default is-active"></div>
    <div class="container-fluid">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    @if (!$institutions->isEmpty())
                        <h4><strong>{{ __('account.select') }}</strong></h4>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>{{ __('account.name') }}</th>
                           
                                <th>{{ __('account.type') }}</th>
                            
                            <th colspan="3">
                                <Center>{{ __('account.action') }}</Center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($institutions as $institution)
                            <tr>
                                <td width="10%">{{ $institution->id }}</td>
                                <td width="40%">{{ $institution->name_company }} </td>
                                
                                    <td>
                                        <span class="{{ $institution->status->class }}">
                                            {{ $institution->status->name }}
                                        </span>
                                    </td>
                               
                                <td width="1%">
                                    @if ($you->id == $institution->integrador)
                                        <a href="{{ route('account.edit', $institution->id) }}"
                                            class="btn btn-primary-outline"><i
                                                class="c-icon c-icon-sm cil-pencil text-success"></i></a>
                                    @endif
                                </td>
                                <td width="1%">
                                    @if ($you->id == $institution->integrador)
                                        <form action="{{ route('account.destroy', $institution->id) }}"
                                            method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-primary-outline show_confirm" data-toggle="tooltip"
                                                title='Delete'><i
                                                    class="c-icon c-icon-sm cil-trash text-danger"></i></button>
                                        </form>
                                    @endif
                                </td>
                                <td width="1%">
                                    <form method="post"
                                        action="{{ route('tenant', ['id' => $institution->id]) }}">
                                        @method('POST')
                                        @csrf
                                        <button class="btn btn-primary-outline" data-toggle="modal"
                                            data-target=".cd-load"><i
                                                class="c-icon c-icon-sm cil-room text-dark"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $institutions->links() }}
            </div>
        </div>
    </div>
@else


    <h4><strong>Você não possui nenhum cadastro associado</strong></h4>
    </div>
    <div class="card-body">
        Seja Bem-vindo! <br>
        Gostaria de criar um pré-cadastro a sua igreja?
        <label for="ccmonth"><a href="{{ route('wizard.index') }}" class="btn btn-dark m-2">Associar</a><br>

    </div>
    @endif

    </div>
    </div>
@endsection

@section('javascript')
@endsection
@else
@include('errors.redirecionar')
@endif
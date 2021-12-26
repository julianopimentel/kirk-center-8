@if ($appPermissao->home_oracao == true)
@extends('layouts.base')
@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">
                    <div class="form-groups row">
                        <div class="col-sm-2 col-md-2 col-lg-4 col-xl-10">
                                        <h4>Pedidos de Oração</h4>
                                    </div>
                                    <div class="col-sm-2 col-md-2 col-lg-4 col-xl-2">
                                        @if ($appPermissao->add_prayer == true)

                                            <div class="row">
                                                <a href="{{ route('prayer.create') }}"
                                                    class="btn btn-primary">{{ __('Adicionar') }}</a>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>

                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>Autor</th>
                                        <th>Titulo</th>
                                        <th>Status</th>
                                        <th colspan="3">
                                            <Center>{{ __('account.action') }}</Center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prayers as $prayer)
                                        <tr>
                                            <td><strong>{{ $prayer->user->name }}</strong></td>
                                            <td><strong>{{ $prayer->title }}</strong></td>
                                            <td>
                                                <span class="{{ $prayer->status->class }}">
                                                    {{ $prayer->status->name }}
                                                </span>
                                            </td>
                                            <td width="1%">
                                                @if ($appPermissao->view_message == true)
                                                    <a href="{{ route('prayer.show', $prayer->id) }}"><i
                                                            class="c-icon c-icon-sm cil-notes text-primary"></i></a>
                                                @endif
                                            </td>
                                            <td width="1%">
                                                @if ($appPermissao->edit_prayer == true)
                                                    <a href="{{ route('prayer.edit', $prayer->id) }}"><i
                                                            class="c-icon c-icon-sm cil-pencil text-success"></i></a>
                                                @endif
                                            </td>
                                            <td width="1%">
                                                @if ($appPermissao->delete_prayer == true)
                                                    <form action="{{ route('prayer.destroy', $prayer->id) }}"
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
                            {{ $prayers->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')

@endsection

@else
@include('errors.redirecionar')
@endif
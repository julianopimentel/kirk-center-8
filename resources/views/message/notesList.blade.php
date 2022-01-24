@if ($appPermissao->view_message == true)
@extends('layouts.base')
@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">
                    <div class="form-groups row">
                        <div class="col-sm-2 col-md-2 col-lg-4 col-xl-10">
                                        <h4>Recados</h4>
                                    </div>
                                    <div class="col-sm-2 col-md-2 col-lg-4 col-xl-2">
                                        @if ($appPermissao->add_message == true)
                                        <a href="{{ route('message.create') }}" class="add_button btn btn-sm btn-primary"
                                        title="Adicionar"><i class="c-icon c-icon-sm cil-plus"></i></a>
                                        @endif

                                    </div>
                                </div>
                            </div>

                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>Autor</th>
                                        <th>Titulo</th>
                                        <th>Mensagem</th>
                                        <th>Data</th>
                                        <th>Status</th>
                                        <th colspan="3">
                                            <Center>{{ __('account.action') }}</Center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($notes as $note)
                                        <tr>
                                            <td><strong>{{ $note->user->name }}</strong></td>
                                            <td><strong>{{ $note->title }}</strong></td>
                                            <td>{{ $note->content }}</td>
                                            <td>{{ $note->applies_to_date }}</td>
                                            <td>
                                                <span class="{{ $note->status->class }}">
                                                    {{ $note->status->name }}
                                                </span>
                                            </td>
                                            <td width="1%">
                                                @if ($appPermissao->view_message == true)
                                                    <a href="{{ route('message.show', $note->id) }}"><i
                                                            class="c-icon c-icon-sm cil-notes text-primary"></i></a>
                                                @endif
                                            </td>
                                            <td width="1%">
                                                @if ($appPermissao->edit_message == true)
                                                    <a href="{{ route('message.edit', $note->id) }}"><i
                                                            class="c-icon c-icon-sm cil-pencil text-success"></i></a>
                                                @endif
                                            </td>
                                            <td width="1%">
                                                @if ($appPermissao->delete_message == true)
                                                    <form action="{{ route('message.destroy', $note->id) }}"
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
                            {{ $notes->links() }}
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
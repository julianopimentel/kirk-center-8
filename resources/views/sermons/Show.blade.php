@if ($appPermissao->view_sermons == true)
    @extends('layouts.base')
    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="p-5 card">
                        <h4>{{ $note->title }}</h4>
                        @if (!empty($note->url_video))

                            <iframe width="640" height="400" src="{{ $note->url_video }}" allowfullscreen></iframe>
                        @endif
                        <div>{{ $note->content }}</div>
                        <br>
                        <p> {{ $note->user->name }}
                            <span class="{{ $note->status->class }}">
                                {{ $note->status->name }}
                            </span>
                        </p>
                        <div class="form-group row">
                            <a class="btn btn-primary" href="{{ route('sermons.index') }}" title="Voltar"><i
                                    class="c-icon c-icon-sm cil-action-undo"></i></a>
                            @if ($appPermissao->edit_sermons == true)
                                <a class="btn btn-success" href="{{ route('sermons.edit', $note->id) }}" type="submit"
                                    title="Editar"><i class="c-icon c-icon-sm cil-pencil"></i></a>
                            @endif
                            @if ($appPermissao->delete_sermons == true)
                                <form action="{{ route('sermons.destroy', $note->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <a class="btn btn-danger show_confirm" type="submit" title="Excluir"
                                        data-toggle="tooltip" title='Delete'><i class="c-icon c-icon-sm cil-trash"></i></a>
                                </form>
                            @endif
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form method="note" action="{{ route('timeline.store', $note->id) }}">
                                @csrf
                                <div class="form-group row">
                                    <textarea class="form-control" id='comment' name="comment" rows="1"
                                        placeholder="Mensagem.."></textarea>
                                </div>
                                <button class="btn btn-sm btn-success" type="submit">Comentar</button>
                        </div>
                        </form>
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

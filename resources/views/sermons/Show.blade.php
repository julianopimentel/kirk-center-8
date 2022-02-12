@if ($appPermissao->view_sermons == true)
    @extends('layouts.base')
    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="p-5 card">
                        <h4>{{ $note->title }}</h4>
                        @if (!empty($note->url_video))
                            <div class="row">
                                <!-- NEW COLUMN WITH WIDTH TOTALLING 12 -->
                                <iframe class="col-lg-12 col-md-12 col-sm-12" width="640" height="400"
                                    src="{{ $note->url_video }}" allowfullscreen></iframe>
                            </div>
                        @endif
                        <div>{{ $note->content }}</div>
                        <br>
                        <p> {{ $note->user->name }}
                            <span class="{{ $note->status->class }}">
                                {{ $note->status->name }}
                            </span>
                        </p>
                        @php
                            
                            $dateTime1 = new DateTime($note->updated_at);
                            $dateTime2 = new DateTime();
                            $interval = $dateTime1->diff($dateTime2);
                            echo 'Publicado em ';
                            if ($interval->format('%y') > 0) {
                                if ($dateTime2 >= $interval->format('%y')) {
                                    echo $interval->format('%y anos') . PHP_EOL;
                                }
                            }
                            if ($interval->format('%m') > 0) {
                                if ($dateTime2 >= $interval->format('%m')) {
                                    echo $interval->format('%m meses') . PHP_EOL;
                                }
                            } else {
                                if ($interval->format('%d') > 0) {
                                    if ($dateTime2 >= $interval->format('%d')) {
                                        echo $interval->format('%d dias') . PHP_EOL;
                                    }
                                } else {
                                    if ($dateTime2 >= $interval->format('%h')) {
                                        if ($dateTime2 >= $interval->format('%h')) {
                                            echo $interval->format('%h horas') . PHP_EOL;
                                        }
                                        if ($dateTime2 >= $interval->format('%i')) {
                                            echo $interval->format('%i minutos') . PHP_EOL;
                                        }
                                        if ($dateTime2 >= $interval->format('%s')) {
                                            echo $interval->format('%s segundos') . PHP_EOL;
                                        }
                                    }
                                }
                            }
                            
                        @endphp
                        <br> <br> <br>
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

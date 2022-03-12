@if ($appPermissao->edit_calendar == true)
    @extends('layouts.base')
    @section('content')
        <div class="container-fluid">
            <div class="fade-in">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header"><strong>Dados do Evento</strong></div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('calender.update', $event->id) }}" role="form"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input class="form-control" type="text" placeholder="{{ __('Title') }}"
                                                    name="title" value="{{ $event->title }}" required autofocus>
                                            </div>
                                            <!-- /.row-->
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <div class="form-group">
                                                        <label for="ccnumber">Data de Inicio</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text">
                                                                    <svg class="c-icon">
                                                                        <use
                                                                            xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-calendar">
                                                                        </use>
                                                                    </svg>
                                                            </div>
                                                            <input class="form-control" id="start" name="start"
                                                                type="date" placeholder="date" value="{{ $event->start }}"
                                                                required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <div class="form-group">
                                                        <label for="ccnumber">Data de Fim</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text">
                                                                    <svg class="c-icon">
                                                                        <use
                                                                            xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-calendar">
                                                                        </use>
                                                                    </svg>
                                                            </div>
                                                            <input class="form-control" id="end" name="end" type="date"
                                                                placeholder="date" value="{{ $event->end }}" required />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-3">
                                                    <div class="form-group">
                                                        <label>
                                                            Hora Inicio</label>
                                                        <input class="form-control" type="time" id="hora_inicio"
                                                            name="hora_inicio" value="{{ hora($event->hora_inicio) }}"
                                                            pattern="[0-9]{2}:[0-9]{2}" required>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    <div class="form-group">
                                                        <label>
                                                            Hora Fim</label>
                                                        <input class="form-control" type="time" id="hora_fim"
                                                            name="hora_fim" value="{{ hora($event->hora_fim) }}"
                                                            pattern="[0-9]{2}:[0-9]{2}" required>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-2">
                                                    <div class="form-group">
                                                        <label>Ativo</label>
                                                        <div class="input-group">
                                                            <label
                                                                class="c-switch c-switch-label c-switch-pill c-switch-primary c-switch-lg">
                                                                <input class="c-switch-input" name="status" type="checkbox"
                                                                    {{ $event->status == true ? 'checked' : '' }}><span
                                                                    class="c-switch-slider" data-checked="&#x2713"
                                                                    data-unchecked="&#x2715"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <div class="form-group">
                                                        <label>Requer
                                                            aprovação</label>
                                                        <div class="input-group">
                                                            <label
                                                                class="c-switch c-switch-label c-switch-pill c-switch-primary c-switch-lg">
                                                                <input class="c-switch-input" name="requer_aprovacao"
                                                                    type="checkbox"
                                                                    {{ $event->requer_aprovacao == true ? 'checked' : '' }}><span
                                                                    class="c-switch-slider" data-checked="&#x2713"
                                                                    data-unchecked="&#x2715"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-success" type="submit" title="Salvar"><i
                                                    class="c-icon c-icon-sm cil-save"></i></button>
                                            <a class="btn btn-primary" href="{{ route('calender.index') }}"
                                                title="Voltar"><i class="c-icon c-icon-sm cil-action-undo"></i></a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><strong>Pessoas com presença confirmadas</strong></div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Nome') }}</th>
                                    <th>{{ __('Data de inscrição') }}</th>
                                    @if ($event->requer_aprovacao == true)
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Ação') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($pessoas as $pessoas)
                                    <tr>
                                        <td>{{ $pessoas->pessoaconfirmacao->name }}</td>
                                        <td>{{ date_format($pessoas->created_at, 'd-m-Y') }}</td>
                                        @if ($event->requer_aprovacao == true)
                                            @if ($pessoas->aprovado == true)
                                                <td>Aprovado</td>
                                                <td>
                                                    <a href="{{ route('calendar.reprovar', $pessoas->id) }}"><i
                                                            class="c-icon c-icon-lg cil-ban text-danger"></i></a></td>
                                            @else
                                                <td>Não aprovado</td>
                                                <td>
                                                    <a href="{{ route('calendar.aprovar', $pessoas->id) }}"><i
                                                            class="c-icon c-icon-lg cil-check text-success"></i></a>
                                                </td>
                                            @endif
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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

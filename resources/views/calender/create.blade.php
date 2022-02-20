@if ($appPermissao->add_calendar == true)
    @extends('layouts.base')
    @section('content')
        <div class="container-fluid">
            <div class="fade-in">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header"><strong>Dados do Evento</strong></div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('calender.store') }}" role="form"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input class="form-control" type="text" placeholder="{{ __('Title') }}"
                                                    name="title" required autofocus>
                                            </div>
                                            <!-- /.row-->
                                            <div class="row">
                                                <div class="form-group col-sm-3">
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
                                                                type="date" placeholder="date" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-3">
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
                                                                placeholder="date" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    <div class="form-check checkbox">
                                                        <input class="form-check-input" id="status"
                                                            name="status" type="checkbox">
                                                        <label class="form-check-label" for="check1">Ativo</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-sm btn-success" type="submit" title="Salvar"><i
                                                    class="c-icon c-icon-sm cil-save"></i></button>
                                            <a href="{{ route('calender.index') }}" class="btn btn-sm btn-primary"
                                                title="Voltar"><i class="c-icon c-icon-sm cil-action-undo"></i></a>
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

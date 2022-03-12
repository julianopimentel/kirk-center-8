<!-- Modal Store Transaction-->
<div class="modal fade" id="storeTransactionEntrada" tabindex="-1" role="dialog"
    aria-labelledby="storeTransactionTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="storeTransactionTitle">Novo Evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('calender.store') }}" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" type="text" placeholder="{{ __('Title') }}" name="title"
                                    required autofocus>
                            </div>
                        </div>
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
                                    <input class="form-control" id="start" name="start" type="date" placeholder="date"
                                        required>
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
                                    <input class="form-control" id="end" name="end" type="date" placeholder="date"
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-3">
                            <div class="form-group">
                                <label>
                                    Hora Inicio</label>
                                    <input class="form-control" type="time" id="hora_inicio" name="hora_inicio"
                                    pattern="[0-9]{2}:[0-9]{2}" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <div class="form-group">
                                <label>
                                    Hora Fim</label>
                                    <input class="form-control" type="time" id="hora_fim" name="hora_fim"
                                    pattern="[0-9]{2}:[0-9]{2}" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-2">
                            <div class="form-group">
                                <label>
                                    Ativo</label>
                                <label class="c-switch c-switch-label c-switch-pill c-switch-primary c-switch-lg">
                                    <input class="c-switch-input" name="status" type="checkbox" checked><span
                                        class="c-switch-slider" data-checked="&#x2713" data-unchecked="&#x2715"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <div class="form-group">
                                <label>Requer
                                    aprovação</label>
                                <label class="c-switch c-switch-label c-switch-pill c-switch-primary c-switch-lg">
                                    <input class="c-switch-input" name="requer_aprovacao" type="checkbox"><span
                                        class="c-switch-slider" data-checked="&#x2713" data-unchecked="&#x2715"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-sm btn-success" type="submit" title="Salvar"><i
                            class="c-icon c-icon-sm cil-save"></i></button>
                    <a href="{{ route('calender.index') }}" class="btn btn-sm btn-primary" title="Voltar"><i
                            class="c-icon c-icon-sm cil-action-undo"></i></a>
                </form>
            </div>
        </div>
    </div>
</div>

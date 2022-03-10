@if ($appPermissao->add_people == true or $appPermissao->home_cadastro_visitante == true)
    @extends('layouts.base')
    @section('content')
        <div class="container-fluid">
            <div class="fade-in">
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="nav-tabs-boxed">
                            <form method="POST" action="{{ route('peoplevisit.store') }}">
                                @csrf
                                <div class="tab-content">
                                    <div class="tab-pane active" id="dados" role="tabpanel">
                                        <div class="card-body">
                                            {!! csrf_field() !!}
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="name">Nome *</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text">
                                                                    <svg class="c-icon">
                                                                        <use
                                                                            xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-face">
                                                                        </use>
                                                                    </svg>
                                                            </div>
                                                            <input class="form-control" id='name' name="name" type="text"
                                                                placeholder="João" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if ($appSystem->visit_last_name == true)
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="name">Sobrenome @if ($appSystem->obg_last_name == true)
                                                                *
                                                            @endif
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text">
                                                                    <svg class="c-icon">
                                                                        <use
                                                                            xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-face">
                                                                        </use>
                                                                    </svg>
                                                            </div>
                                                            <input class="form-control" id='last_name' name="last_name"
                                                                type="text" placeholder="Silva"
                                                                @if ($appSystem->obg_last_name == true) required @endif>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                            <!-- /.row-->
                                            <div class="row">
                                                @if ($appSystem->visit_email == true)
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="ccnumber">Email @if ($appSystem->obg_email == true)
                                                                *
                                                            @endif
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text">
                                                                    <svg class="c-icon">
                                                                        <use
                                                                            xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-at">
                                                                        </use>
                                                                    </svg>
                                                            </div>
                                                            <input class="form-control" name="email" type="email"
                                                            placeholder="joao@live.com" autocomplete="joao@live.com"
                                                                @if ($appSystem->obg_email == true) required @endif>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>

                                            <!-- /.row-->
                                            <div class="row">
                                                @if ($appSystem->visit_mobile == true)
                                                <div class="form-group col-sm-3">
                                                    <div class="form-group">
                                                        <label for="ccnumber">Celular @if ($appSystem->obg_mobile == true)
                                                                *
                                                            @endif
                                                        </label>
                                                        <div class="input-group">
                                                            <input class="form-control" id="phone" name="phone" type="tel"
                                                                @if ($appSystem->obg_mobile == true) required @endif>
                                                            <span id="valid-msg" class="hide">✓ Valid</span>
                                                            <span id="error-msg" class="hide"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                @if ($appSystem->visit_birth == true)
                                                <div class="form-group col-sm-3">
                                                    <div class="form-group">
                                                        <label for="ccnumber">Data de Nascimento @if ($appSystem->obg_birth == true)
                                                                *
                                                            @endif
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text">
                                                                    <svg class="c-icon">
                                                                        <use
                                                                            xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-calendar">
                                                                        </use>
                                                                    </svg>
                                                            </div>
                                                            <input class="form-control" name="birth_at" type="date"
                                                                placeholder="date"
                                                                @if ($appSystem->obg_birth == true) required @endif>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                @if ($appSystem->visit_sex == true)
                                                <div class="form-group col-sm-3">
                                                    <label class="col-md-3 col-form-label">Sexo @if ($appSystem->obg_sex == true)
                                                            *
                                                        @endif
                                                    </label>
                                                    <div class="col-md-12 col-form-label">
                                                        <div class="form-check form-check-inline mr-1">
                                                            <input class="form-check-input" type="radio" value="m"
                                                                name="sex"
                                                                @if ($appSystem->sex == true) required @endif>
                                                            <svg class="c-icon">
                                                                <use
                                                                    xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-user">
                                                                </use>
                                                            </svg>
                                                            <label class="form-check-label" for="m">Masculino</label>
                                                        </div>
                                                        <div class="form-check form-check-inline mr-1">
                                                            <input class="form-check-input" type="radio" value="f"
                                                                name="sex"
                                                                @if ($appSystem->sex == true) required @endif>
                                                            <svg class="c-icon">
                                                                <use
                                                                    xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-user-female">
                                                                </use>
                                                            </svg>
                                                            <label class="form-check-label" for="f">Feminino</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                            <button class="btn btn-success" type="submit" id="botao" title="Salvar"
                                                disabled><i class="c-icon c-icon-sm cil-save"></i></button>
                                            <a class="btn btn-primary" href="{{ route('people.index') }}"
                                                title="Voltar"><i class="c-icon c-icon-sm cil-action-undo"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $("#name").on("input", function() {
                $(this).val($(this).val().toUpperCase());
            });
            $("#last_name").on("input", function() {
                $(this).val($(this).val().toUpperCase());
            });
            $("#state").on("input", function() {
                $(this).val($(this).val().toUpperCase());
            });

            $("#name").on("input", function() {
                $("#botao").prop('disabled', $(this).val().length < 3);
            });
        </script>
    @endsection

    @section('javascript')
    @endsection
@else
    @include('errors.redirecionar')
@endif

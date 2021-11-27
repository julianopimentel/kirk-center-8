@extends('layouts.baseminimal')
@section('content')

    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <div class="stepwizard">
                                    <div class="stepwizard-row setup-panel">
                                        <div class="stepwizard-step">
                                            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                                            <p>Dados pessoais</p>
                                        </div>
                                        <div class="stepwizard-step">
                                            <a href="#step-2" type="button" class="btn btn-default btn-circle"
                                                disabled="disabled">2</a>
                                            <p>Endereço</p>
                                        </div>
                                        <div class="stepwizard-step">
                                            <a href="#step-3" type="button" class="btn btn-default btn-circle"
                                                disabled="disabled">3</a>
                                            <p>Finalização</p>
                                        </div>
                                    </div>
                                </div>
                                <form method="POST" action="{{ route('wizard.store') }}">
                                    @csrf
                                    {!! csrf_field() !!}
                                    <div class="row setup-content" id="step-1">
                                        <div class="col-md-12">
                                            <center>
                                                <h3>Dados Pessoais</h3>
                                            </center>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="name">Nome</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text">
                                                                    <svg class="c-icon">
                                                                        <use
                                                                            xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-face">
                                                                        </use>
                                                                    </svg></span></div>
                                                            <input class="form-control" id='name' name="name" type="text"
                                                                value='{{ Auth::user()->name }}' maxlength="50" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.row-->
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="ccnumber">Email</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text">
                                                                    <svg class="c-icon">
                                                                        <use
                                                                            xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-at">
                                                                        </use>
                                                                    </svg></span></div>
                                                            <input class="form-control" id='email' name="email" type="email"
                                                                value="{{ Auth::user()->email }}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.row-->
                                            <div class="row">
                                                <div class="form-group col-sm-4">
                                                    <label for="ccmonth">Celular</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text">
                                                                <svg class="c-icon">
                                                                    <use
                                                                        xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-mobile">
                                                                    </use>
                                                                </svg></span></div>
                                                        <input class="form-control" name="mobile" type="text"
                                                            placeholder="11 99999-9999"
                                                            pattern="([0-9]{2}) [0-9]{5}-[0-9]{4}"
                                                            value="{{ Auth::user()->mobile }}" maxlength="15">
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    <label for="ccyear">Data de Nascimento</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text">
                                                                <svg class="c-icon">
                                                                    <use
                                                                        xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-calendar">
                                                                    </use>
                                                                </svg></span></div>
                                                        <input class="form-control" name="birth_at" type="date"
                                                            placeholder="date">
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    <label class="col-md-3 col-form-label">Sexo</label>
                                                    <div class="col-md-12 col-form-label">
                                                        <div class="form-check form-check-inline mr-1">
                                                            <input class="form-check-input" type="radio" value="m"
                                                                name="sex">
                                                            <svg class="c-icon">
                                                                <use
                                                                    xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-user">
                                                                </use>
                                                            </svg>
                                                            <label class="form-check-label" for="m">Masculino</label>
                                                        </div>
                                                        <div class="form-check form-check-inline mr-1">
                                                            <input class="form-check-input" type="radio" value="f"
                                                                name="sex">
                                                            <svg class="c-icon">
                                                                <use
                                                                    xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-user-female">
                                                                </use>
                                                            </svg>
                                                            <label class="form-check-label" for="f">Feminino</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-11">
                                                    <div class="form-group">
                                                        <span class="help-block">Format (99) 99999-9999</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-1">
                                                    <div class="form-group">
                                                        <button class="btn btn-primary nextBtn btn-lg btn-square pull-right"
                                                            type="button">Next</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row setup-content" id="step-2">
                                        <div class="col-md-12">
                                            <center>
                                                <h3>Dados Pessoais</h3>
                                            </center>
                                            <div class="form-group">
                                                <label for="street">Street</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text">
                                                            <svg class="c-icon">
                                                                <use
                                                                    xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-address-book">
                                                                </use>
                                                            </svg></span></div>
                                                    <input class="form-control" name="address" type="text"
                                                        placeholder="Enter street name" maxlength="200">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-5">
                                                    <label for="city">City</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text">
                                                                <svg class="c-icon">
                                                                    <use
                                                                        xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-house">
                                                                    </use>
                                                                </svg></span></div>
                                                        <input class="form-control" name="city" type="text"
                                                            placeholder="Enter your city" maxlength="15">
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    <label for="country">State</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text">
                                                                <svg class="c-icon">
                                                                    <use
                                                                        xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-home">
                                                                    </use>
                                                                </svg></span></div>
                                                        <input class="form-control" name="state" type="text"
                                                            placeholder="State" placeholder="SP" maxlength="2">
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="postal-code">Postal Code</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text">
                                                                <svg class="c-icon">
                                                                    <use
                                                                        xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-newspaper">
                                                                    </use>
                                                                </svg></span></div>
                                                        <input class="form-control" name="cep" type="text" pattern="[0-9]{5}-[0-9]{3}"
                                                            placeholder="Postal Code" maxlength="9">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.row-->
                                            <div class="form-group">
                                                <label for="country">Country</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text">
                                                            <svg class="c-icon">
                                                                <use
                                                                    xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-globe-alt">
                                                                </use>
                                                            </svg></span></div>
                                                    <input class="form-control" name="country" type="text"
                                                        placeholder="Country name" value="Brazil">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-11">
                                                    <div class="form-group">
                                                    </div>
                                                </div>
                                                <div class="col-sm-1">
                                                    <div class="form-group">
                                                        <button class="btn btn-primary nextBtn btn-lg btn-square pull-right"
                                                            type="button">Next</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row setup-content" id="step-3">

                                        <div class="col-md-12">
                                            <center>
                                                <h3>Finalização</h3> <br>
                                                Estaremos enviado esses dados ao responsável, ficando pendente apenas da
                                                aprovação para ter os acessos a conta cadastrada.
                                                <br>
                                                <br><br><br><br>
                                                <button class="btn btn-success btn-lg btn-square pull-right"
                                                    type="submit">Concluir</button>
                                            </center>
                                        </div>

                                    </div>
                                </form>
                                <!-- /.row-->
                            </div>
                        </div>
                    </div>
                    <!-- /.col-->
                </div>
                <!-- /.row-->
            </div>
        </div>
        <!-- /.row-->
        <!-- /.col-->
    </div>
    <!-- /.row-->
    </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {

            var navListItems = $('div.setup-panel div a'),
                allWells = $('.setup-content'),
                allNextBtn = $('.nextBtn');

            allWells.hide();

            navListItems.click(function(e) {
                e.preventDefault();
                var $target = $($(this).attr('href')),
                    $item = $(this);

                if (!$item.hasClass('disabled')) {
                    navListItems.removeClass('btn-primary').addClass('btn-default');
                    $item.addClass('btn-primary');
                    allWells.hide();
                    $target.show();
                    $target.find('input:eq(0)').focus();
                }
            });

            allNextBtn.click(function() {
                var curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next()
                    .children("a"),
                    curInputs = curStep.find("input[type='text'],input[type='url']"),
                    isValid = true;

                $(".form-group").removeClass("has-error");
                for (var i = 0; i < curInputs.length; i++) {
                    if (!curInputs[i].validity.valid) {
                        isValid = false;
                        $(curInputs[i]).closest(".form-group").addClass("has-error");
                    }
                }

                if (isValid)
                    nextStepWizard.removeAttr('disabled').trigger('click');
            });

            $('div.setup-panel div a.btn-primary').trigger('click');
        });
    </script>

@endsection

@section('javascript')

@endsection

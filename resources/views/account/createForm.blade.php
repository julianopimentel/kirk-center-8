@extends('layouts.baseminimal')
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Criar nova Conta</h4>
                        </div>
                        <form method="POST" action="{{ route('account.store') }}"
                            onsubmit="this.enviar.value='Enviando...'; this.enviar.disabled=true;">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-3">
                                        <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#home"
                                                    role="tab" aria-controls="home" aria-selected="true"><i
                                                    class="c-icon cil-building"></i> Home</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab4" data-toggle="tab"
                                                    href="#address" role="tab" aria-controls="profile"
                                                    aria-selected="false"><i
                                                    class="c-icon cil-location-pin"></i> Localização</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-8">
                                        <div class="tab-content no-padding" id="myTab2Content">
                                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                                aria-labelledby="home-tab4">
                                                <label for="city">Nome da Conta*</label>
                                                <div class="input-group">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <svg class="c-icon c-icon-sm">
                                                                    <use
                                                                        xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-contact">
                                                                    </use>
                                                                </svg>
                                                            </span>
                                                        </div>
                                                        <input class="form-control" type="text"
                                                            placeholder="{{ __('Name') }}" id="name_company"
                                                            name="name_company" required>
                                                    </div>
                                                </div>
                                                <label for="city">CNPJ</label>
                                                <div class="input-group">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <svg class="c-icon c-icon-sm">
                                                                    <use
                                                                        xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-featured-playlist">
                                                                    </use>
                                                                </svg>
                                                            </span>
                                                        </div>
                                                        <input class="form-control" type="text"
                                                            placeholder="01.452.25/0001-19"
                                                            pattern="[0-9]{2}.[0-9]{3}.[0-9]{3}/[0-9]{4}-[0-9]{2}"
                                                            name="doc">
                                                    </div>
                                                </div>
                                                <label for="city">E-mail</label>
                                                <div class="input-group">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">@</span>
                                                        </div>
                                                        <input class="form-control" type="email"
                                                            placeholder="{{ __('E-Mail Address') }}" name="email">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label for="city">Contato</label>
                                                        <div class="input-group mb-6">
                                                            <input class="form-control" id="phone" name="phone"
                                                                type="tel">
                                                            <span id="valid-msg" class="hide">✓ Valid</span>
                                                            <span id="error-msg" class="hide"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Tipo *</label>
                                                        <select class="form-control" name="type">
                                                            @foreach ($statuses as $status)
                                                                <option value="{{ $status->id }}">{{ $status->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="address" role="tabpanel"
                                                aria-labelledby="profile-tab4">
                                                <div class="form-group">
                                                    <label for="street">Address</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text">
                                                                <svg class="c-icon">
                                                                    <use
                                                                        xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-address-book">
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
                                                                            xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-house">
                                                                        </use>
                                                                    </svg></span></div>
                                                            <input class="form-control" name="city" type="text"
                                                                placeholder="Enter your city">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-3">
                                                        <label for="country">State</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text">
                                                                    <svg class="c-icon">
                                                                        <use
                                                                            xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-home">
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
                                                                            xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-newspaper">
                                                                        </use>
                                                                    </svg></span></div>
                                                            <input class="form-control" name="cep" type="text"
                                                                placeholder="69059-627" maxlength="9"
                                                                pattern="[0-9]{5}-[0-9]{3}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label for="city">Latitude</label>
                                                        <div class="input-group-prepend">
                                                            <input class="form-control" name="lat" type="text"
                                                                maxlength="15" placeholder="-27.5859412">

                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="city">Longitude</label>
                                                        <input class="form-control" name="lng" type="text" maxlength="15"
                                                            placeholder="-48.6003264">
                                                    </div>
                                                </div>
                                                <!-- /.row-->
                                                <div class="form-group">
                                                    <label for="country">Country</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text">
                                                                <svg class="c-icon">
                                                                    <use
                                                                        xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-globe-alt">
                                                                    </use>
                                                                </svg></span></div>
                                                        <input class="form-control" name="country" type="text"
                                                            placeholder="Country name" value="Brazil">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button id="botao" class="btn btn-success" type="submit" title="Salvar" name="enviar"
                                    value="Enviar" data-toggle="modal" data-target="#exampleModalScrollable" disabled><i
                                        class="c-icon c-icon-sm cil-save"></i></button>
                                <a href="{{ route('account.index') }}" class="btn btn-primary" title="Voltar"><i
                                        class="c-icon c-icon-sm cil-action-undo"></i></a>

                        </form>

                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">

                            <div class="modal-body">
                                Sua conta está sendo criada, por favor aguarde um momento.
                            </div>

                        </div>
                    </div>
                </div>

                <script>
                    $(document).ready(function() {
                        $('#name_company').on('input', function() {
                            $('#botao').prop('disabled', $(this).val().length < 6);
                        });
                    });
                </script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            @endsection

            @section('javascript')
            @endsection

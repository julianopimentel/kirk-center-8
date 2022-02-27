@extends('layouts.baseminimal')

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Editar a Conta</h4>
                        </div>
                        <form method="POST" action="{{ route('account.update', $institution->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-3">
                                        <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#home"
                                                    role="tab" aria-controls="home" aria-selected="true"><i
                                                    class="c-icon cil-building"></i>  Dados da Conta</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab4" data-toggle="tab"
                                                    href="#address" role="tab" aria-controls="profile"
                                                    aria-selected="false"><i
                                                    class="c-icon cil-location-pin"></i>  Localidade</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab5" data-toggle="tab" href="#share"
                                                    role="tab" aria-controls="share" aria-selected="false"><i
                                                    class="c-icon cil-qr-code"></i> Compartilhar</a>
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
                                                            placeholder="{{ __('Name') }}" name="name_company"
                                                            value="{{ $institution->name_company }}" required>
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
                                                            placeholder="{{ __('CNPJ') }}" name="doc"
                                                            pattern="[0-9]{2}.[0-9]{3}.[0-9]{3}/[0-9]{4}-[0-9]{2}"
                                                            value="{{ $institution->doc }}">
                                                    </div>
                                                </div>
                                                <label for="city">E-mail</label>
                                                <div class="input-group">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">@</span>
                                                        </div>
                                                        <input class="form-control" type="email"
                                                            placeholder="{{ __('E-Mail Address') }}" name="email"
                                                            value="{{ $institution->email }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label for="city">Contato</label>
                                                        <div class="input-group mb-6">
                                                            <input class="form-control" id="phone" name="phone" type="tel"
                                                                value="{{ $institution->mobile }}">
                                                                <span id=" valid-msg" class="hide">✓ Valid</span>
                                                            <span id="error-msg" class="hide"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Tipo *</label>
                                                        <select class="form-control" name="type">
                                                            @foreach ($statuses as $status)
                                                                @if ($status->id == $institution->status_id)
                                                                    <option value="{{ $status->id }}" selected="true">
                                                                        {{ $status->name }}</option>
                                                                @else
                                                                    <option value="{{ $status->id }}">
                                                                        {{ $status->name }}
                                                                    </option>
                                                                @endif
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
                                                    <input class="form-control" name="address1" type="text"
                                                        placeholder="Enter street name"
                                                        value="{{ $institution->address1 }}" maxlength="200">
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
                                                            value="{{ $institution->city }}" placeholder="São Paulo">
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
                                                            value="{{ $institution->state }}" maxlength="2"
                                                            placeholder="SP">
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
                                                            placeholder="69059-627" pattern="[0-9]{5}-[0-9]{3}"
                                                            maxlength="9" value="{{ $institution->cep }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label for="city">Latitude</label>
                                                    <div class="input-group-prepend">
                                                        <input class="form-control" name="lat" type="text"
                                                            placeholder="Enter your city" value="{{ $institution->lat }}"
                                                            maxlength="15" placeholder="-27.5859412">

                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="city">Longitude</label>
                                                    <input class="form-control" name="lng" type="text"
                                                        placeholder="Enter your state" value="{{ $institution->lng }}"
                                                        maxlength="15" placeholder="-48.6003264">
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
                                                    <input class="form-control" name="country" id="country" type="text"
                                                        placeholder="Country name" value="{{ $institution->country }}">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="tab-pane fade" id="share" role="tabpanel"
                                            aria-labelledby="profile-tab5">
                                            <div class="form-group">
                                                <label for="street">Ativar módulo de cadastro rápido</label>
                                                <div class="input-group">
                                                    <label
                                                        class="c-switch c-switch-label c-switch-pill c-switch-primary c-switch-sm">
                                                        <input class="c-switch-input" name="compartilhar_link"
                                                            type="checkbox"
                                                            {{ $institution->compartilhar_link == true ? 'checked' : '' }}><span
                                                            class="c-switch-slider" data-checked="&#x2713"
                                                            data-unchecked="&#x2715"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="street">Link para compartilhar</label>
                                                <div class="input-group">
                                                    {{ env('APP_URL') }}/share/{{ $institution->unique_id }}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="street">QRCode para compartilhar</label>
                                                <div class="input-group">
                                                    {!! QrCode::size(300)->generate(env('APP_URL') . '/share/' . $institution->unique_id) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success" type="submit" title="Salvar"><i
                                    class="c-icon c-icon-sm cil-save"></i></button>
                            <a href="{{ route('account.index') }}" class="btn btn-primary" title="Voltar"><i
                                    class="c-icon c-icon-sm cil-action-undo"></i></a>

                        </form>

                    </div>
                </div>
            @endsection

            @section('javascript')
            @endsection

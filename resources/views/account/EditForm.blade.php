@extends('layouts.baseminimal')

@section('content')

<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar Account</h4>
                    </div>
                    <form method="POST" action="{{ route('account.update',$institution->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-3">
                                    <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#home"
                                                role="tab" aria-controls="home" aria-selected="true">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab4" data-toggle="tab"
                                                href="#address" role="tab" aria-controls="profile"
                                                aria-selected="false">Address</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-12 col-sm-12 col-md-8">
                                    <div class="tab-content no-padding" id="myTab2Content">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                                            aria-labelledby="home-tab4">
                                            <label for="city">Nome da Conta</label>
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
                                                <input class="form-control" type="text" placeholder="{{ __('Name') }}" name="name_company"
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
                                                <input class="form-control" type="text" placeholder="{{ __('CNPJ') }}" name="doc"
                                                pattern="[0-9]{2}.[0-9]{3}.[0-9]{3}/[0-9]{4}-[0-9]{2}"
                                                value="{{ $institution->doc }}" required>
                                            </div>
                                        </div>
                                        <label for="city">E-mail</label>
                                        <div class="input-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">@</span>
                                                </div>
                                                <input class="form-control" type="email" placeholder="{{ __('E-Mail Address') }}"
                                                name="email" value="{{ $institution->email }}" required>
                                            </div>
                                        </div>
                                    <label for="city">Telefone</label>
                                    <div class="input-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <svg class="c-icon c-icon-sm">
                                                            <use
                                                                xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-phone">
                                                            </use>
                                                        </svg>
                                                    </span>
                                                </div>
                                                <input class="form-control" name="mobile" type="tel"
                                                placeholder="11 99999-9999" value="{{ $institution->mobile }}"
                                                pattern="([0-9]{2}) [0-9]{5}-[0-9]{4}" required>
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
                                                            <input class="form-control" name="address1" type="text" placeholder="Enter street name"
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
                                                                value="{{ $institution->state }}"
                                                                maxlength="2" placeholder="SP">
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
                                                                <input class="form-control" name="cep" type="text" placeholder="69059-627"
                                                                pattern="[0-9]{5}-[0-9]{3}" maxlength="9"
                                                                    value="{{ $institution->cep }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label for="city">Latitude</label>
                                                    <div class="input-group-prepend">
                                                        <input class="form-control" name="lat" type="text"
                                                        placeholder="Enter your city" value="{{ $institution->lat }}" maxlength="15"  placeholder="-27.5859412">

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
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-2">
                                    <a href="{{ route('account.index') }}"
                                        class="btn btn-block btn-primary">{{ __('Return') }}</a>
                                    <button class="btn btn-block btn-success" type="submit">{{ __('Save') }}</button>
                    </form>
                </div>
            </div>
        </div>
    @endsection

    @section('javascript')

    @endsection

@if ($appPermissao->add_people == true)
    @extends('layouts.base')
    @section('content')
        <div class="container-fluid">
            <div class="fade-in">
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="nav-tabs-boxed">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#dados"
                                        role="tab" aria-controls="dados">
                                        <i class="c-icon c-icon-sm cil-contact text-dark"></i> {{ __('people.personal_data')}}</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#endereco"
                                        role="tab" aria-controls="endereco"><i
                                            class="c-icon c-icon-sm cil-location-pin text-dark"></i>
                                            {{ __('people.address')}}</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#membro"
                                        role="tab" aria-controls="membro"><i
                                            class="c-icon c-icon-sm cil-book text-dark"></i> {{ __('people.access_data')}}</a>
                                </li>
                            </ul>
                            <form method="POST" action="{{ route('people.store') }}">
                                @csrf
                                <div class="tab-content">
                                    <div class="tab-pane active" id="dados" role="tabpanel">
                                        <div class="card-body">
                                            {!! csrf_field() !!}
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('people.name')}} *</label>
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
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('people.last_name')}} @if ($appSystem->obg_last_name == true)
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
                                            </div>
                                            <!-- /.row-->
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="ccnumber">{{ __('people.email')}} @if ($appSystem->obg_email == true)
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
                                            </div>

                                            <!-- /.row-->
                                            <div class="row">
                                                <div class="form-group col-sm-3">
                                                    <div class="form-group">
                                                        <label for="ccnumber">{{ __('people.mobile')}} @if ($appSystem->obg_mobile == true)
                                                                *
                                                            @endif
                                                        </label>
                                                        <div class="input-group">
                                                            <input class="form-control" id="phone" name="phone" type="tel"
                                                                @if ($appSystem->obg_mobile == true) required @endif>
                                                            <span id="valid-msg" class="hide">✓ {{ __('people.valid_phone')}}</span>
                                                            <span id="error-msg" class="hide"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    <div class="form-group">
                                                        <label for="ccnumber">{{ __('people.birth')}} @if ($appSystem->obg_birth == true)
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
                                                <div class="form-group col-sm-3">
                                                    <label class="col-md-3 col-form-label">{{ __('people.sex')}} @if ($appSystem->obg_sex == true)
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
                                                            <label class="form-check-label" for="m">{{ __('people.m')}}</label>
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
                                                            <label class="form-check-label" for="f">{{ __('people.f')}}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('people.role')}} *</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text">
                                                                    <svg class="c-icon">
                                                                        <use
                                                                            xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-lock-locked">
                                                                        </use>
                                                                    </svg>
                                                            </div>
                                                            <select class="form-control" name="role">
                                                                @foreach ($roles as $roles)
                                                                    <option value="{{ $roles->id }}" @if ($roles->id == 2)
                                                                        selected
                                                                    @endif>
                                                                        {{ $roles->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-check checkbox">
                                                <input class="form-check-input" id="criar_acesso" name="criar_acesso"
                                                    type="checkbox">
                                                <label class="form-check-label" for="check1">{{ __('people.create_access')}}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="endereco" role="tabpanel">
                                        <div class="card-body">
                                            @if ($appSystem->geolocation == true)
                                                <div id="map"></div>
                                                <ul id="geoData">
                                                    <div class="row">
                                                        <div class="form-group col-sm-6">
                                                            <label for="city">{{ __('people.lat')}}</label>
                                                            <div class="input-group-prepend">
                                                                <span name="lat-span" id="lat-span"></span>
                                                            </div>
                                                            <input class="form-control" name="lat-span" type="text">
                                                        </div>
                                                        <div class="form-group col-sm-6">
                                                            <label for="city">{{ __('people.long')}}</label>
                                                            <div class="input-group-prepend">
                                                                <span name="lon-span" id="lon-span"></span>
                                                            </div>
                                                            <input class="form-control" name="lon-span" type="text">
                                                        </div>
                                                        Por favor copiar valores nos campos acima ao selecionar o local no
                                                        mapa
                                                    </div>
                                                </ul>
                                            @else
                                                <div class="row">
                                                    <div class="form-group col-sm-8">
                                                        <label for="street">{{ __('people.street')}}</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text">
                                                                    <svg class="c-icon">
                                                                        <use
                                                                            xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-address-book">
                                                                        </use>
                                                                    </svg>
                                                            </div>
                                                            <input class="form-control" name="address" type="text"
                                                                placeholder="{{ __('people.enter_street')}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-4">
                                                        <label for="postal-code">{{ __('people.postal_code')}}</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text">
                                                                    <svg class="c-icon">
                                                                        <use
                                                                            xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-newspaper">
                                                                        </use>
                                                                    </svg>
                                                            </div>
                                                            <input class="form-control" name="cep" type="text"
                                                                placeholder="{{ __('people.enter_postal')}}" pattern="[0-9]{5}-[0-9]{3}"
                                                                maxlength="9">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-4">
                                                        <label for="city">{{ __('people.country')}} @if ($appSystem->obg_city == true)
                                                                *
                                                            @endif
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span
                                                                    class="input-group-text">
                                                                    <svg class="c-icon">
                                                                        <use
                                                                            xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-globe-alt">
                                                                        </use>
                                                                    </svg>
                                                            </div>
                                                            <select id="country-dd" name="country-dd"
                                                                class="form-control">
                                                                <option value="">{{ __('layout.select')}} {{ __('people.country')}}</option>
                                                                @foreach ($countries as $data)
                                                                    <option value="{{ $data->id }}">
                                                                        {{ $data->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-4">
                                                        <label for="country">{{ __('people.state')}} @if ($appSystem->obg_state == true)
                                                                *
                                                            @endif
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span
                                                                    class="input-group-text">
                                                                    <svg class="c-icon">
                                                                        <use
                                                                            xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-home">
                                                                        </use>
                                                                    </svg>
                                                            </div>
                                                            <select name="state-dd" id="state-dd" class="form-control">
                                                            </select @if ($appSystem->obg_state == true)
                                                            required
                                            @endif
                                            >
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="city">{{ __('people.city')}} @if ($appSystem->obg_city == true)
                                                *
                                            @endif
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text">
                                                    <svg class="c-icon">
                                                        <use
                                                            xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-house">
                                                        </use>
                                                    </svg>
                                            </div>
                                            <select id="city-dd" name="city-dd" class="form-control">
                                            </select @if ($appSystem->obg_city == true)
                                            required
    @endif
    >
    </div>
    </div>
    </div>
    @endif
    </div>
    </div>
    <div class="tab-pane" id="membro" role="tabpanel">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>{{ __('people.visit')}}</th>
                        <th>{{ __('people.responsible')}}</th>
                        <th>{{ __('people.baptized')}}</th>
                        <th>{{ __('people.convert')}}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ __('people.status_membre')}}</td>
                        <td>
                            <label class="c-switch c-switch-label c-switch-pill c-switch-primary c-switch-sm">
                                <input class="c-switch-input" name="is_visitor" type="checkbox"><span
                                    class="c-switch-slider" data-checked="&#x2713" data-unchecked="&#x2715"></span>
                            </label>
                        </td>
                        <td>
                            <label class="c-switch c-switch-label c-switch-pill c-switch-primary c-switch-sm">
                                <input class="c-switch-input" name="is_responsible" type="checkbox"><span
                                    class="c-switch-slider" data-checked="&#x2713" data-unchecked="&#x2715"></span>
                            </label>
                        </td>
                        <td>
                            <label class="c-switch c-switch-label c-switch-pill c-switch-primary c-switch-sm">
                                <input class="c-switch-input" name="is_baptism" type="checkbox"><span
                                    class="c-switch-slider" data-checked="&#x2713" data-unchecked="&#x2715"></span>
                            </label>
                        </td>
                        <td>
                            <label class="c-switch c-switch-label c-switch-pill c-switch-primary c-switch-sm">
                                <input class="c-switch-input" name="is_conversion" type="checkbox"><span
                                    class="c-switch-slider" data-checked="&#x2713" data-unchecked="&#x2715"></span>
                            </label>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!--
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Status</label>
                    <div class="col-md-9 col-form-label">
                        <div class="form-check checkbox">
                            <input class="form-check-input" name="is_responsible" type="checkbox">
                            <label class="form-check-label" for="check1">Responsável</label>
                        </div>
                        <div class="form-check checkbox">
                            <input class="form-check-input" name="is_visitor" type="checkbox">
                            <label class="form-check-label" for="check2">Visitante</label>
                        </div>
                        <div class="form-check checkbox">
                            <input class="form-check-input" name="is_baptism" type="checkbox">
                            <label class="form-check-label" for="check4">Batismo</label>
                        </div>
                        <div class="form-check checkbox">
                            <input class="form-check-input" name="is_transferred" type="checkbox">
                            <label class="form-check-label" for="check5">Transferido</label>
                        </div>
                        <div class="form-check checkbox">
                            <input class="form-check-input" name="is_conversion" type="checkbox">
                            <label class="form-check-label" for="check6">Convertido</label>
                        </div>
                    </div>
                </div>
            -->
            <br>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="textarea-input">{{ __('layout.note')}}
                    @if ($appSystem->obg_note == true)
                        *
                    @endif
                </label>
                <div class="col-md-9">
                    <textarea class="form-control" name="note" rows="3" placeholder="{{ __('layout.content')}}"
                        @if ($appSystem->obg_note == true) required @endif></textarea>
                </div>
            </div>
        </div>
    </div>
    <button class="btn btn-success" type="submit" id="botao" title="Salvar" disabled><i
            class="c-icon c-icon-sm cil-save"></i></button>
    <a class="btn btn-primary" href="{{ route('people.index') }}" title="Voltar"><i
            class="c-icon c-icon-sm cil-action-undo"></i></a>
    </div>
    </div>
    </form>
    </div>
    <!-- /.row-->
    <!-- /.col-->
    </div>
    <!-- /.row-->
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
    @if ($appSystem->geolocation == true)
        <style type="text/css">
            #map {
                width: 100%;
                height: 400px;
            }

        </style>
        <script>
            function initMap() {
                var myLatLng = {


                    @if ($locations->lat)
                        {{ $locations->lat }}
                    @endif,
                    @if ($locations->lng)
                        {{ $locations->lng }}
                    @endif
                };

                var map = new google.maps.Map(document.getElementById('map'), {
                    center: myLatLng,
                    zoom: 16
                });

                var marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map,
                    title: 'Ponto',
                    draggable: true
                });

                google.maps.event.addListener(marker, 'dragend', function(marker) {
                    var latLng = marker.latLng;
                    document.getElementById('lat-span').innerHTML = latLng.lat();
                    document.getElementById('lon-span').innerHTML = latLng.lng();
                });
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initMap" async defer></script>
    @endif

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#country-dd').on('change', function() {
                var idCountry = this.value;
                $("#state-dd").html('');
                $.ajax({
                    url: "{{ url('api/fetch-states') }}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#state-dd').html('<option value="">{{ __('layout.select')}} {{ __('people.state')}}</option>');
                        $.each(result.states, function(key, value) {
                            $("#state-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city-dd').html('<option value="">{{ __('layout.select')}} {{ __('people.city')}}</option>');
                    }
                });
            });
            $('#state-dd').on('change', function() {
                var idState = this.value;
                $("#city-dd").html('');
                $.ajax({
                    url: "{{ url('api/fetch-cities') }}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(res) {
                        $('#city-dd').html('<option value="">{{ __('layout.select')}} {{ __('people.city')}}</option>');
                        $.each(res.cities, function(key, value) {
                            $("#city-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
@endsection

@section('javascript')
@endsection
@else
@include('errors.redirecionar')
@endif

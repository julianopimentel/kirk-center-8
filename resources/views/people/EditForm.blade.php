@if ($appPermissao->edit_people == true and $appPermissao->add_people == true)
    @extends('layouts.base')
    @section('content')
        <div class="container-fluid">
            <div class="fade-in">
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="nav-tabs-boxed">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#dados"
                                        role="tab" aria-controls="dados"><i
                                            class="c-icon c-icon-sm cil-contact text-dark"></i> {{ __('people.personal_data')}}</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#endereco"
                                        role="tab" aria-controls="endereco"><i
                                            class="c-icon c-icon-sm cil-location-pin text-dark"></i>
                                            {{ __('people.address')}}</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#membro"
                                        role="tab" aria-controls="membro"><i
                                            class="c-icon c-icon-sm cil-book text-dark"></i> {{ __('people.membership')}}</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#notes"
                                        role="tab" aria-controls="notes"><i class="c-icon c-icon-sm cil-fork text-dark"></i>
                                        {{ __('layout.note')}}</a>
                                </li>
                                @if ($people->user_id == !null)
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#acesso"
                                            role="tab" aria-controls="acesso"><i
                                                class="c-icon c-icon-sm cil-https text-dark"></i> {{ __('people.access_data')}}</a></li>
                                @endif
                            </ul>
                            <form method="POST" action="{{ route('people.update', $people->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="tab-content">
                                    <div class="tab-pane active" id="dados" role="tabpanel">
                                        <div class="card-body">
                                            {!! csrf_field() !!}
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('people.name')}} *</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text">
                                                                    <svg class="c-icon">
                                                                        <use
                                                                            xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-face">
                                                                        </use>
                                                                    </svg> </div>
                                                            <input class="form-control" id="name" name="name" type="text"
                                                                value="{{ $people->name }}" required>
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
                                                                    </svg> </div>
                                                            <input class="form-control" id="email" name="email"
                                                                type="text" placeholder="joao@live.com"
                                                                value="{{ $people->email }}"
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
                                                                value="{{ $people->phone }}"
                                                                @if ($appSystem->obg_mobile == true) required @endif>
                                                            <span id="valid-msg" class="hide">✓ Valid</span>
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
                                                                    </svg> </div>
                                                            <input class="form-control" id="birth_at" name="birth_at"
                                                                type="date" placeholder="date"
                                                                value="{{ $people->birth_at }}"
                                                                @if ($appSystem->obg_birth == true) required @endif>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    <label class="col-md-4 col-form-label">{{ __('people.sex')}} @if ($appSystem->obg_sex == true)
                                                            *
                                                        @endif
                                                    </label>
                                                    <div class="col-md-12 col-form-label">
                                                        <div class="form-check form-check-inline mr-1">
                                                            <input class="form-check-input" id="sex" type="radio" value="m"
                                                                name="sex" {{ $people->sex == 'm' ? 'checked' : '' }}
                                                                @if ($appSystem->sex == true) required @endif>
                                                            <svg class="c-icon">
                                                                <use
                                                                    xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-user">
                                                                </use>
                                                            </svg> <label class="form-check-label" for="m">{{ __('people.m')}}</label>
                                                        </div>
                                                        <div class="form-check form-check-inline mr-1">
                                                            <input class="form-check-input" id="sex" type="radio" value="f"
                                                                name="sex" {{ $people->sex == 'f' ? 'checked' : '' }}
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
                                                                @foreach ($roles as $role)
                                                                    @if ($role->id == $people->role)
                                                                        <option value="{{ $role->id }}" selected="true">
                                                                            {{ $role->name }}</option>
                                                                    @else
                                                                        <option value="{{ $role->id }}">
                                                                            {{ $role->name }}
                                                                        </option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if ($people->user_id == null)
                                                <div class="form-check checkbox">
                                                    <input class="form-check-input" id="criar_acesso" name="criar_acesso"
                                                        type="checkbox">
                                                    <label class="form-check-label" for="check1">{{ __('people.create_access')}}</label>
                                                </div>
                                            @endif
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
                                                                    </svg> </div>
                                                            <input class="form-control" id="address" name="address"
                                                                type="text" placeholder="{{ __('people.enter_street')}}"
                                                                value="{{ $people->address }}">
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
                                                                    </svg> </div>
                                                            <input class="form-control" id="cep" name="cep" type="text"
                                                                placeholder="{{ __('people.enter_postal')}}" value="{{ $people->cep }}"
                                                                pattern="[0-9]{5}-[0-9]{3}" maxlength="9">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-4">
                                                        <label for="city">{{ __('people.country')}}</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span
                                                                    class="input-group-text">
                                                                    <svg class="c-icon">
                                                                        <use
                                                                            xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-globe-alt">
                                                                        </use>
                                                                    </svg> </div>
                                                            <select id="country-dd" name="country-dd"
                                                                class="form-control">
                                                                <option value="">{{ __('layout.select')}}</option>
                                                                @foreach ($countries as $data)
                                                                    @if ($data->id == $people->country)
                                                                        <option value="{{ $data->id }}"
                                                                            selected="true">
                                                                            {{ $data->name }}</option>
                                                                    @else
                                                                        <option value="{{ $data->id }}">
                                                                            {{ $data->name }}
                                                                        </option>
                                                                    @endif
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
                                                                    </svg> </div>
                                                            <select name="state-dd" id="state-dd" class="form-control">
                                                                @foreach ($state as $data)
                                                                    @if ($data->id == $people->state)
                                                                        <option value="{{ $data->id }}"
                                                                            selected="true">
                                                                            {{ $data->name }}</option>
                                                                    @endif
                                                                @endforeach
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
                                                    </svg> </div>
                                            <select id="city-dd" name="city-dd" class="form-control">
                                                @foreach ($city as $data)
                                                    @if ($data->id == $people->city)
                                                        <option value="{{ $data->id }}" selected="true">
                                                            {{ $data->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select @if ($appSystem->obg_city == true)
                                            required
    @endif
    >
    </div>
    </div>

    <!-- /.row-->
    </div>
    @endif
    </div>
    </div>

    <div class="tab-pane" id="membro" role="tabpanel">
        <div class="card-body">
            <div class="form-group row">
                <div class="form-group col-sm-4">
                    <label for="city">{{ __('people.status')}}
                    </label>
                    <select class="form-control" name="status_id">
                        @foreach ($statuses as $status)
                            @if ($status->id == $people->status_id)
                                <option value="{{ $status->id }}" selected="true">
                                    {{ $status->name }}</option>
                            @else
                                <option value="{{ $status->id }}">{{ $status->name }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
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
                                <input class="c-switch-input" name="is_visitor" type="checkbox"
                                    {{ $people->is_visitor == true ? 'checked' : '' }}><span class="c-switch-slider"
                                    data-checked="&#x2713" data-unchecked="&#x2715"></span>
                            </label>
                        </td>
                        <td>
                            <label class="c-switch c-switch-label c-switch-pill c-switch-primary c-switch-sm">
                                <input class="c-switch-input" name="is_responsible" type="checkbox"
                                    {{ $people->is_responsible == true ? 'checked' : '' }}><span class="c-switch-slider"
                                    data-checked="&#x2713" data-unchecked="&#x2715"></span>
                            </label>
                        </td>
                        <td>
                            <label class="c-switch c-switch-label c-switch-pill c-switch-primary c-switch-sm">
                                <input class="c-switch-input" name="is_baptism" type="checkbox"
                                    {{ $people->is_baptism == true ? 'checked' : '' }}><span class="c-switch-slider"
                                    data-checked="&#x2713" data-unchecked="&#x2715"></span>
                            </label>
                        </td>
                        <td>
                            <label class="c-switch c-switch-label c-switch-pill c-switch-primary c-switch-sm">
                                <input class="c-switch-input" name="is_conversion" type="checkbox"
                                    {{ $people->is_conversion == true ? 'checked' : '' }}><span class="c-switch-slider"
                                    data-checked="&#x2713" data-unchecked="&#x2715"></span>
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
                                <input class="form-check-input" id="is_responsible" name="is_responsible" type="checkbox"
                                    {{ $people->is_responsible == true ? 'checked' : '' }}>
                                <label class="form-check-label" for="check1">Responsável</label>
                            </div>
                            <div class="form-check checkbox">
                                <input class="form-check-input" id="is_visitor" type="checkbox" name="is_visitor"
                                    {{ $people->is_visitor == true ? 'checked' : '' }}>
                                <label class="form-check-label" for="check2">Visitante</label>
                            </div>
                            <div class="form-check checkbox">
                                <input class="form-check-input" id="is_baptism" type="checkbox" name="is_baptism"
                                    {{ $people->is_baptism == true ? 'checked' : '' }}>
                                <label class="form-check-label" for="check4">Batismo</label>
                            </div>
                            <div class="form-check checkbox">
                                <input class="form-check-input" id="is_transferred" type="checkbox" name="is_transferred"
                                    {{ $people->is_transferred == true ? 'checked' : '' }}>
                                <label class="form-check-label" for="check5">Transferido</label>
                            </div>
                            <div class="form-check checkbox">
                                <input class="form-check-input" id="is_conversion" type="checkbox" name="is_conversion"
                                    {{ $people->is_conversion == true ? 'checked' : '' }}>
                                <label class="form-check-label" for="check6">Convertido</label>
                            </div>
                        </div>
                    </div>
                -->
        </div>
    </div>


    <div class="tab-pane" id="notes" role="tabpanel">
        <div class="card-body">
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="textarea-input">{{ __('layout.note')}}
                    @if ($appSystem->obg_note == true)
                        *
                    @endif
                </label>
                <div class="col-md-9">
                    <textarea class="form-control" name="note" id="note" rows="3" placeholder="{{ __('layout.content')}}"
                        @if ($appSystem->obg_note == true) required @endif></textarea>
                </div>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">{{ __('layout.note')}}</th>
                    <th scope="col">{{ __('layout.date')}}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($notes as $note)
                    <tr>
                        <td width="60%">{{ $note->notes }}</td>
                        <td>{{ $note->created_at }}</td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>



    <div class="tab-pane" id="acesso" role="tabpanel">
        <div class="card-body">
            <form class="form-horizontal" action="" method="post">
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="hf-email">{{ __('people.email')}}</label>
                    <div class="col-md-9">
                        <input class="form-control" placeholder="Liberar o acesso"
                            value="@if ($people->user_id) {{ $people->acesso->email }} @endif"
                            autocomplete="email" disabled>
                    </div>
                </div>
        </div>
    </div>
    <button class="btn btn-success" type="submit" title="Salvar"><i class="c-icon c-icon-sm cil-save"></i></button>
    <a class="btn btn-primary" href="{{ route('people.index') }}" title="Voltar"><i
            class="c-icon c-icon-sm cil-action-undo"></i></a>
    </div>
    </div>
    </form>
    <script>
        $("#name").on("input", function() {
            $(this).val($(this).val().toUpperCase());
        });
        $("#state").on("input", function() {
            $(this).val($(this).val().toUpperCase());
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


                    @if ($people->lat)
                        {{ $people->lat }}
                    @else
                        {{ $locations->lat }}
                    @endif,
                    @if ($people->lng)
                        {{ $people->lng }}
                    @else
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

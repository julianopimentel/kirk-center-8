@if ($appPermissao->edit_people == true)
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
                                            class="c-icon c-icon-sm cil-contact text-dark"></i> Dados
                                        Pessoais</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#endereco"
                                        role="tab" aria-controls="endereco"><i
                                            class="c-icon c-icon-sm cil-location-pin text-dark"></i>
                                        Endereço</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#membro"
                                        role="tab" aria-controls="membro"><i
                                            class="c-icon c-icon-sm cil-book text-dark"></i> Membresia</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#notes"
                                        role="tab" aria-controls="notes"><i
                                            class="c-icon c-icon-sm cil-notes text-dark"></i>Anotações</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#acesso"
                                        role="tab" aria-controls="acesso"><i
                                            class="c-icon c-icon-sm cil-https text-dark"></i> Dados de
                                        Acesso</a></li>

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
                                                        <label for="name">Nome *</label>
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
                                                        <label for="ccnumber">Email @if ($appSystem->obg_email == true)
                                                                *
                                                            @endif</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text">
                                                                    <svg class="c-icon">
                                                                        <use
                                                                            xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-at">
                                                                        </use>
                                                                    </svg> </div>
                                                            <input class="form-control" id="email" name="email"
                                                                type="text" placeholder="joao@live.com"
                                                                value="{{ $people->email }}" @if ($appSystem->obg_email == true)
                                                            required
    @endif
    >
    </div>
    </div>
    </div>
    </div>

    <!-- /.row-->
    <div class="row">
        <div class="form-group col-sm-3">
            <div class="form-group">
                <label for="ccnumber">Celular @if ($appSystem->obg_mobile == true)
                        *
                    @endif</label>
                <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text">
                            <svg class="c-icon">
                                <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-mobile">
                                </use>
                            </svg> </div>
                    <input class="form-control" id="mobile" name="mobile" placeholder="11 99999-9999" type="tel"
                        pattern="([0-9]{2}) [0-9]{5}-[0-9]{4}" value="{{ $people->mobile }}" @if ($appSystem->obg_mobile == true)
                    required
                    @endif
                    >
                </div>
            </div>
        </div>
        <div class="form-group col-sm-3">
            <div class="form-group">
                <label for="ccnumber">Data de Nascimento @if ($appSystem->obg_birth == true)
                        *
                    @endif</label>
                <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text">
                            <svg class="c-icon">
                                <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-calendar">
                                </use>
                            </svg> </div>
                    <input class="form-control" id="birth_at" name="birth_at" type="date" placeholder="date"
                        value="{{ $people->birth_at }}" @if ($appSystem->obg_birth == true)
                    required
                    @endif
                    >
                </div>
            </div>
        </div>
        <div class="form-group col-sm-3">
            <label class="col-md-4 col-form-label">Sexo @if ($appSystem->obg_sex == true)
                    *
                @endif</label>
            <div class="col-md-12 col-form-label">
                <div class="form-check form-check-inline mr-1">
                    <input class="form-check-input" id="sex" type="radio" value="m" name="sex"
                        {{ $people->sex == 'm' ? 'checked' : '' }} @if ($appSystem->sex == true)
                    required
                    @endif
                    >
                    <svg class="c-icon">
                        <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-user">
                        </use>
                    </svg> <label class="form-check-label" for="m">Masculino</label>
                </div>
                <div class="form-check form-check-inline mr-1">
                    <input class="form-check-input" id="sex" type="radio" value="f" name="sex"
                        {{ $people->sex == 'f' ? 'checked' : '' }} @if ($appSystem->sex == true)
                    required
                    @endif
                    >
                    <svg class="c-icon">
                        <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-user-female">
                        </use>
                    </svg>
                    <label class="form-check-label" for="f">Feminino</label>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label for="name">Permissão *</label>
                <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text">
                            <svg class="c-icon">
                                <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-face">
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
            <input class="form-check-input" id="criar_acesso" name="criar_acesso" type="checkbox">
            <label class="form-check-label" for="check1">Criar acesso</label>
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
                            <label for="city">Latitude</label>
                            <div class="input-group-prepend">
                                <span name="lat-span" id="lat-span"></span>
                            </div>
                            <input class="form-control" name="lat-span" type="text">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="city">Longitude</label>
                            <div class="input-group-prepend">
                                <span name="lon-span" id="lon-span"></span>
                            </div>
                            <input class="form-control" name="lon-span" type="text">
                        </div>
                        Por favor copiar valores nos campos acima ao selecionar o local no mapa
                    </div>
                </ul>
            @else
                <div class="row">
                    <div class="form-group col-sm-8">
                        <label for="street">Street</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">
                                    <svg class="c-icon">
                                        <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-address-book">
                                        </use>
                                    </svg> </div>
                            <input class="form-control" id="address" name="address" type="text"
                                placeholder="Enter street name" value="{{ $people->address }}">
                        </div>
                    </div>

                    <div class="form-group col-sm-4">
                        <label for="postal-code">Postal Code</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">
                                    <svg class="c-icon">
                                        <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-newspaper">
                                        </use>
                                    </svg> </div>
                            <input class="form-control" id="cep" name="cep" type="text" placeholder="Postal Code"
                                value="{{ $people->cep }}" pattern="[0-9]{5}-[0-9]{3}" maxlength="9">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label for="city">Country</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">
                                    <svg class="c-icon">
                                        <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-globe-alt">
                                        </use>
                                    </svg> </div>
                            <select id="country-dd" name="country-dd" class="form-control">
                                <option value="">Clear Country</option>
                                @foreach ($countries as $data)
                                    @if ($data->id == $people->country)
                                        <option value="{{ $data->id }}" selected="true">
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
                        <label for="country">State @if ($appSystem->obg_state == true)
                                *
                            @endif</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">
                                    <svg class="c-icon">
                                        <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-home">
                                        </use>
                                    </svg> </div>
                            <select name="state-dd" id="state-dd" class="form-control">
                                @foreach ($state as $data)
                                    @if ($data->id == $people->state)
                                        <option value="{{ $data->id }}" selected="true">
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
        <label for="city">City @if ($appSystem->obg_city == true)
                *
            @endif</label>
        <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text">
                    <svg class="c-icon">
                        <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-house">
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
                <label class="col-md-3 col-form-label" for="disabled-input">Ativo</label>
                <div class="col-md-9">
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
        </div>
    </div>


    <div class="tab-pane" id="notes" role="tabpanel">
        <div class="card-body">
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="textarea-input">Anotações
                    @if ($appSystem->obg_note == true)
                        *
                    @endif
                </label>
                <div class="col-md-9">
                    <textarea class="form-control" name="note" id="note" rows="9" placeholder="Content.." @if ($appSystem->obg_note == true)
                                                                                                                    required
                                                                                                                    @endif
                                                                                                                    ></textarea>
                </div>
            </div>
        </div>

        <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Anotação</th>
                        <th scope="col">Data registrada</th>
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
                    <label class="col-md-3 col-form-label" for="hf-email">Email</label>
                    <div class="col-md-9">
                        <input class="form-control" placeholder="Liberar o acesso" value="@if ($people->user_id) {{ $people->acesso->email }} @endif"
                            autocomplete="email" disabled>
                    </div>
                </div>
        </div>
    </div>
    <button id="btn" class="btn btn-success" type="submit">Salvar</button>
    <a class="btn btn-primary" href="{{ route('people.index') }}">Retornar</a>
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


                    lat: @if ($people->lat) {{ $people->lat }} @else {{ $locations->lat }} @endif,
                    lng: @if ($people->lng) {{ $people->lng }} @else {{ $locations->lng }} @endif
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
                        $('#state-dd').html('<option value="">Select State</option>');
                        $.each(result.states, function(key, value) {
                            $("#state-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city-dd').html('<option value="">Select City</option>');
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
                        $('#city-dd').html('<option value="">Select City</option>');
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

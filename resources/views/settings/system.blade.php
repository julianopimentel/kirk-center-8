@if ($appPermissao->settings_general == true)
    @extends('layouts.base')
    @section('content')
        <div class="container-fluid">
            <div class="fade-in">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Configurações Gerais</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('settings.updateSystem') }}" method="POST">
                                    @csrf
                                    <!--
                                                    <div class="form-group">
                                                        <label class="control-label">Favicon (25*25)</label><br />
                                                        <p><img src="http://demo.deskapps.net/assets/img/a99e81e77b7b1bfb330d46479c4dd282.jpg"
                                                                class="favicon"></p>
                                                        <input type="file" name="favicon" accept=".png, .jpg, .jpeg, .gif, .svg">
                                                        <p><small class="text-success">Allowed Types: gif, jpg, png, jpeg</small></p>
                                                        <input type="hidden" name="favicon"
                                                            value="assets/img/a99e81e77b7b1bfb330d46479c4dd282.jpg">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Logo</label><br />
                                                        <p><img src="http://demo.deskapps.net/assets/img/2e79d6b2095794bd62b0155dae20ac08.jpg"
                                                                class="logo" width="150"></p>
                                                        <input type="file" name="logo" accept=".png, .jpg, .jpeg, .gif, .svg">
                                                        <p><small class="text-success">Allowed Types: gif, jpg, png, jpeg</small></p>
                                                        <input type="hidden" name="logo"
                                                            value="assets/img/2e79d6b2095794bd62b0155dae20ac08.jpg">
                                                    </div>
                                                    
                                    <div class="form-group">
                                        <label class="control-label">Nome da aplicação</label>
                                        <input type="text" class="form-control" name="name" placeholder="Application name"
                                            value="{{ $settings->name }}" required>
                                    </div>
                                    -->
                                    <!--
                                                            <div class="form-group">
                                                                <label class="control-label">Linguagem padrão</label>
                                                                <select name="language" class="form-control">
                                                                    <option value="1">Portuguese-BR</option>
                                                                    <option value="2">English</option>
                                                                </select>
                                                            </div>
                                                            -->
                                    <div class="form-group">
                                        <label class="control-label"><strong>Moeda</strong></label>
                                        <input type="text" class="form-control" name="currency" placeholder="currency"
                                            value="{{ $settings->currency }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label"><strong>Meus dados - Pessoas </strong></label>
                                        <div class="inner">
                                            <div class="form-check form-check-inline mr-1">
                                                <input class="form-check-input" name="obg_last_name" type="checkbox"
                                                    {{ $settings->obg_last_name == true ? 'checked' : '' }}>
                                                <label class="form-check-label" for="check1">Sobrenome obrigatório</label>
                                            </div>
                                        </div>
                                        <div class="inner">
                                            <div class="form-check form-check-inline mr-1">
                                                <input class="form-check-input" name="obg_email" type="checkbox"
                                                    {{ $settings->obg_email == true ? 'checked' : '' }}>
                                                <label class="form-check-label" for="check1">Email obrigatório</label>
                                            </div>
                                        </div>
                                        <div class="inner">
                                            <div class="form-check form-check-inline mr-1">
                                                <input class="form-check-input" name="obg_mobile" type="checkbox"
                                                    {{ $settings->obg_mobile == true ? 'checked' : '' }}>
                                                <label class="form-check-label" for="check1">Celular obrigatório</label>
                                            </div>
                                        </div>
                                        <div class="inner">
                                            <div class="form-check form-check-inline mr-1">
                                                <input class="form-check-input" name="obg_birth" type="checkbox"
                                                    {{ $settings->obg_birth == true ? 'checked' : '' }}>
                                                <label class="form-check-label" for="check1">Aniversário obrigatório</label>
                                            </div>
                                        </div>
                                        <div class="inner">
                                            <div class="form-check form-check-inline mr-1">
                                                <input class="form-check-input" name="obg_sex" type="checkbox"
                                                    {{ $settings->obg_sex == true ? 'checked' : '' }}>
                                                <label class="form-check-label" for="check1">Sexo obrigatório</label>
                                            </div>
                                        </div>
                                        <div class="inner">
                                            <div class="form-check form-check-inline mr-1">
                                                <input class="form-check-input" name="obg_note" type="checkbox"
                                                    {{ $settings->obg_note == true ? 'checked' : '' }}>
                                                <label class="form-check-label" for="check1">Observação obrigatório</label>
                                            </div>
                                        </div>
                                        <label class="control-label"><strong>Localização</strong></label>
                                        <div class="inner">
                                            <div class="form-check form-check-inline mr-1">
                                                <input class="form-check-input" name="obg_city" type="checkbox"
                                                    {{ $settings->obg_city == true ? 'checked' : '' }}>
                                                <label class="form-check-label" for="check1">Cidade obrigatório</label>
                                            </div>
                                        </div>
                                        <div class="inner">
                                            <div class="form-check form-check-inline mr-1">
                                                <input class="form-check-input" name="obg_state" type="checkbox"
                                                    {{ $settings->obg_state == true ? 'checked' : '' }}>
                                                <label class="form-check-label" for="check1">Estado obrigatório</label>
                                            </div>
                                        </div>

                                        <div class="inner">
                                            <div class="form-check form-check-inline mr-1">
                                                <input class="form-check-input" name="geolocation" type="checkbox"
                                                    {{ $settings->geolocation == true ? 'checked' : '' }}>
                                                <label
                                                    title="Caso ative a opção de localização, os campos de endereço nas pessoas ficam ocultos até a desativação dessa opção"
                                                    class="form-check-label" for="check1">Utilizar geolocalização<span
                                                        class="badge badge-info">Beta</span><small>Usado para implantação de igrejas, mas necessário configurar cada pessoa</small></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label"><strong>Timezone</strong></label>
                                        <input type="text" class="form-control" name="timezone" placeholder="timezone"
                                            value="{{ $settings->timezone }}" required>
                                        <a href="http://php.net/manual/en/timezones.php" target="_blank">Timezone</a>
                                    </div>
                                    <!-- /.row-->
                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <a class="btn btn-dark" href="{{ route('settings') }}">Return</a>
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
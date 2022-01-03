@if ($appPermissao->settings_social == true)
@extends('layouts.base')
@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header"><h4>Configurações de Redes Sociais</h4></div>
                        <div class="card-body">
                            <form action="{{ route('settings.updateSocial') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="control-label">Facebook</label>
                                    <input type="text" class="form-control" name="facebook_link" placeholder="https://facebook.com" value="{{ $settings->facebook_link }}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Twitter</label>
                                    <input type="text" class="form-control" name="twitter_link" placeholder="https://twitter.com" value="{{ $settings->twitter_link }}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Google Plus</label>
                                    <input type="text" class="form-control" name="google_link" placeholder="https://google.com" value="{{ $settings->google_link }}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Youtube</label>
                                    <input type="text" class="form-control" name="youtube_link" placeholder="https://youtube.com" value="{{ $settings->youtube_link }}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">LinkedIn</label>
                                    <input type="text" class="form-control" name="linkedin_link" placeholder="https://linkedin.com" value="{{ $settings->linkedin_link }}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">VK</label>
                                    <input type="text" class="form-control" name="vk_link" placeholder="https://vk.com" value="{{ $settings->vk_link }}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Site</label>
                                    <input type="text" class="form-control" name="site_link" placeholder="https://seusite.com" value="{{ $settings->site_link }}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">WhatsApp</label>
                                    <input type="text" class="form-control" name="whatsapp_link" placeholder="5521981255454" value="{{ $settings->whatsapp_link }}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Telegram</label>
                                    <input type="text" class="form-control" name="telegram_link" placeholder="seuusuario" value="{{ $settings->telegram_link }}">
                                </div>
                                <!-- /.row-->
                        <!-- /.row-->
                        <button class="btn btn-success" type="submit">Salvar</button>
                        <a class="btn btn-primary" href="{{ route('settings') }}">Retornar</a>
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

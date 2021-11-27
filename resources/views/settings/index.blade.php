@if (($appPermissao->settings_general or $appPermissao->settings_email or $appPermissao->settings_meta or $appPermissao->settings_social or $appPermissao->settings_roles or $appPermissao->add_people) == true)
@extends('layouts.base')
@section('content')
          <div class="col-sm-12">
                        <div class="card-body">
                            <div class="section-body">
                                <h4 class="section-title">Settings</h4>
                                <p class="section-lead">
                                    Organize and adjust all settings about this site.
                                </p>
                                <div class="row">
                                    @if ($appPermissao->settings_general == true)
                                    <div class="col-lg-6">
                                        <div class="card card-large-icons">
                                            <div class="card-icon bg-primary text-white">
                                                <i class="fas fa-cog"></i>
                                            </div>
                                            <div class="card-body">
                                                <h4>General</h4>
                                                <p>Informações gereais e configurações da conta</p>
                                                <a href="{{ route('indexSystem') }}" class="card-cta">Change Setting <i
                                                        class="fas fa-chevron-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if ($appPermissao->settings_social == true)
                                    <div class="col-lg-6">
                                        <div class="card card-large-icons">
                                            <div class="card-icon bg-primary text-white">
                                                <i class="fas fa-search"></i>
                                            </div>
                                            <div class="card-body">
                                                <h4>SEO</h4>
                                                <p>Configurações de Rede Sociais</p>
                                                <a href="{{ route('indexSocial') }}" class="card-cta">Change Setting <i
                                                        class="fas fa-chevron-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if ($appPermissao->settings_email == true)
                                    <div class="col-lg-6">
                                        <div class="card card-large-icons">
                                            <div class="card-icon bg-primary text-white">
                                                <i class="fas fa-envelope"></i>
                                            </div>
                                            <div class="card-body">
                                                <h4>Email</h4>
                                                <p>Configuração do SMTP e templetas.</p>
                                                <a href="{{ route('indexEmail') }}" class="card-cta">Change Setting <i
                                                        class="fas fa-chevron-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if ($appPermissao->settings_roles == true)
                                    <div class="col-lg-6">
                                        <div class="card card-large-icons">
                                            <div class="card-icon bg-primary text-white">
                                                <i class="fas fa-users"></i>
                                            </div>
                                            <div class="card-body">
                                                <h4>Roles</h4>
                                                <p>Configurações de grupos e permissões</p>
                                                <a href="{{ url('settings/roles') }}" class="card-cta">Change Setting <i
                                                        class="fas fa-chevron-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if ($appPermissao->settings_meta == true)
                                    <div class="col-lg-6">
                                        <div class="card card-large-icons">
                                            <div class="card-icon bg-primary text-white">
                                                <i class="fas fa-chart-line"></i>
                                            </div>
                                            <div class="card-body">
                                                <h4>Meta</h4>
                                                <p>Configurar metas para o uso do Dashboard</p>
                                                <a href="{{ route('indexMeta') }}" class="card-cta">Change Setting <i
                                                        class="fas fa-chevron-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if ($appPermissao->add_people == true)
                                    <div class="col-lg-6">
                                        <div class="card card-large-icons">
                                            <div class="card-icon bg-primary text-white">
                                                <i class="fas fa-cloud"></i>
                                            </div>
                                            <div class="card-body">
                                                <h4>Backup</h4>
                                                <p>Importar ou gerar backup.</p>
                                                <a href={{ url('settings/backup') }} class="card-cta text-primary">Change
                                                    Setting <i class="fas fa-chevron-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /.col-->
                    </div>
                    <!-- /.row-->
                </div>

            @endsection

            @section('javascript')

            @endsection
            @else
            @include('errors.redirecionar')
            @endif
    
@extends('layouts.base')
@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header"><strong>Dados do Perfil</strong></div>
                        <div class="card-body">
                            <form action="{{ route('profile.update') }}" method="POST" role="form"
                                enctype="multipart/form-data">
                                @csrf
                                <center>
                                    @if (!empty(Auth::user()->image))
                                        <img class="image rounded-circle" src="{{ auth()->user()->image }}"
                                            alt="profile_image"
                                            style="width: 160px;height: 160px; padding: 10px; margin: 0px; ">
                                    @endif
                                </center>

                                <div class="row">
                                    <label for="profile_image" class="col-md-4 col-form-label text-md-right">Profile
                                        Image</label>
                                    <div class="form-group col-sm-6">
                                        <input id="profile_image" type="file" class="form-control" name="profile_image">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Nome</label>
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
                                                <input class="form-control" type="text" value='{{ Auth::user()->name }}'
                                                    name="name" required>
                                            </div>
                                        </div>
                                    </div>
                                    @if (Auth::user()->isAdmin() == true)
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="name">CNPJ/CPF</label>
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
                                                        value='{{ Auth::user()->doc }}' name="doc" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="ccnumber">Email</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">@</span>
                                                </div>
                                                <input class="form-control" name="email" type="email"
                                                    placeholder="joao@live.com" autocomplete="joao@live.com"
                                                    value="{{ Auth::user()->email }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="ccnumber">Celular</label>
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
                                                <input id="phone" name="mobile" type="tel"
                                                    value="{{ Auth::user()->mobile }}" required>
                                                <span id="valid-msg" class="hide">✓ Valid</span>
                                                <span id="error-msg" class="hide"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.row-->
                                <button class="btn btn-success" type="submit" title="Salvar"><i
                                        class="c-icon c-icon-sm cil-save"></i></button>
                                <a href="{{ route('account.index') }}" class="btn btn-primary" title="Voltar"><i
                                        class="c-icon c-icon-sm cil-action-undo"></i></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row-->
    <!-- /.col-->
@endsection

@section('javascript')
@endsection

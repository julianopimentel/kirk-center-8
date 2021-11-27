@extends('layouts.authBase')

@section('content')

    <div id="app">
        <section class="section">
            <div class="d-flex flex-wrap align-items-stretch">
                <div class="col-lg-4 col-md-12 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                    <div class="p-4">
                        <img src="assets/favicon/android-chrome-96x96.png" alt="logo" width="80"
                            class="shadow-light rounded-circle mb-5 mt-2">
                        <h4 class="text-dark font-weight-normal">Welcome to <span class="font-weight-bold">DeskApps</span>
                        </h4>
                        <p class="text-muted">
                        <p>{{ __('auth.loren') }}</p>
                        </p>
                        <p class="text-muted">{{ __('auth.sign_in') }}</p>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <svg class="c-icon">
                                                <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-user"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <input class="form-control" type="text" placeholder="{{ __('E-Mail Address') }}"
                                        name="email" value="{{ old('email') }}" autofocus>
                                </div>
                            </div>
                            @error('email')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <strong>Error!</strong> {{ $message }}
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            @enderror
                             <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <svg class="c-icon">
                                                <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-lock-locked">
                                                </use>
                                            </svg>
                                        </span>
                                    </div>
                                    <input class="form-control" type="password" placeholder="{{ __('Password') }}"
                                        name="password">
                                </div>
                            </div>
                            @error('password')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <strong>Error!</strong> {{ $message }}
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            @enderror
                            <!--
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                                        id="remember-me">
                                    <label class="custom-control-label" for="remember-me">Remember Me</label>
                                </div>
                            </div> -->
                            <div class="form-group text-right">
                                <a href="{{ route('password.request') }}"
                                    class="float-left mt-3">{{ __('auth.forgot_password') }}</a>

                                <button class="btn btn-dark px-4" data-toggle="modal" data-target=".cd-load"
                                    type="submit">{{ __('auth.login') }}</button>
                            </div>
                            <div class="mt-5 text-center">
                                Don't have an account? <a href="{{ route('register') }}">Create new one</a>
                                @if (Route::has('password.request'))
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-8 col-12  order-lg-2 order-1 min-vh-100 background-walk-y position-fix overlay-gradient-bottom"
                    style="background-image: url(assets/img/login-home.jpg)">
                    
                    <div class="absolute-bottom-left index-2">
                        <div class="text-dark p-5 pb-2">
                            <div class="mb-5 pb-3">
                                <h1 class="mb-2 display-4 font-weight-bold text-dark">Gestão de Igrejas</h1>
                                <h5 class="font-weight-normal text-muted-transparent text-dark">Gostaria de gerenciar sua
                                    igreja conoscos?</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('javascript')

@endsection

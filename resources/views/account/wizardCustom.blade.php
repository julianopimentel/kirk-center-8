@extends('layouts.authBase')
{!! NoCaptcha::renderJs() !!}
@section('content')
    <div class="container mt-2">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <br>
                <div class="card mx-4">
                    <div class="card-body p-4">
                        <div class="card-header">
                            <h4>{{ __('auth.welcome') }}{{ session()->get('conta_name') }}</h4>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('wizardCustom.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                        <label for="first_name">{{ __('people.name') }}*</label>
                                        <input class="form-control" type="text" placeholder="{{ __('auth.name') }}"
                                            name="name" value="{{ old('name') }}" required autofocus>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                        <label for="last_name">{{ __('people.last_name') }}</label>
                                        <input id="last_name" type="text" class="form-control" placeholder="Sobrenome"
                                            name="last_name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email">{{ __('auth.email') }}*</label>
                                    <input class="form-control" type="text" placeholder="{{ __('auth.email') }}"
                                        name="email" value="{{ old('email') }}" required>
                                    <div class="invalid-feedback">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <label for="password" class="d-block">{{ __('auth.password') }}*</label>
                                        <input class="form-control" type="password"
                                            placeholder="{{ __('auth.password') }}" name="password" required>
                                        <div id="pwindicator" class="pwindicator">
                                            <div class="bar"></div>
                                            <div class="label"></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <label for="password2"
                                            class="d-block">{{ __('auth.confirm_password') }}*</label>
                                        <input class="form-control" type="password"
                                            placeholder="{{ __('auth.confirm_password') }}" name="password_confirmation"
                                            required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <label>{{ __('auth.mobile') }}</label>
                                        <input class="form-control" id="phone" name="phone" type="tel">
                                        <span id="valid-msg" class="hide">✓ Valid</span>
                                        <span id="error-msg" class="hide"></span>

                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-4">
                                        {!! app('captcha')->display() !!}
                                        @if ($errors->has('g-recaptcha-response'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="agree" class="custom-control-input" id="agree"
                                            required>
                                        <label class="custom-control-label" for="agree">{{ __('auth.agree') }}<a
                                                href="https://deskapp.online/terms.php">{{ __('auth.term') }}</a>
                                            {{ __('auth.and') }}
                                            <a href="https://deskapp.online/privacy.php">
                                                {{ __('auth.privacy') }}
                                            </a></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" data-sitekey="{{ config('app.recaptcha_site_key') }}" class="g-recaptcha btn btn-dark btn-lg btn-block" tabindex="4">
                                        {{ __('auth.register') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!--
                <div class="card-footer p-4">
                  <div class="row">
                    <div class="col-6">
                      <button class="btn btn-block btn-facebook" type="button">
                        <span>Facebook</span>
                      </button>
                    </div>
                    <div class="col-6">
                      <button class="btn btn-block btn-twitter" type="button">
                        <span>T witter</span>
                      </button>
                    </div>
                  </div>
                  -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
@endsection

@extends('layouts.authBase')
@section('content')

<div class="container mt-5">
    <div class="row">
      <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
        <div class="card card-dark">
          <div class="card-header"><h4>{{ __('auth.forget_password') }}</h4></div>

          <div class="card-body">
            <p class="text-muted">{{ __('auth.reset_frase_2') }}</p>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

              <div class="form-group">
                <label for="email">{{ __('auth.email') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
            </div>

              <div class="form-group">
                <label for="password">{{ __('auth.password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                <div id="pwindicator" class="pwindicator">
                  <div class="bar"></div>
                  <div class="label"></div>
                </div>
              </div>

              <div class="form-group">
                <label for="password-confirm">{{ __('auth.confirm_password') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>

              <div class="form-group">
                <button type="submit" class="btn btn-dark btn-lg btn-block" tabindex="4">
                {{ __('auth.reset_password') }}
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="simple-footer">
          Copyright &copy; DeskApps
        </div>
      </div>
    </div>
  </div>
@endsection

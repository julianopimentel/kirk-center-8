@extends('layouts.authBase')
@section('content')
      <div class="container mt-2">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="{{ url('assets/favicon/android-chrome-96x96.png') }}" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>
            <div class="card card-dark">
              <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                  <div class="form-group">
                    <label for="email">{{ __('auth.email') }}</label>
                    <input class="form-control" type="text" placeholder="{{ __('auth.email') }}"
                    name="email" value="{{ old('email') }}" tabindex="1" required autofocus>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">{{ __('auth.password') }}</label>
                      <div class="float-right">
                        <a href="{{ route('password.request') }}" class="text-small">
                        {{ __('auth.forgot_password') }}
                        </a>
                      </div>
                    </div>
                    <input class="form-control" type="password" placeholder="{{ __('auth.password') }}"  id="password"
                    name="password" tabindex="2" required>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-dark btn-lg btn-block" data-toggle="modal" data-target=".cd-load"
                    type="submit" minlength="6" id="botao" disabled>{{ __('auth.login') }}</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
            {{ __('auth.register_') }} <a href="{{ route('register') }}">{{ __('auth.register_up') }}</a>
            </div>
            <div class="simple-footer">
              Copyright &copy; DeskApps
            </div>
          </div>
        </div>

        <script>
          $("#password").on("input", function() {
              $("#botao").prop('disabled', $(this).val().length < 6);
          });
      </script>

@endsection

@section('javascript')

@endsection

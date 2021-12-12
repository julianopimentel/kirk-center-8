@extends('layouts.authBase')

@section('content')

<div class="container mt-5">
    <div class="row">
      <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
        <div class="login-brand">
          <img src="../assets/favicon/android-chrome-96x96.png" alt="logo" width="100" class="shadow-light rounded-circle">
        </div>

        <div class="card card-dark">
          <div class="card-header"><h4>{{ __('Reset Password') }}</h4></div>

          <div class="card-body">
            <p class="text-muted">We will send a link to reset your password</p>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
              <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" required autofocus>
            </div>

              <div class="form-group">
                <button type="submit" class="btn btn-dark btn-lg btn-block" tabindex="4">
                    {{ __('Forgot Password') }}
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

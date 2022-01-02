@extends('layouts.authBase')


@section('content')

    <div class="container mt-2">
      <div class="row justify-content-center">

        <div class="col-md-6">
          <center>
            <img class="image rounded-circle" src="assets/favicon/android-chrome-96x96.png" alt="profile_image" style="width: 120px;height: 120px; padding: 10px; margin: 0px; ">
            </center>
          <div class="card mx-4">
            <div class="card-body p-4">
                <div class="card-header"><h4>Register</h4></div>

                <div class="card-body">
                  <form method="POST" action="{{ route('register') }}">
                    @csrf
                <div class="row">
                  <div class="form-group col-6">
                    <label for="first_name">First Name</label>
                    <input class="form-control" type="text" placeholder="{{ __('auth.name') }}" name="name" value="{{ old('name') }}" required autofocus>
                  </div>
                  <div class="form-group col-6">
                    <label for="last_name">Last Name</label>
                    <input id="last_name" type="text" class="form-control" placeholder="Sobrenome" name="last_name">
                  </div>
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input class="form-control" type="text" placeholder="{{ __('auth.email') }}" name="email" value="{{ old('email') }}" required>
                  <div class="invalid-feedback">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                    <label for="password" class="d-block">Password</label>
                    <input class="form-control" type="password" placeholder="{{ __('auth.password') }}" name="password" required>
                    <div id="pwindicator" class="pwindicator">
                      <div class="bar"></div>
                      <div class="label"></div>
                    </div>
                  </div>
                  <div class="form-group col-6">
                    <label for="password2" class="d-block">Password Confirmation</label>
                    <input class="form-control" type="password" placeholder="{{ __('auth.confirm_password') }}" name="password_confirmation" required>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                    <label>Telefone</label>
                    <input class="form-control" type="tel" placeholder="21 998121-1212" name="mobile"  required autofocus
                    pattern="([0-9]{2}) [0-9]{5}-[0-9]{4}">
                  </div>
                  <div class="form-group col-6">
                    <label>Country</label>
                    <select class="form-control selectric" name="country">
                      <option value="BRAZIL">Brazil</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="agree" class="custom-control-input" id="agree" required>
                    <label class="custom-control-label" for="agree">I agree with the <a href="https://deskapp.online/terms.php">Terms & Conditions</a> and  <a href="https://deskapp.online/privacy.php">Privacy Policy</a></label>
                  </div>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-dark btn-lg btn-block">
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

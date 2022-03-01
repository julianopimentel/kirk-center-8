@extends('layouts.baseminimal')

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> {{ __('Edit') }} {{ $user->name }}
                        </div>
                        <div class="card-body">
                            <br>
                            <form method="POST" action="/users/{{ $user->id }}">
                                @csrf
                                @method('PUT')
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <svg class="c-icon c-icon-sm">
                                                <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-user"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <input class="form-control" type="text" placeholder="{{ __('Name') }}" name="name"
                                        value="{{ $user->name }}" required autofocus>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                    </div>
                                    <input class="form-control" type="text" placeholder="{{ __('E-Mail Address') }}"
                                        name="email" value="{{ $user->email }}" required>
                                </div>
                                <div class="input-group mb-3">
                                    <input class="form-control" id="phone" name="phone" type="tel"
                                        value="{{ $user->mobile }}">
                                    <span id=" valid-msg" class="hide">✓ Valid</span>
                                    <span id="error-msg" class="hide"></span>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <svg class="c-icon c-icon-sm">
                                                <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-plus"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <input class="form-control" type="number" placeholder="{{ __('License') }}"
                                        name="license" value="{{ $user->license }}" required autofocus>
                                </div>
                                <button class="btn btn-block btn-success" type="submit">{{ __('Save') }}</button>
                                <a href="{{ route('users.index') }}"
                                    class="btn btn-block btn-primary">{{ __('Return') }}</a>
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

@extends('layouts.baseminimal')

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-8 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            {{ __('Editar o usuário') }} {{ $user->name }}
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
                                <div class="row">
                                    <div class="form-group col-sm-3">Master?
                                        <label class="c-switch c-switch-label c-switch-pill c-switch-primary c-switch-sm">
                                            <input class="c-switch-input" name="master" type="checkbox"
                                                {{ $user->master == true ? 'checked' : '' }} @if ( $user->integrador_id == !null)
                                                    disabled
                                                @endif><span class="c-switch-slider"
                                                data-checked="&#x2713" data-unchecked="&#x2715"></span>
                                        </label>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        Integrador:
                                        {{ $user->integrador_id }}
                                    </div>
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

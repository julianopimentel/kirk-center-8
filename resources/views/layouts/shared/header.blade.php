@php
$user = App\Models\User::find(auth()->user()->id);
@endphp
<div class="c-wrapper">
    <header class="c-header c-header-light c-header-with-subheader">
        <button class="c-header-toggler c-class-toggler d-lg-none mr-auto" type="button" data-target="#sidebar"
            data-class="c-sidebar-show"><span class="c-header-toggler-icon"></span></button>

        <ul class="c-header-nav ml-auto mr-4">
            <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                    class="nav-link notification-toggle nav-link-lg @if ($user->notifications()->count() > 0) beep @endif"><i
                        class="far fa-bell"></i></a>
                <div class="dropdown-menu dropdown-list dropdown-menu-right">
                    <div class="dropdown-header">Notificações
                        <div class="float-right">
                            <a href="#">Marcar todos como lida</a>
                        </div>
                    </div>
                    <div class="dropdown-list-content dropdown-list-icons">

                        @include('layouts.shared.notification')
                        @if ($user->notifications()->count() == 0)
                            <a href="#" class="dropdown-item dropdown-item-unread">
                                <div class="dropdown-item-icon bg-info text-white">
                                    <i class="fas fa-heart"></i>
                                </div>
                                <div class="dropdown-item-desc">
                                    Por enquanto sem novidade para você.
                                    <div class="time text-primary"></div>
                                </div>
                            </a>
                        @endif

                        <div class="dropdown-footer text-center">
                            <a href="#">Ver todas <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
            </li>

            <li class="dropdown"><a href="#" data-toggle="dropdown"
                    class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    @if (empty(Auth::user()->image))
                        <img alt="image" src="{{ url('/public/user.png?v=1') }}" class="rounded-circle mr-1"
                            style="width: 40px;height: 40px">
                    @endif
                    @if (!empty(Auth::user()->image))
                        <img alt="image" src="{{ auth()->user()->image }}" class="rounded-circle mr-1"
                            style="width: 40px;height: 40px">
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-title">Olá,
                        @if (session('key'))
                            {{ ucwords(strtolower(Auth::user()->people->name)) }}
                        @else
                            {{ ucwords(strtolower(Auth::user()->name)) }}
                        @endif
                    </div>
                    <a class="dropdown-item" href="{{ route('profile.index') }}">
                        <svg class="c-icon mr-2">
                            <use xlink:href="{{ url('/icons/sprites/free.svg#cil-user') }}"></use>
                        </svg> {{ __('layout.profile') }}</a>
                    <a class="dropdown-item" href="{{ route('password.index') }}">
                        <svg class="c-icon mr-2">
                            <use xlink:href="{{ url('/icons/sprites/free.svg#cil-lock-locked') }}"></use>
                        </svg> {{ __('layout.change_password') }}</a>
                    @if (Auth::user()->menuroles === 'admin')
                        <a class="dropdown-item" href="{{ route('license_index') }}">
                            <svg class="c-icon mr-2">
                                <use xlink:href="{{ url('/icons/sprites/free.svg#cil-credit-card') }}"></use>
                            </svg>{{ __('layout.payments') }}</a>
                    @endif
                    @if (Auth::user()->isAdmin() === true)
                        <a class="dropdown-item" href="{{ route('logs.index') }}">
                            <svg class="c-icon mr-2">
                                <use xlink:href="{{ url('/icons/sprites/free.svg#cil-history') }}"></use>
                            </svg>{{ __('layout.aud') }}</a>
                    @endif
                    @if (($appPermissao->settings_general or $appPermissao->settings_email or $appPermissao->settings_meta or $appPermissao->settings_social or $appPermissao->settings_roles) == true)
                        <a class="dropdown-item" href="{{ route('settings') }}">
                            <svg class="c-icon mr-2">
                                <use xlink:href="{{ url('/icons/sprites/free.svg#cil-settings') }}"></use>
                            </svg> {{ __('layout.configuration') }}</a>
                    @endif
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('account.index') }}">
                        <svg class="c-icon mr-2">
                            <use xlink:href="{{ url('/icons/sprites/free.svg#cil-building') }}"></use>
                        </svg>{{ __('layout.select_account') }}</a>
                    <a href="{{ route('logout.perform') }}" class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> {{ __('layout.logout') }}
                    </a>
                </div>
            </li>
        </ul>
    </header>

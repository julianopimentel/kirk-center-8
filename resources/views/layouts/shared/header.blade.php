<div class="c-wrapper">
    <header class="c-header c-header-light c-header-with-subheader">
        <button class="c-header-toggler c-class-toggler d-lg-none mr-auto" type="button" data-target="#sidebar"
            data-class="c-sidebar-show"><span class="c-header-toggler-icon"></span></button>

        <ul class="c-header-nav ml-auto mr-4">
            <li class="c-header-nav-item d-md-down-none mx-2">
                <a class="c-header-nav-link">
                    <strong>
                        @if (session('key'))
                            {{ ucwords(strtolower(Auth::user()->people->name)) }}
                        @else
                            {{ ucwords(strtolower(Auth::user()->name)) }}
                        @endif
                    </strong> &nbsp
                </a>
            <li class="c-header-nav-item dropdown"><a class="c-header-nav-link" data-toggle="dropdown" href="#"
                    role="button" aria-haspopup="true" aria-expanded="false">

                    @if (empty(Auth::user()->image))
                        <div class="c-avatar"><img class="c-avatar-img"
                                src="{{ url('/public/user.png?v=1') }}"></div>
                    @endif

                    @if (!empty(Auth::user()->image))
                        <div class="c-avatar"><img class="c-avatar-img" src="{{ auth()->user()->image }}"
                                style="width: 40px;height: 40px"></div>
                    @endif

                </a>
                <div class="dropdown-menu dropdown-menu-right pt-0">
                    <div class="dropdown-header bg-light py-2"><strong>{{ __('layout.account') }}</strong></div>
                    <a class="dropdown-item" href="/updates">
                        <svg class="c-icon mr-2">
                            <use xlink:href="{{ url('/icons/sprites/free.svg#cil-bell') }}"></use>
                        </svg> {{ __('layout.news') }}<span class="badge badge-info ml-auto">42</span></a>
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
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('account.index') }}">
                        <svg class="c-icon mr-2">
                            <use xlink:href="{{ url('/icons/sprites/free.svg#cil-building') }}"></use>
                        </svg>{{ __('layout.select_account') }}</a>
                    <a class="dropdown-item">
                        <svg class="c-icon mr-2">
                            <use xlink:href="{{ url('/icons/sprites/free.svg#cil-account-logout') }}"></use>
                        </svg>
                        <form action="{{ url('/logout') }}" method="POST"> @csrf
                            <button type="submit" class="dropdown-item">{{ __('layout.logout') }}</button>
                        </form>
                    </a>
                </div>
            </li>
        </ul>
    </header>

<div class="c-wrapper">
    <header class="c-header c-header-light c-header-with-subheader">
        <button class="c-header-toggler c-class-toggler d-lg-none mr-auto" type="button" data-target="#sidebar"
            data-class="c-sidebar-show"><span class="c-header-toggler-icon"></span></button>

        <ul class="c-header-nav ml-auto mr-4">
            <li class="c-header-nav-item d-md-down-none mx-2">
                <a class="c-header-nav-link">
                    <strong>
                        {{ ucwords(strtolower(Auth::user()->name)) }}
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
                    <a href="{{ route('logout.perform') }}" class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> {{ __('layout.logout') }}
                    </a>
                </div>
            </li>
        </ul>
    </header>

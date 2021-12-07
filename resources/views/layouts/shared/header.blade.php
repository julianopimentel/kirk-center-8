<div class="c-wrapper">
    <header class="c-header c-header-light c-header-with-subheader">
        <button class="c-header-toggler c-class-toggler d-lg-none mr-auto" type="button" data-target="#sidebar"
            data-class="c-sidebar-show"><span class="c-header-toggler-icon"></span></button>

        <ul class="c-header-nav ml-auto mr-4">
            <li class="c-header-nav-item d-md-down-none mx-2">
                <a class="c-header-nav-link">
                    <strong>{{ Auth::user()->name }} </strong> &nbsp
                </a>
            <li class="c-header-nav-item dropdown"><a class="c-header-nav-link" data-toggle="dropdown" href="#"
                    role="button" aria-haspopup="true" aria-expanded="false">

                    @if (empty(Auth::user()->image))
                        <div class="c-avatar"><img class="c-avatar-img"
                                src="{{ url('/public/uploads/images/user.png?v=1') }}"></div>
                    @endif

                    @if (!empty(Auth::user()->image))
                        <div class="c-avatar"><img class="c-avatar-img" src="{{ auth()->user()->image }}"
                                style="width: 40px;height: 40px"></div>
                    @endif

                </a>
                <div class="dropdown-menu dropdown-menu-right pt-0">
                    <div class="dropdown-header bg-light py-2"><strong>Account</strong></div>


                    <a class="dropdown-item" href="/updates">
                        <svg class="c-icon mr-2">
                            <use xlink:href="{{ url('/icons/sprites/free.svg#cil-bell') }}"></use>
                        </svg> Novidades<span class="badge badge-info ml-auto">42</span></a>
                    <a class="dropdown-item" href="/profile">
                        <svg class="c-icon mr-2">
                            <use xlink:href="{{ url('/icons/sprites/free.svg#cil-user') }}"></use>
                        </svg> Profile</a>
                    @if (Auth::user()->isAdmin() === true)
                        <a class="dropdown-item">
                            <svg class="c-icon mr-2">
                                <use xlink:href="{{ url('/icons/sprites/free.svg#cil-credit-card') }}"></use>
                            </svg>Payments</a>
                        <a class="dropdown-item" href="/logs">
                            <svg class="c-icon mr-2">
                                <use xlink:href="{{ url('/icons/sprites/free.svg#cil-history') }}"></use>
                            </svg>Auditoria</a>
                    @endif
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('account.index') }}">
                        <svg class="c-icon mr-2">
                            <use xlink:href="{{ url('/icons/sprites/free.svg#cil-building') }}"></use>
                        </svg>Selecionar a conta</a>
                    <a class="dropdown-item">
                        <svg class="c-icon mr-2">
                            <use xlink:href="{{ url('/icons/sprites/free.svg#cil-account-logout') }}"></use>
                        </svg>
                        <form action="{{ url('/logout') }}" method="POST"> @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </a>
                </div>
            </li>
        </ul>
    </header>

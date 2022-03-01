<div class="c-sidebar-brand">
    <img class="c-sidebar-brand-full" src="{{ url('/assets/brand/coreui-base-white.svg') }}" width="400" height="60" alt="DeskApps">
    <img class="c-sidebar-brand-minimized" src="{{ url('assets/brand/coreui-signet-white.svg') }}" width="70" height="36" alt="DeskApps">
</div>
<nav class="c-sidebar-nav">
    <!--
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ url('timeline') }}">
            <i class="c-icon cil-globe-alt c-sidebar-nav-icon"></i>
            {{ __('Novidades') }}<span class="badge badge-info">Beta</span></a>
    </li>
-->
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ url('account') }}">
            <i class="c-icon cil-building c-sidebar-nav-icon"></i>
            {{ __('layout.account') }}</a>
    </li>
    @if(Auth::user()->menuroles == true)
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ url('license') }}">
            <i class="c-icon cil-credit-card c-sidebar-nav-icon"></i>
            {{ __('layout.license') }}</a>
    </li>
    @endif
    @if (Auth::user()->isAdmin() === true)
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ url('users') }}">
            <i class="c-icon cil-user c-sidebar-nav-icon"></i>
            Usuários</a>
    </li>
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ url('log') }}">
            <i class="c-icon cil-reload c-sidebar-nav-icon"></i>
            Logs</a>
    </li>
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ route('blog.post') }}">
            <i class="c-icon cil-notes c-sidebar-nav-icon"></i>
            Add Post</a>
    </li>
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ route('bread.index') }}">
            <i class="c-icon cil-notes c-sidebar-nav-icon"></i>
            Bread</a>
    </li>
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ route('mail.index') }}">
            <i class="c-icon cil-notes c-sidebar-nav-icon"></i>
            Mail</a>
    </li>

    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ url('/clear-cache-all-057878545112') }}">
            <i class="c-icon cil-notes c-sidebar-nav-icon"></i>
            Limpar cache</a>
    </li>
    @endif
</ul>
</div>
</nav>
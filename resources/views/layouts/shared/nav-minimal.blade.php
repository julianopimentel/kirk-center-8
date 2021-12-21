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
            {{ __('account.account') }}</a>
    </li>
    @if(Auth::user()->isAdmin())
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ url('license') }}">
            <i class="c-icon cil-credit-card c-sidebar-nav-icon"></i>
            {{ __('account.license') }}</a>
    </li>
    @endif
</ul>
</div>
</nav>
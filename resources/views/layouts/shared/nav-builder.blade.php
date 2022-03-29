<div class="c-sidebar-brand">
    <img class="c-sidebar-brand-full" src="{{ url($appSkin->logo_menu) }}" width="400" height="60"
        alt="DeskApps">
    <img class="c-sidebar-brand-minimized" src="{{ url('assets/brand/coreui-signet-white.svg') }}" width="70"
        height="36" alt="DeskApps">
</div>
<ul class="c-sidebar-nav">
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ route('home.index') }}">
            <i class="c-icon cil-house c-sidebar-nav-icon"></i>
            {{ __('layout.home') }}</a>
    </li>
    @if ($appPermissao->home_timeline == true)
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ url('timeline') }}">
            <i class="c-icon cil-globe-alt c-sidebar-nav-icon"></i>
            {{ __('layout.timeline') }}</a>
    </li>
    @endif
    @if ($appPermissao->home_cadastro_visitante == true)
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ route('peoplevisit.create') }}">
            <i class="c-icon cil-user-follow c-sidebar-nav-icon"></i>
            {{ __('layout.visit') }}</a>
    </li>
    @endif
    @if ($appPermissao->home_financeiro_valores == true)
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('indexDizimos') }}">
                <i class="c-icon cil-cash c-sidebar-nav-icon"></i>
                {{ __('layout.my_tithes') }}</a>
        </li>
    @endif
    @if ($appPermissao->home_grupo == true)
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('indexGrupos') }}">
                <i class="c-icon cil-chat-bubble c-sidebar-nav-icon"></i>
                {{ __('layout.my_groups') }}</a>
        </li>
    @endif
    @if ($appPermissao->home_oracao == true)
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('indexOracao') }}">
                <i class="c-icon cil-assistive-listening-system c-sidebar-nav-icon"></i>
                {{ __('layout.prayer') }}</a>
        </li>
    @endif
    @if (($appPermissao->view_periodo or $appPermissao->view_dash or $appPermissao->view_detail or $appPermissao->view_resumo_financeiro) == true)
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('dashboard.index') }}">
                <i class="c-icon cil-speedometer c-sidebar-nav-icon"></i>
                {{ __('layout.dashboard') }}</a>
        </li>
    @endif
    @if ($appPermissao->view_people == true)
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('people.index') }}">
                <i class="c-icon cil-user c-sidebar-nav-icon"></i>
                {{ __('layout.people') }}</a>
        </li>
    @endif
    @if ($appPermissao->view_group == true)
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('group.index') }}">
                <i class="c-icon cil-people c-sidebar-nav-icon"></i>
                {{ __('layout.group') }}</a>
        </li>
    @endif
    @if ($appPermissao->view_message == true)
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('message.index') }}">
                <i class="c-icon cil-speech c-sidebar-nav-icon"></i>
                {{ __('layout.message') }}</a>
        </li>
    @endif
    @if ($appPermissao->view_prayer == true)
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ url('prayer') }}">
            <i class="c-icon cil-assistive-listening-system c-sidebar-nav-icon"></i>
            {{ __('layout.prayer') }}</a>
    </li>
    @endif
    @if ($appPermissao->view_calendar == true)
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ url('calender') }}">
                <i class="c-icon cil-calendar c-sidebar-nav-icon"></i>
                {{ __('layout.calender') }}</a>
        </li>
    @endif
    @if ($appPermissao->view_media == true)
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ route('media.folder.index') }}">
            <i class="c-icon cil-folder c-sidebar-nav-icon"></i>
            {{ __('layout.documents') }}</a>
    </li>
    @endif
    @if ($appPermissao->view_sermons == true)
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ route('sermons.index') }}">
            <i class="c-icon cil-education c-sidebar-nav-icon"></i>
            {{ __('layout.sermons') }}</a>
    </li>
    @endif
    @if ($appPermissao->view_financial == true)
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('transaction.index') }}">
                <i class="c-icon cil-money c-sidebar-nav-icon"></i>
                {{ __('layout.financial') }}</a>
        </li>
    @endif
    @if ($appPermissao->home_eventos == true)
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ route('indexEventos') }}">
            <i class="c-icon cil-calendar-check c-sidebar-nav-icon"></i>
            {{ __('layout.events') }}</a>
    </li>
    @endif
    @if ($appPermissao->home_dados == true)
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ route('indexDados') }}">
            <i class="c-icon cil-tag c-sidebar-nav-icon"></i>
            {{ __('layout.my_data') }}</a>
    </li>
    @endif
    @if ($appPermissao->report_view == true)
        <li class="c-sidebar-nav-dropdown"><a class="c-sidebar-nav-dropdown-toggle"><i
                    class="c-icon cil-chart c-sidebar-nav-icon"></i>{{ __('layout.report') }}</a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link"
                        href="{{ route('people.Financial') }}"><span class="c-sidebar-nav-icon"></span>{{ __('layout.report_people') }}</a></li>
                        @if ($appSystem->geolocation == true)
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link"
                        href="{{ route('location.index') }}"><span class="c-sidebar-nav-icon"></span>{{ __('layout.report_loc') }}</a>
                </li>
                @endif
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link"
                        href="{{ route('group.Financial') }}"><span class="c-sidebar-nav-icon"></span>{{ __('layout.report_groups') }}</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link"
                        href="{{ route('financial.Financial') }}"><span class="c-sidebar-nav-icon"></span>{{ __('layout.report_financial') }}</a></li>
            </ul>
        </li>
    @endif
</ul>
</div>

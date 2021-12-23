<div class="c-sidebar-brand">
    <img class="c-sidebar-brand-full" src="{{ url('/assets/brand/coreui-base-white.svg') }}" width="400" height="60"
        alt="DeskApps">
    <img class="c-sidebar-brand-minimized" src="{{ url('assets/brand/coreui-signet-white.svg') }}" width="70"
        height="36" alt="DeskApps">
</div>
<ul class="c-sidebar-nav">

    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ route('home.index') }}">
            <i class="c-icon cil-house c-sidebar-nav-icon"></i>
            Home</a>
    </li>
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ url('timeline') }}">
            <i class="c-icon cil-globe-alt c-sidebar-nav-icon"></i>
            {{ __('Timeline') }}</a>
    </li>
        @if ($appPermissao->home_financeiro_valores == true)
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('indexDizimos') }}">
                <i class="c-icon cil-cash c-sidebar-nav-icon"></i>
                Meus Dizimos</a>
        </li>
    @endif
    @if ($appPermissao->home_grupo == true)
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('indexGrupos') }}">
                <i class="c-icon cil-chat-bubble c-sidebar-nav-icon"></i>
                Meus Grupos</a>
        </li>
    @endif
    @if (($appPermissao->view_periodo or $appPermissao->view_dash or $appPermissao->view_detail or $appPermissao->view_resumo_financeiro) == true)
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('dashboard.index') }}">
                <i class="c-icon cil-speedometer c-sidebar-nav-icon"></i>
                Dashboard<span class="badge badge-danger">NEW</span></a>
        </li>
    @endif
    @if ($appPermissao->view_people == true)
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('people.index') }}">
                <i class="c-icon cil-user c-sidebar-nav-icon"></i>
                Pessoas</a>
        </li>
    @endif
    @if ($appPermissao->view_group == true)
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('group.index') }}">
                <i class="c-icon cil-people c-sidebar-nav-icon"></i>
                Grupos</a>
        </li>
    @endif
    @if ($appPermissao->view_message == true)
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="#">
                <i class="c-icon cil-speech c-sidebar-nav-icon"></i>
                Recados</a>
        </li>
    @endif
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ url('prayer') }}">
            <i class="c-icon cil-assistive-listening-system c-sidebar-nav-icon"></i>
            {{ __('Pedido de oração') }}</a>
    </li>
    @if ($appPermissao->view_calendar == true)
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ url('calender') }}">
                <i class="c-icon cil-calendar c-sidebar-nav-icon"></i>
                Calendários</a>
        </li>
    @endif
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ route('media.folder.index') }}">
            <i class="c-icon cil-file c-sidebar-nav-icon"></i>
            Media</a>
    </li>
    @if ($appPermissao->view_financial == true)
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('deposit.balance') }}">
                <i class="c-icon cil-money c-sidebar-nav-icon"></i>
                Financeiro</a>
        </li>
    @endif
    @if ($appPermissao->report_view == true)
        <li class="c-sidebar-nav-dropdown"><a class="c-sidebar-nav-dropdown-toggle"><i
                    class="c-icon cil-chart c-sidebar-nav-icon"></i>Relatórios</a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link"
                        href="{{ route('people.Financial') }}"><span class="c-sidebar-nav-icon"></span>Listagem
                        das
                        Pessoas</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link"
                        href="{{ route('location.index') }}"><span class="c-sidebar-nav-icon"></span>Localizações</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link"
                        href="{{ route('group.Financial') }}"><span class="c-sidebar-nav-icon"></span>Listagem de
                        Grupos</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link"
                        href="{{ route('financial.Financial') }}"><span class="c-sidebar-nav-icon"></span>Histórico
                        Financeiro</a></li>
            </ul>
        </li>
    @endif
    @if (($appPermissao->settings_general or $appPermissao->settings_email or $appPermissao->settings_meta or $appPermissao->settings_social or $appPermissao->settings_roles) == true)
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('settings') }}">
                <i class="c-icon cil-settings c-sidebar-nav-icon"></i>
                Configurações</a>
        </li>
    @endif
</ul>
</div>
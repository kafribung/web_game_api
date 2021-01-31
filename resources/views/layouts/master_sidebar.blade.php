<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                    data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboard</li>
                <li>
                    <a href="/dashboard" class="{{ Request::is('dashboard') ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        My Dashboard
                    </a>
                </li>

                <li class="app-sidebar__heading">Manajemen Admin</li>
                <li>
                    <a href="{{ route('admin.index') }}" class="{{ Request::segment(1) == 'admin' ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-users"></i>
                        Data Admin
                    </a>
                </li>
                
                <li class="app-sidebar__heading">Game</li>
                <li>
                    <a href="{{ route('game.index') }}" class="{{ Request::segment(1) == 'game'  ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-plugin"></i>
                        Data Game
                    </a>
                </li>

                <li class="app-sidebar__heading">Peserta</li>
                <li>
                    <a href="{{ route('participant.index') }}" class="{{ Request::segment(1) == 'participant'  ? 'mm-active' : '' }} {{ Request::segment(1) == 'qr-code'  ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-medal"></i>
                        Data Peserta
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
@php
    $configData = \App\Helpers\Helpers::applClasses();
@endphp
<div class="main-menu menu-fixed {{($configData['theme'] === 'dark') ? 'menu-dark' : 'menu-light'}} menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{{route('admin.dashboard')}}">
                    <span class="brand-logo">
                        @if (setting('company_logo'))
                            <img alt="{{ setting('company_name') }}" height="45" class="navbar-brand-img" src="{{ asset(setting('company_logo')) }}">
                        @else
                            <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                                      <defs>
                                        <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                                          <stop stop-color="#000000" offset="0%"></stop>
                                          <stop stop-color="#FFFFFF" offset="100%"></stop>
                                        </lineargradient>
                                        <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                                          <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                          <stop stop-color="#FFFFFF" offset="100%"></stop>
                                        </lineargradient>
                                      </defs>
                                      <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                          <g id="Group" transform="translate(400.000000, 178.000000)">
                                            <path class="text-primary" id="Path"
                                                  d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z"
                                                  style="fill:currentColor"></path>
                                            <path id="Path1"
                                                  d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z"
                                                  fill="url(#linearGradient-1)" opacity="0.2"></path>
                                            <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                            <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                            <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                          </g>
                                        </g>
                                      </g>
                                    </svg>
                        @endif
                    </span>
                    <h2 class="brand-text">{{ setting('company_name') }}</h2>
                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                    <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            {{-- Foreach menu item starts --}}
            <li class="nav-item  {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center " target="_self">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    <span class="menu-title text-truncate">@lang('app.Dashboard')</span>
                </a>
            </li>

            @canany(['view-category', 'create-category'])
                <li class="nav-item {{ Route::is('admin.category.*') ? 'active' : '' }} ">
                    <a href="{{ route('admin.category.index') }}" class="d-flex align-items-center" target="_self">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                        <span class="menu-title text-truncate">@lang('app.Categories')</span>
                    </a>
                </li>
            @endcan

            @canany(['view-type', 'create-type'])
                <li class="nav-item {{ Route::is('admin.type.*') ? 'active' : '' }} ">
                    <a href="{{ route('admin.type.index') }}" class="d-flex align-items-center" target="_self">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                        <span class="menu-title text-truncate">@lang('app.Types')</span>
                    </a>
                </li>
            @endcan

            @canany(['view-auction', 'create-auction'])
                <li class="nav-item {{ Route::is('admin.auction.*') ? 'active' : '' }} ">
                    <a href="{{ route('admin.auction.index') }}" class="d-flex align-items-center" target="_self">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                        <span class="menu-title text-truncate">@lang('app.auctions')</span>
                    </a>
                </li>
            @endcan

            @canany(['view-user', 'create-user'])
                <li class="nav-item {{ Route::is('admin.user.*') ? 'active' : '' }} ">
                    <a href="{{ route('admin.user.index') }}" class="d-flex align-items-center" target="_self">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                        <span class="menu-title text-truncate">@lang('app.users')</span>
                    </a>
                </li>
            @endcan

            @canany(['view-slider', 'create-slider'])
                <li class="nav-item {{ Route::is('admin.slider.*') ? 'active' : '' }} ">
                    <a href="{{ route('admin.slider.index') }}" class="d-flex align-items-center" target="_self">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                        <span class="menu-title text-truncate">@lang('app.sliders')</span>
                    </a>
                </li>
            @endcan

            <li class="navigation-header">
                <span>@lang('app.Administer')</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal">
                    <circle cx="12" cy="12" r="1"></circle>
                    <circle cx="19" cy="12" r="1"></circle>
                    <circle cx="5" cy="12" r="1"></circle>
                </svg>
            </li>

            @canany(['view-user', 'create-user'])
                <li class="nav-item {{ Route::is('admin.admins.*') ? 'active' : '' }} ">
                    <a href="{{ route('admin.admins.index') }}" class="d-flex align-items-center" target="_self">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                        <span class="menu-title text-truncate">@lang('app.Admins')</span>
                    </a>
                </li>
            @endcan

            @canany(['view-permission', 'create-permission'])
                <li class="nav-item {{ Route::is('admin.permissions*') ? 'active' : '' }} ">
                    <a href="{{ route('admin.permissions.index') }}" class="d-flex align-items-center" target="_self">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                        <span class="menu-title text-truncate">@lang('app.Permissions')</span>
                    </a>
                </li>
            @endcan

            @canany(['view-roles', 'create-roles'])
                <li class="nav-item {{ Route::is('admin.roles.*') ? 'active' : '' }} ">
                    <a href="{{ route('admin.roles.index') }}" class="d-flex align-items-center" target="_self">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                        <span class="menu-title text-truncate">@lang('app.Roles')</span>
                    </a>
                </li>
            @endcan

            @can('update-settings')
                <li class="nav-item {{ Route::is('admin.settings*') ? 'active' : '' }} ">
                    <a href="{{ route('admin.settings.index') }}" class="d-flex align-items-center" target="_self">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                        <span class="menu-title text-truncate">@lang('app.Manage Settings')</span>
                    </a>
                </li>
            @endcan

            @canany(['view-activity-log'])
                <li class="nav-item {{ Route::is('admin.activity-log*') ? 'active' : '' }} ">
                    <a href="{{ route('admin.activity-log.index') }}" class="d-flex align-items-center" target="_self">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                        <span class="menu-title text-truncate">@lang('app.Activity Log')</span>
                    </a>
                </li>
            @endcan
            {{-- Foreach menu item ends --}}
        </ul>
    </div>
</div>
<!-- END: Main Menu-->

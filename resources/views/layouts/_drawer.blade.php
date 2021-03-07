{{--<div class="mdk-drawer js-mdk-drawer" id="default-drawer" data-align="start" data-position="left">--}}
{{--    <div class="mdk-drawer__scrim"></div>--}}
{{--    <div class="mdk-drawer__content">--}}
{{--        <div class="sidebar sidebar-light sidebar-left simplebar" data-simplebar="init">--}}
{{--            <div class="simplebar-wrapper">--}}
{{--                <div class="simplebar-height-auto-observer-wrapper">--}}
{{--                    <div class="simplebar-height-auto-observer"></div>--}}
{{--                </div>--}}
{{--                <div class="simplebar-mask">--}}
{{--                    <div class="simplebar-offset">--}}
{{--                        <div class="simplebar-content">--}}

{{--                            @if($authUser->hasRole('super_admin'))--}}
{{--                                <div class="sidebar-heading sidebar-m-t">Super Admin Menu</div>--}}
{{--                                <ul class="sidebar-menu">--}}
{{--                                    <li class="sidebar-menu-item {{ $page == 'super_admin.dashboard' ? 'active' : ''}}">--}}
{{--                                        <a class="sidebar-menu-button" href="{{ route('super_admin.dashboard') }}">--}}
{{--                                            <span class="sidebar-menu-text">{{ __('messages.dashboard') }}</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="sidebar-menu-item {{ $page == 'super_admin.users' ? 'active' : ''}}">--}}
{{--                                        <a class="sidebar-menu-button" href="{{ route('super_admin.users') }}">--}}
{{--                                            <span class="sidebar-menu-text">{{ __('messages.users') }}</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="sidebar-menu-item {{ $page == 'super_admin.plans' ? 'active' : ''}}">--}}
{{--                                        <a class="sidebar-menu-button" href="{{ route('super_admin.plans') }}">--}}
{{--                                            <span class="sidebar-menu-text">{{ __('messages.plans') }}</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="sidebar-menu-item {{ $page == 'super_admin.subscriptions' ? 'active' : ''}}">--}}
{{--                                        <a class="sidebar-menu-button" href="{{ route('super_admin.subscriptions') }}">--}}
{{--                                            <span class="sidebar-menu-text">{{ __('messages.subscriptions') }}</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="sidebar-menu-item {{ $page == 'super_admin.orders' ? 'active' : ''}}">--}}
{{--                                        <a class="sidebar-menu-button" href="{{ route('super_admin.orders') }}">--}}
{{--                                            <span class="sidebar-menu-text">{{ __('messages.orders') }}</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="sidebar-menu-item {{ str_contains($page, 'super_admin.settings.') ? 'active open' : ''}}">--}}
{{--                                        <a class="sidebar-menu-button {{ str_contains($page, 'super_admin.settings.') ? '' : 'collapsed'}}" data-toggle="collapse" href="#settings_menu" aria-expanded="false">--}}
{{--                                            <span class="sidebar-menu-text">{{ __('messages.settings') }}</span>--}}
{{--                                            <span class="ml-auto sidebar-menu-toggle-icon"></span>--}}
{{--                                        </a>--}}
{{--                                        <ul class="sidebar-submenu {{ str_contains($page, 'super_admin.settings.') ? 'collapse show' : 'collapse'}}" id="settings_menu" style="">--}}
{{--                                            <li class="sidebar-menu-item {{ $page == 'super_admin.settings.application' ? 'active' : ''}}">--}}
{{--                                                <a class="sidebar-menu-button" href="{{ route('super_admin.settings.application') }}">--}}
{{--                                                    <span class="sidebar-menu-text">{{ __('messages.application_settings') }}</span>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li class="sidebar-menu-item {{ $page == 'super_admin.settings.mail' ? 'active' : ''}}">--}}
{{--                                                <a class="sidebar-menu-button" href="{{ route('super_admin.settings.mail') }}">--}}
{{--                                                    <span class="sidebar-menu-text">{{ __('messages.mail_settings') }}</span>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li class="sidebar-menu-item {{ $page == 'super_admin.settings.payment' ? 'active' : ''}}">--}}
{{--                                                <a class="sidebar-menu-button" href="{{ route('super_admin.settings.payment') }}">--}}
{{--                                                    <span class="sidebar-menu-text">{{ __('messages.payment_settings') }}</span>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li class="sidebar-menu-item {{ $page == 'super_admin.settings.theme' ? 'active' : ''}}">--}}
{{--                                                <a class="sidebar-menu-button" href="{{ route('super_admin.settings.theme', get_system_setting('theme')) }}">--}}
{{--                                                    <span class="sidebar-menu-text">{{ __('messages.theme_settings') }}</span>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li class="sidebar-menu-item d-xl-none d-md-none d-lg-none">--}}
{{--                                        <a class="sidebar-menu-button" href="{{ route('logout') }}">--}}
{{--                                            <span class="sidebar-menu-text">{{ __('messages.logout') }}</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            @else--}}
{{--                                <div class="d-flex align-items-center sidebar-p-a border-bottom sidebar-account">--}}
{{--                                    <a href="{{ route('settings.company', ['company_uid' => $currentCompany->uid]) }}" class="flex d-flex align-items-center text-underline-0 text-body">--}}
{{--                                        <span class="avatar mr-3">--}}
{{--                                            <img src="{{ $currentCompany->avatar }}" alt="avatar" class="avatar-img rounded">--}}
{{--                                        </span>--}}
{{--                                        <span class="flex d-flex flex-column">--}}
{{--                                            <strong>{{ $currentCompany->name }}</strong>--}}
{{--                                        </span>--}}
{{--                                    </a>--}}
{{--                                </div>--}}

{{--                                <div class="sidebar-heading sidebar-m-t">Menu</div>--}}
{{--                                <ul class="sidebar-menu">--}}
{{--                                    <li class="sidebar-menu-item {{ $page == 'dashboard' ? 'active' : ''}}">--}}
{{--                                        <a class="sidebar-menu-button" href="{{ route('dashboard', ['company_uid' => $currentCompany->uid]) }}">--}}
{{--                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dashboard</i>--}}
{{--                                            <span class="sidebar-menu-text">{{ __('messages.dashboard') }}</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="sidebar-menu-item {{ $page == 'customers' ? 'active' : ''}}">--}}
{{--                                        <a class="sidebar-menu-button" href="{{ route('customers', ['company_uid' => $currentCompany->uid]) }}">--}}
{{--                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">account_box</i>--}}
{{--                                            <span class="sidebar-menu-text">{{ __('messages.customers') }}</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="sidebar-menu-item {{ $page == 'products' ? 'active' : ''}}">--}}
{{--                                        <a class="sidebar-menu-button" href="{{ route('products', ['company_uid' => $currentCompany->uid]) }}">--}}
{{--                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">store</i>--}}
{{--                                            <span class="sidebar-menu-text">{{ __('messages.products') }}</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="sidebar-menu-item {{ $page == 'invoices' ? 'active' : ''}}">--}}
{{--                                        <a class="sidebar-menu-button" href="{{ route('invoices', ['company_uid' => $currentCompany->uid]) }}">--}}
{{--                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">receipt</i>--}}
{{--                                            <span class="sidebar-menu-text">{{ __('messages.invoices') }}</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="sidebar-menu-item {{ $page == 'estimates' ? 'active' : ''}}">--}}
{{--                                        <a class="sidebar-menu-button" href="{{ route('estimates', ['company_uid' => $currentCompany->uid]) }}">--}}
{{--                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">description</i>--}}
{{--                                            <span class="sidebar-menu-text">{{ __('messages.estimates') }}</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="sidebar-menu-item {{ $page == 'payments' ? 'active' : ''}}">--}}
{{--                                        <a class="sidebar-menu-button" href="{{ route('payments', ['company_uid' => $currentCompany->uid]) }}">--}}
{{--                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">payment</i>--}}
{{--                                            <span class="sidebar-menu-text">{{ __('messages.payments') }}</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="sidebar-menu-item {{ $page == 'expenses' ? 'active' : ''}}">--}}
{{--                                        <a class="sidebar-menu-button" href="{{ route('expenses', ['company_uid' => $currentCompany->uid]) }}">--}}
{{--                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">monetization_on</i>--}}
{{--                                            <span class="sidebar-menu-text">{{ __('messages.expenses') }}</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="sidebar-menu-item {{ $page == 'vendors' ? 'active' : ''}}">--}}
{{--                                        <a class="sidebar-menu-button" href="{{ route('vendors', ['company_uid' => $currentCompany->uid]) }}">--}}
{{--                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">local_shipping</i>--}}
{{--                                            <span class="sidebar-menu-text">{{ __('messages.vendors') }}</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="sidebar-menu-item {{ str_contains($page, 'reports.') ? 'active open' : ''}}">--}}
{{--                                        <a class="sidebar-menu-button {{ str_contains($page, 'reports.') ? '' : 'collapsed'}}" data-toggle="collapse" href="#reports_menu" aria-expanded="false">--}}
{{--                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">pie_chart_outlined</i>--}}
{{--                                            <span class="sidebar-menu-text">{{ __('messages.reports') }}</span>--}}
{{--                                            <span class="ml-auto sidebar-menu-toggle-icon"></span>--}}
{{--                                        </a>--}}
{{--                                        <ul class="sidebar-submenu {{ str_contains($page, 'reports.') ? 'collapse show' : 'collapse'}}" id="reports_menu" style="">--}}
{{--                                            <li class="sidebar-menu-item {{ $page == 'reports.customer_sales' ? 'active' : ''}}">--}}
{{--                                                <a class="sidebar-menu-button" href="{{ route('reports.customer_sales', ['company_uid' => $currentCompany->uid]) }}">--}}
{{--                                                    <span class="sidebar-menu-text">{{ __('messages.customer_sales') }}</span>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li class="sidebar-menu-item {{ $page == 'reports.product_sales' ? 'active' : ''}}">--}}
{{--                                                <a class="sidebar-menu-button" href="{{ route('reports.product_sales', ['company_uid' => $currentCompany->uid]) }}">--}}
{{--                                                    <span class="sidebar-menu-text">{{ __('messages.product_sales') }}</span>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li class="sidebar-menu-item {{ $page == 'reports.profit_loss' ? 'active' : ''}}">--}}
{{--                                                <a class="sidebar-menu-button" href="{{ route('reports.profit_loss', ['company_uid' => $currentCompany->uid]) }}">--}}
{{--                                                    <span class="sidebar-menu-text">{{ __('messages.profit_loss') }}</span>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li class="sidebar-menu-item {{ $page == 'reports.expenses' ? 'active' : ''}}">--}}
{{--                                                <a class="sidebar-menu-button" href="{{ route('reports.expenses', ['company_uid' => $currentCompany->uid]) }}">--}}
{{--                                                    <span class="sidebar-menu-text">{{ __('messages.expenses') }}</span>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li class="sidebar-menu-item {{ $page == 'settings' ? 'active' : ''}}">--}}
{{--                                        <a class="sidebar-menu-button" href="{{ route('settings.account', ['company_uid' => $currentCompany->uid]) }}">--}}
{{--                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">settings</i>--}}
{{--                                            <span class="sidebar-menu-text">{{ __('messages.settings') }}</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="sidebar-menu-item d-xl-none d-md-none d-lg-none">--}}
{{--                                        <a class="sidebar-menu-button" href="{{ route('logout') }}">--}}
{{--                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">exit_to_app</i>--}}
{{--                                            <span class="sidebar-menu-text">{{ __('messages.logout') }}</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="simplebar-placeholder"></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-dark navbar-without-dd-arrow navbar-shadow" role="navigation" data-menu="menu-wrapper">
    <div class="navbar-container main-menu-content " data-menu="menu-container">
        @if(auth()->user()->hasRole('super_admin'))
        <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="dropdown nav-item" >
                <a class=" nav-link" href="{{ route('super_admin.dashboard') }}" ><i class="la la-home"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown nav-item" >
                <a class=" nav-link" href="{{ route('super_admin.users') }}" ><i class="la la-users"></i><span>User</span></a>
            </li>
            <li class="dropdown nav-item">
                <a class=" nav-link" href="{{ route('super_admin.plans') }}"><i class="la la-television"></i><span>Plans</span></a>
            </li>
            <li class="dropdown nav-item" >
                <a class=" nav-link" href="{{ route('super_admin.subscriptions') }}"><i class="la la-columns"></i><span>Subscriptions</span></a>
            </li>
            <li class="dropdown nav-item" >
                <a class=" nav-link" href="{{ route('super_admin.orders') }}"><i class="la la-columns"></i><span>Orders</span></a>
            </li>
            <li class="dropdown nav-item" data-menu="dropdown"><a class=" nav-link" href="#" data-toggle="dropdown"><i class="la la-folder-open"></i><span>Settings</span></a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('super_admin.settings.application') }}"><i class="ft-minimize-2"></i> Application Settings</a></li>
                    <li><a class="dropdown-item" href="{{ route('super_admin.settings.mail') }}"><i class="ft-minimize-2"></i> Mail Settings</a></li>
                    <li><a class="dropdown-item" href="{{ route('super_admin.settings.payment') }}"><i class="ft-minimize-2"></i> Payment Settings</a></li>
                    <li><a class="dropdown-item" href="{{ route('super_admin.settings.theme', get_system_setting('theme')) }}"><i class="ft-minimize-2"></i> Theme Settings</a></li>
                </ul>
            </li>
            <li class="dropdown nav-item" >
                <a class=" nav-link" href="{{ route('logout') }}"><i class="la la-columns"></i><span>Logout</span></a>
            </li>

        </ul>
        @else
            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="dropdown nav-item" >
                    <a class=" nav-link" href="{{ route('dashboard', ['company_uid' => $currentCompany->uid]) }}" ><i class="la la-home"></i><span>Dashboard</span></a>
                </li>
                <li class="dropdown nav-item" >
                    <a class=" nav-link" href="{{ route('customers', ['company_uid' => $currentCompany->uid]) }}" ><i class="la la-users"></i><span>Customer</span></a>
                </li>
                <li class="dropdown nav-item">
                    <a class=" nav-link" href="{{ route('products', ['company_uid' => $currentCompany->uid]) }}"><i class="la la-television"></i><span>Product</span></a>
                </li>
                <li class="dropdown nav-item" >
                    <a class=" nav-link" href="{{ route('invoices', ['company_uid' => $currentCompany->uid]) }}"><i class="la la-columns"></i><span>Invoices</span></a>
                </li>
                <li class="dropdown nav-item" >
                    <a class=" nav-link" href="{{ route('estimates', ['company_uid' => $currentCompany->uid]) }}"><i class="la la-columns"></i><span>Estimates</span></a>
                </li>
                <li class="dropdown nav-item" >
                    <a class=" nav-link" href="{{ route('payments', ['company_uid' => $currentCompany->uid]) }}"><i class="la la-columns"></i><span>Payments</span></a>
                </li>
                <li class="dropdown nav-item" >
                    <a class=" nav-link" href="{{ route('expenses', ['company_uid' => $currentCompany->uid]) }}"><i class="la la-columns"></i><span>Expenses</span></a>
                </li>
                <li class="dropdown nav-item" >
                    <a class=" nav-link" href="{{ route('vendors', ['company_uid' => $currentCompany->uid]) }}"><i class="la la-columns"></i><span>Vendors</span></a>
                </li>
                <li class="dropdown nav-item" data-menu="dropdown"><a class=" nav-link" href="#" data-toggle="dropdown"><i class="la la-folder-open"></i><span>Report</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('reports.customer_sales', ['company_uid' => $currentCompany->uid]) }}"><i class="ft-minimize-2"></i> Customer Sale</a></li>
                        <li><a class="dropdown-item" href="{{ route('reports.product_sales', ['company_uid' => $currentCompany->uid]) }}"><i class="ft-minimize-2"></i> Product Sale</a></li>
                        <li><a class="dropdown-item" href="{{ route('reports.profit_loss', ['company_uid' => $currentCompany->uid]) }}"><i class="ft-minimize-2"></i> Profit OR Loss</a></li>
                        <li><a class="dropdown-item" href="{{ route('reports.expenses', ['company_uid' => $currentCompany->uid]) }}"><i class="ft-minimize-2"></i> Expense</a></li>
                    </ul>
                </li>
                <li class="dropdown nav-item" >
                    <a class=" nav-link" href="{{ route('settings.account', ['company_uid' => $currentCompany->uid]) }}"><i class="la la-columns"></i><span>Settings</span></a>
                </li>
                <li class="dropdown nav-item" >
                    <a class=" nav-link" href="{{ route('logout') }}"><i class="la la-columns"></i><span>Logout</span></a>
                </li>

            </ul>

        @endif
    </div>
</div>


<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-dark navbar-without-dd-arrow navbar-shadow" role="navigation" data-menu="menu-wrapper" style="background-color: #461B7E">
    <div class="navbar-container main-menu-content w-100" data-menu="menu-container">
            <ul class="nav navbar-nav d-flex justify-content-center" id="main-menu-navigation" data-menu="menu-navigation">
{{--                <li class="dropdown nav-item {{(Request::segment(2)=='dashboard') ? 'active':''}}" >--}}
{{--                    <a class=" nav-link" href="{{route('dashboard', ['company_uid' => auth()->user()->uid])}}" ><i class="la la-home" style="color: #ffffff;"> </i><span   style="color: #ffffff;">Dashboard</span></a>--}}
{{--                </li>--}}
{{--                <li class="dropdown nav-item" >--}}
{{--                    <a class=" nav-link" href="{{ route('customers', ['company_uid' => $currentCompany->uid]) }}" ><i class="la la-users" style="color: #ffffff;"></i><span  style="color: #ffffff;">Customer</span></a>--}}
{{--                </li>--}}
{{--                <li class="dropdown nav-item {{(Request::segment(2)=='products') ? 'active':''}}">--}}
{{--                    <a class=" nav-link" href="{{ route('company-list', ['user_uid' => auth()->user()->uid ]) }}"><i class="ft-box" style="color: #ffffff;"></i><span  style="color: #ffffff;">Company</span></a>--}}
{{--                </li>--}}
{{--                <li class="dropdown nav-item {{(Request::segment(2)=='products') ? 'active':''}}">--}}
{{--                    <a class=" nav-link" href="{{ route('products',  ['company_uid' => auth()->user()->uid]) }}"><i class="ft-box" style="color: #ffffff;"></i><span  style="color: #ffffff;">Product</span></a>--}}
{{--                </li>--}}

                <li class="nav-item ">
                    <a href="{{ route('settings.account', ['user_uid' => auth()->user()->uid]) }}" class=" nav-link">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left ft-user" ></i>
                        <span class="sidebar-menu-text">{{ __('messages.account_settings') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('settings.membership', ['user_uid' => auth()->user()->uid]) }}" class=" nav-link">
                        <i class=" la la-hand-grab-o"></i>
                        <span class="sidebar-menu-text">{{ __('messages.membership') }}</span>
                    </a>
                </li>

{{--                <li class="dropdown nav-item {{(Request::segment(2)=='invoices' || Request::segment(2)== 'estimates') ? 'active':''}}" data-menu="dropdown"><a class=" nav-link" href="#" data-toggle="dropdown"><i class="la la-folder-open" style="color: #ffffff;"></i><span  style="color: #ffffff;">Deals</span></a>--}}
{{--                    <ul class="dropdown-menu">--}}
{{--                        <li><a class="dropdown-item" href="{{ route('invoices', ['company_uid' => $currentCompany->uid]) }}"><i class="ft-file-text" ></i> Invoice</a></li>--}}
{{--                        <li><a class="dropdown-item" href="{{ route('estimates', ['company_uid' => $currentCompany->uid]) }}"><i class="la la-file-text" ></i> Quotation</a></li>--}}
{{--                        <li><a class="dropdown-item" href="{{ route('reports.profit_loss', ['company_uid' => $currentCompany->uid]) }}"><i  class="ft-minimize-2"></i > Profit OR Loss</a></li>--}}
{{--                        <li><a class="dropdown-item" href="{{ route('reports.expenses', ['company_uid' => $currentCompany->uid]) }}"><i  class="ft-minimize-2"></i > Expense</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li class="dropdown nav-item" >--}}
{{--                    <a class=" nav-link" href="{{ route('invoices', ['company_uid' => $currentCompany->uid]) }}"><i class="ft-file-text" style="color: #ffffff;"></i><span style="color: #ffffff;">Invoices</span></a>--}}
{{--                </li>--}}
{{--                <li class="dropdown nav-item" >--}}
{{--                    <a class=" nav-link" href="{{ route('estimates', ['company_uid' => $currentCompany->uid]) }}"><i class="la la-file-text" style="color: #ffffff;"></i><span style="color: #ffffff;">Quotations</span></a>--}}
{{--                </li>--}}
{{--                <li class="dropdown nav-item {{(Request::segment(2)=='customers' || Request::segment(2)== 'vendors') ? 'active':''}}" data-menu="dropdown"><a class=" nav-link" href="#" data-toggle="dropdown"><i class="la la-folder-open" style="color: #ffffff;"></i><span  style="color: #ffffff;">Relation</span></a>--}}
{{--                    <ul class="dropdown-menu">--}}
{{--                        <li><a class="dropdown-item" href="{{ route('customers', ['company_uid' => $currentCompany->uid]) }}" ><i class="la la-users" ></i> Customer</a></li>--}}
{{--                        <li><a class="dropdown-item" href="{{ route('vendors', ['company_uid' => $currentCompany->uid]) }}"><i class="la la-users"></i> Vendors</a></li>--}}
{{--                        --}}{{--                        <li><a class="dropdown-item" href="{{ route('reports.profit_loss', ['company_uid' => $currentCompany->uid]) }}"><i  class="ft-minimize-2"></i > Profit OR Loss</a></li>--}}
{{--                        --}}{{--                        <li><a class="dropdown-item" href="{{ route('reports.expenses', ['company_uid' => $currentCompany->uid]) }}"><i  class="ft-minimize-2"></i > Expense</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li class="dropdown nav-item {{(Request::segment(2)=='payments') ? 'active':''}}" >--}}
{{--                    <a class=" nav-link" href="{{ route('payments', ['company_uid' => $currentCompany->uid]) }}"><i class="la la-money" style="color: #ffffff;"></i><span style="color: #ffffff;">Payments</span></a>--}}
{{--                </li>--}}
{{--                <li class="dropdown nav-item  {{(Request::segment(2)=='expenses') ? 'active':''}}" >--}}
{{--                    <a class=" nav-link" href="{{ route('expenses', ['company_uid' => $currentCompany->uid]) }}"><i class="la la-briefcase" style="color: #ffffff;"></i><span  style="color: #ffffff;">Expenses</span></a>--}}
{{--                </li>--}}
{{--                <li class="dropdown nav-item" >--}}
{{--                    <a class=" nav-link" href="{{ route('vendors', ['company_uid' => $currentCompany->uid]) }}"><i class="la la-users" style="color: #ffffff;"></i><span  style="color: #ffffff;">Vendors</span></a>--}}
{{--                </li>--}}
{{--                <li class="dropdown nav-item {{(Request::segment(2)=='reports' ) ? 'active':''}}" data-menu="dropdown"><a class=" nav-link" href="#" data-toggle="dropdown"><i class="la la-folder-open" style="color: #ffffff;"></i><span  style="color: #ffffff;">Report</span></a>--}}
{{--                    <ul class="dropdown-menu">--}}
{{--                        <li><a class="dropdown-item" href="{{ route('reports.customer_sales', ['company_uid' => $currentCompany->uid]) }}"><i  class="ft-minimize-2"></i > Customer Sale</a></li>--}}
{{--                        <li><a class="dropdown-item" href="{{ route('reports.product_sales', ['company_uid' => $currentCompany->uid]) }}"><i  class="ft-minimize-2"></i > Product Sale</a></li>--}}
{{--                        <li><a class="dropdown-item" href="{{ route('reports.profit_loss', ['company_uid' => $currentCompany->uid]) }}"><i  class="ft-minimize-2"></i > Profit OR Loss</a></li>--}}
{{--                        <li><a class="dropdown-item" href="{{ route('reports.expenses', ['company_uid' => $currentCompany->uid]) }}"><i  class="ft-minimize-2"></i > Expense</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li class="dropdown nav-item {{(Request::segment(2)=='settings' ) ? 'active':''}}" >--}}
{{--                    <a class=" nav-link" href="{{ route('settings.account', ['company_uid' => $currentCompany->uid]) }}"><i class="la la-cogs" style="color: #ffffff;"></i><span style="color: #ffffff;">Settings</span></a>--}}
{{--                </li>--}}
{{--                <li class="dropdown nav-item" >--}}
{{--                    <a class=" nav-link" href="{{ route('logout') }}"><i class="la la-sign-out" style="color: #ffffff;"></i><span style="color: #ffffff;">Logout</span></a>--}}
{{--                </li>--}}
            </ul>
    </div>
</div>

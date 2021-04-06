<style>
    .sidebarNav span{
        font-weight: 700;
        font-size: 1.2rem;
    }
    .sidebarNav i{
        font-weight: 700;
        font-size: 1.2rem;
    }
    .sidebarNav span:hover{
        color: #461B7E;
    }
    .sidebarNav i:hover{
        color: #461B7E;
    }
</style>

<ul class="list-group list-group-messages">
    <li class="list-group-item  {{ $tab == 'account' ? '' : '' }}  ">
        <a href="{{ route('settings.account', ['company_uid' => $currentCompany->uid]) }}" class=" {{ $tab == 'account' ? 'text-danger' : 'text-secondary' }} sidebarNav">
            <i class="sidebar-menu-icon sidebar-menu-icon--left ft-user" ></i>
            <span class="sidebar-menu-text">{{ __('messages.account_settings') }}</span>
        </a>
    </li>
    <li class="list-group-item  {{ $tab == 'membership' ? '' : '' }}">
        <a href="{{ route('settings.membership', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'membership' ? 'text-danger' : 'text-secondary' }} sidebarNav">
            <i class=" la la-hand-grab-o"></i>
            <span class="sidebar-menu-text">{{ __('messages.membership') }}</span>
        </a>
    </li>

{{--    <li class="list-group-item  {{ $tab == 'notification' ? '' : '' }}">--}}
{{--        <a href="{{ route('settings.notifications', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'notification' ? 'text-danger' : 'text-secondary' }} sidebarNav">--}}
{{--            <i class="sidebar-menu-icon sidebar-menu-icon--left la la-quote-left"></i>--}}
{{--            <span class="sidebar-menu-text">{{ __('messages.notification_settings') }}</span>--}}
{{--        </a>--}}
{{--    </li>--}}

    <li class="list-group-item  {{ $tab == 'company' ? '' : '' }}">
        <a href="{{ route('settings.company', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'company' ? 'text-danger' : 'text-secondary' }} sidebarNav">
            <i class="sidebar-menu-icon sidebar-menu-icon--left la la-briefcase"></i>
            <span class="sidebar-menu-text">{{ __('messages.company_settings') }}</span>
        </a>
    </li>

    <li class="list-group-item  {{ $tab == 'preferences' ? '' : '' }}">
        <a href="{{ route('settings.preferences', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'preferences' ? 'text-danger' : 'text-secondary' }} sidebarNav">
            <i class="sidebar-menu-icon sidebar-menu-icon--left icon-equalizer"></i>
            <span class="sidebar-menu-text">{{ __('messages.preferences') }}</span>
        </a>
    </li>

{{--    <li class="list-group-item  {{ $tab == 'invoice' ? '' : '' }}">--}}
{{--        <a href="{{ route('settings.invoice', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'invoice' ? 'text-danger' : 'text-secondary' }} sidebarNav">--}}
{{--            <i class="sidebar-menu-icon sidebar-menu-icon--left la la-clipboard"></i>--}}
{{--            <span class="sidebar-menu-text">{{ __('messages.invoice_settings') }}</span>--}}
{{--        </a>--}}
{{--    </li>--}}

{{--    <li class="list-group-item  {{ $tab == 'estimate' ? '' : '' }}">--}}
{{--        <a href="{{ route('settings.estimate', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'estimate' ? 'text-danger' : 'text-secondary' }} sidebarNav">--}}
{{--            <i class="sidebar-menu-icon sidebar-menu-icon--left la la-align-justify"></i>--}}
{{--            <span class="sidebar-menu-text">{{ __('messages.quotation_settings') }}</span>--}}
{{--        </a>--}}
{{--    </li>--}}

    <li class="list-group-item  {{ $tab == 'payment' ? '' : '' }}">
        <a href="{{ route('settings.payment', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'payment' ? 'text-danger' : 'text-secondary' }} sidebarNav">
            <i class="sidebar-menu-icon sidebar-menu-icon--left la la-money"></i>
            <span class="sidebar-menu-text">{{ __('messages.payment_settings') }}</span>
        </a>
    </li>

    <li class="list-group-item  {{ $tab == 'product' ? '' : '' }}">
        <a href="{{ route('settings.product', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'product' ? 'text-danger' : 'text-secondary' }} sidebarNav">
            <i class="sidebar-menu-icon sidebar-menu-icon--left la la-database"></i>
            <span class="sidebar-menu-text">{{ __('messages.product_settings') }}</span>
        </a>
    </li>

    <li class="list-group-item  {{ $tab == 'tax_types' ? '' : '' }}">
        <a href="{{ route('settings.tax_types', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'tax_types' ? 'text-danger' : 'text-secondary' }} sidebarNav">
            <i class="sidebar-menu-icon sidebar-menu-icon--left la la-sitemap"></i>
            <span class="sidebar-menu-text">{{ __('messages.tax_types') }}</span>
        </a>
    </li>

{{--    <li class="list-group-item  {{ $tab == 'custom_fields' ? '' : '' }}">--}}
{{--        <a href="{{ route('settings.custom_fields', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'custom_fields' ? 'text-danger' : 'text-secondary' }} sidebarNav">--}}
{{--            <i class="sidebar-menu-icon sidebar-menu-icon--left la la-edit"></i>--}}
{{--            <span class="sidebar-menu-text">{{ __('messages.custom_fields') }}</span>--}}
{{--        </a>--}}
{{--    </li>--}}

    <li class="list-group-item  {{ $tab == 'expense_categories' ? '' : '' }}">
        <a href="{{ route('settings.expense_categories', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'expense_categories' ? 'text-danger' : 'text-secondary' }} sidebarNav">
            <i class="sidebar-menu-icon sidebar-menu-icon--left la la-google-wallet"></i>
            <span class="sidebar-menu-text">{{ __('messages.expense_categories') }}</span>
        </a>
    </li>

{{--    <li class="list-group-item  {{ $tab == 'email_template' ? '' : '' }}">--}}
{{--        <a href="{{ route('settings.email_template', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'email_template' ? 'text-danger' : 'text-secondary' }} sidebarNav">--}}
{{--            <i class="sidebar-menu-icon sidebar-menu-icon--left la la-envelope-o"></i>--}}
{{--            <span class="sidebar-menu-text">{{ __('messages.email_templates') }}</span>--}}
{{--        </a>--}}
{{--    </li>--}}

    <li class="list-group-item  {{ $tab == 'team' ? '' : '' }}">
        <a href="{{ route('settings.team', ['company_uid' => $currentCompany->uid]) }}" class="sidebar-menu-button {{ $tab == 'team' ? 'text-danger' : 'text-secondary' }} sidebarNav">
            <i class="sidebar-menu-icon sidebar-menu-icon--left la la-users"></i>
            <span class="sidebar-menu-text">{{ __('messages.team') }}</span>
        </a>
    </li>
</ul>



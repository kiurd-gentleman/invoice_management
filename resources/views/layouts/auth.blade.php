<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    @include('layouts._css')
</head>

<body class="horizontal-layout horizontal-menu 1-column   menu-expanded blank-page blank-page"
      data-open="hover" data-menu="horizontal-menu" data-col="1-column">
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-md-4 col-10 box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 m-0">
                            <div class="card-header border-0">
                                <div class="card-title text-center">
                                    <div class="p-1">
                                        <a href="{{ url('/login') }}" class="navbar-brand flex-column mb-2 align-items-center mr-0">
                                            @if(get_system_setting('application_logo'))
                                                <img class="navbar-brand-icon" src="{{ get_system_setting('application_logo') }}" width="125" alt="{{ get_system_setting('application_name') }}">
                                            @else
                                                <span>{{ get_system_setting('application_name') }}</span>
                                            @endif
                                        </a>
                                    </div>
                                </div>
                                <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                    <span>{{ __('messages.login_to_your_account') }}</span>
                                </h6>
                            </div>
                            @yield('content')
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
{{--    <div class="layout-login-centered-boxed__form card">--}}
{{--        <div class="d-flex flex-column justify-content-center align-items-center mt-2 mb-2 navbar-light">--}}
{{--            <a href="{{ url('/login') }}" class="navbar-brand flex-column mb-2 align-items-center mr-0">--}}
{{--                @if(get_system_setting('application_logo'))--}}
{{--                    <img class="navbar-brand-icon" src="{{ get_system_setting('application_logo') }}" width="125" alt="{{ get_system_setting('application_name') }}">--}}
{{--                @else--}}
{{--                    <span>{{ get_system_setting('application_name') }}</span>--}}
{{--                @endif--}}
{{--            </a>--}}
{{--        </div>--}}

{{--        @yield('content')--}}
{{--    </div>--}}

    @include('layouts._js')
    @include('layouts._flash')
</body>
</html>

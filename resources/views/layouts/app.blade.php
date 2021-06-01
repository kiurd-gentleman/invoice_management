<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    @include('layouts._css')
    @yield('styles')
</head>

<body class="horizontal-layout horizontal-menu 2-columns   menu-expanded" data-open="click" data-menu="horizontal-menu" data-col="2-columns">

        @include('layouts._header')
        @include('layouts._drawer')
        <div class="app-content content">

            <div class="content-wrapper container">
                @yield('page_header')
                <div class="content-body">
                    @yield('content')
                </div>
            </div>
        </div>
        @include('layouts._footer')

    @include('layouts._js')
    @include('layouts._flash')
</body>

</html>

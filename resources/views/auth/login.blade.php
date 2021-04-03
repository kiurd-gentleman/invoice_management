@extends('layouts.auth')

@section('title', __('messages.login'))

@section('content')

{{--<h1 class="text-center h6 mb-4">{{ __('messages.login_to_your_account') }}</h1>--}}

<div class="card-content">
    <div class="card-body">
        {{Hash::make('password')}}
        <form class="form-horizontal form-simple" action="{{ route('login') }}" method="POST"  novalidate>
            @csrf
            <fieldset class="form-group position-relative has-icon-left mb-0">
                <input id="email"
                       name="email"
                       type="email"
                       class="form-control form-control-prepended @error('email') is-invalid @enderror"
                       placeholder="user@example.com"
                       value="{{ old('email') }}"
                       autocomplete="email"
                       autofocus required>
                        <div class="form-control-position">
                            <i class="ft-user"></i>
                        </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </fieldset>
            <fieldset class="form-group position-relative has-icon-left">
                <input id="password"
                        name="password"
                        type="password"
                        class="form-control form-control-prepended @error('password') is-invalid @enderror"
                        placeholder="{{ __('messages.enter_your_password') }}"
                        required autocomplete="current-password">
                <div class="form-control-position">
                    <i class="la la-key"></i>
                </div>
                @error('password')--}}
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </fieldset>
            <div class="form-group row">
                <div class="col-md-6 col-12 text-center text-md-left">
                    <fieldset>
                        <input type="checkbox" id="remember-me" class="chk-remember">
                        <label for="remember-me">{{ __('messages.remember_me') }}</label>
                    </fieldset>
                </div>
                <div class="col-md-6 col-12 text-center text-md-right"><a href="recover-password.html" class="card-link">Forgot Password?</a></div>
            </div>
            <button type="submit" class="btn btn-info btn-lg btn-block"><i class="ft-unlock"></i> Login</button>
        </form>
    </div>
</div>
<div class="card-footer">
    <div class="">
        <p class="float-sm-left text-center m-0"><a href="{{ route('password.request') }}" class="card-link">{{ __('messages.forgot_your_password') }}</a></p>
        <p class="float-sm-right text-center m-0">New to Moden Admin? <a href="{{ route('register') }}" class="card-link">{{ __('messages.register') }}</a></p>
    </div>
</div>

{{--<form action="{{ route('login') }}" method="POST" novalidate>--}}
{{--    @csrf--}}
{{--    <div class="form-group">--}}
{{--        <label class="text-label" for="email">{{ __('messages.email') }}:</label>--}}
{{--        <div class="input-group input-group-merge">--}}
{{--            <input id="email" name="email" type="email"--}}
{{--                class="form-control form-control-prepended @error('email') is-invalid @enderror"--}}
{{--                placeholder="user@example.com" value="{{ old('email') }}" autocomplete="email"--}}
{{--                autofocus required>--}}
{{--            <div class="input-group-prepend">--}}
{{--                <div class="input-group-text">--}}
{{--                    <span class="far fa-envelope"></span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            @error('email')--}}
{{--                <span class="invalid-feedback" role="alert">--}}
{{--                    <strong>{{ $message }}</strong>--}}
{{--                </span>--}}
{{--            @enderror--}}
{{--        </div>--}}

{{--    </div>--}}
{{--    <div class="form-group">--}}
{{--        <label class="text-label" for="password">{{ __('messages.password') }}:</label>--}}
{{--        <div class="input-group input-group-merge">--}}
{{--            <input id="password" name="password" type="password"--}}
{{--                class="form-control form-control-prepended @error('password') is-invalid @enderror"--}}
{{--                placeholder="{{ __('messages.enter_your_password') }}" required autocomplete="current-password">--}}
{{--            <div class="input-group-prepend">--}}
{{--                <div class="input-group-text">--}}
{{--                    <span class="fa fa-key"></span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            @error('password')--}}
{{--                <span class="invalid-feedback" role="alert">--}}
{{--                    <strong>{{ $message }}</strong>--}}
{{--                </span>--}}
{{--            @enderror--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="form-group">--}}
{{--        <button class="btn btn-block btn-primary" type="submit">{{ __('messages.login') }}</button>--}}
{{--    </div>--}}

{{--    <div class="form-group text-center">--}}
{{--        <div class="custom-control custom-checkbox">--}}
{{--            <input id="remember" name="remember" type="checkbox" class="custom-control-input" checked="">--}}
{{--            <label class="custom-control-label" for="remember">{{ __('messages.remember_me') }}</label>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="form-group text-center">--}}
{{--        <a href="{{ route('password.request') }}">{{ __('messages.forgot_your_password') }}</a> <br>--}}
{{--    </div>--}}

{{--    <div class="form-group text-center">--}}
{{--        <a href="{{ route('register') }}">{{ __('messages.register') }}</a> <br>--}}
{{--    </div>--}}
{{--</form>--}}

@endsection

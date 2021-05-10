@extends('frontend.layouts.app')

@section('page-title' , trans('app.login'))

@section('content')
    <section>
        <div class="container pt-5">
            <div class="row">
                <div class="col-md-6 col-sm-8 mx-auto">
                    <div class="form-login">
                        <div class="form-title">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset(setting('company_logo')) ?? asset('frontend/img/logo.png') }}" alt="{{ setting('company_name') }}" class="img-fluid">
                            </a>
                        </div>
                        <div class="form-body">
                            <form class="form-horizontal" action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="input-group input-group-merge mb-2" style="direction: ltr;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="padding-left: 29px"  id="basic-addon5">+966</span>
                                    </div>
                                    <input type="tel" style="direction: {{ App::getLocale() == 'ar' ? 'ltr' : 'rtl' }};text-align: left }};" class="form-control" placeholder="@lang('app.phone_number')"
                                           aria-label="phone_number" aria-describedby="basic-addon5" name="phone_number" required value="{{ old('phone_number') }}" title="@lang('app.phone_number')" autocomplete="false">
                                    <img class="" src="{{ asset('frontend/img/phone-icon.png') }}">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="@lang('app.password')" required name="password">
                                    <img class="" src="{{ asset('frontend/img/password-icon.png') }}">
                                </div>
                                <button type="submit" class="btn btn-show w-100">@lang('app.login')</button>
                                <div class="form-group text-center">
                                    <a href="{{ route('password.request') }}" class="forget-pass">@lang('app.forget_password')</a>
                                    <a href="{{ route('register') }}" class="forget-pass">@lang('app.Create a new account')</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('frontend.layouts.app')

@section('page-title' , trans('app.reset_password'))

@section('content')
    <section>
        <div class="container pt-5">
            <div class="row">
                <div class="col-md-6 col-sm-8 mx-auto">
                    <div class="form-login">
                        <div class="form-title">
                            <a href="{{ url('/') }}">
                                <img src="{{ setting('company_logo') ? asset(setting('company_logo')) : asset('frontend/img/logo.png') }}" alt="{{ setting('company_name') }}" class="img-fluid">
                            </a>
                        </div>
                        <div class="form-body">
                            <form class="form-horizontal" action="{{ route('password.update') }}" method="post">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="@lang('app.email')" required name="email" readonly value="{{ $email ?? old('email') }}">
                                    <img class="" src="{{ asset('frontend/img/email.png') }}">
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="@lang('app.password')" required name="password">
                                    <img class="" src="{{ asset('frontend/img/password-icon.png') }}">
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="@lang('app.password_confirmation')" required name="password_confirmation">
                                    <img class="" src="{{ asset('frontend/img/password-icon.png') }}">
                                </div>
                                <button type="submit" class="btn btn-show w-100">@lang('app.login')</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

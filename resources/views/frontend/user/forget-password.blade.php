@extends('frontend.layouts.app')

@section('page-title' , trans('app.forget_password'))

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
                            <form class="form-horizontal" action="{{ route('password.email') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="@lang('app.email')" required name="email">
                                    <img class="" src="{{ asset('frontend/img/email.png') }}">
                                </div>
                                <button type="submit" class="btn btn-show w-100">@lang('app.Send Password Reset Link')</button>
                                <div class="form-group text-center">
                                    <a href="{{ route('login') }}" class="forget-pass">@lang('app.login')</a>
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

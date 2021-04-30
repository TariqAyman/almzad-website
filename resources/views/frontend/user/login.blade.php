@extends('frontend.layouts.app')

@section('content')
    <section>
        <div class="container pt-5">
            <div class="row">
                <div class="col-md-6 col-sm-8 mx-auto">
                    @include('frontend.layouts.alert')
                    <div class="form-login">
                        <div class="form-title">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('frontend/img/black-logo.png') }}" alt="مزاد الخير" class="img-fluid">
                            </a>
                        </div>
                        <div class="form-body">
                            <form class="form-horizontal" action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="@lang('app.email')" required {{--pattern="[0-9]"--}} value="{{ old('email') }}" title="@lang('app.email')">
                                    <img class="" src="{{ asset('frontend/img/pro.png') }}">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="كلمة المرور" required name="password">
                                    <img class="" src="{{ asset('frontend/img/password-icon.png') }}">
                                </div>
                                <button type="submit" class="btn btn-show w-100">تسجيل دخول</button>
                                <div class="form-group text-center">
                                    <a href="#" class="forget-pass">@lang('app.forget_password')</a>
                                    <a href="{{ route('register') }}" class="forget-pass">انشاء حساب جديد</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

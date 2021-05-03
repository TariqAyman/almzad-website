@extends('frontend.layouts.app')

@section('content')
    <section>
        <div class="container pt-5">
            <div class="row">
                <div class="col-md-6 col-sm-8 mx-auto">
                    <div class="form-login">
                        <div class="form-title">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('frontend/img/black-logo.png') }}" alt="مزاد الخير" class="img-fluid">
                            </a>
                        </div>
                        <div class="form-body">
                            <form class="form-horizontal" action="{{ route('register') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="first_name" class="form-control" placeholder="الاسم الأول" required value="{{ old('first_name') }}">
                                    <img class="" src="{{ asset('frontend/img/pro.png') }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="last_name" class="form-control" placeholder="الاسم الأخير" required value="{{ old('last_name') }}">
                                    <img class="" src="{{ asset('frontend/img/pro.png') }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control" placeholder="اسم المستخدم" required value="{{ old('username') }}">
                                    <img class="" src="{{ asset('frontend/img/pro.png') }}">
                                </div>

                                <div class="form-group">
                                    <input type="tel" style="direction: ltr;text-align: left;" name="phone_number" value="{{ old('phone_number') }}" class="form-control" placeholder="رقم الجوال" required id="phone_number">
                                    <img class="" src="{{ asset('frontend/img/phone-icon.png') }}">
                                </div>

                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="البريد الالكتروني" required value="{{ old('email') }}">
                                    <img class="" src="{{ asset('frontend/img/password-icon.png') }}">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="كلمة المرور" required>
                                    <img class="" src="{{ asset('frontend/img/password-icon.png') }}">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="تأكيد كلمة المرور" required>
                                    <img class="" src="{{ asset('frontend/img/password-icon.png') }}">
                                </div>
                                <div class="form-group">
                                    <input name="tos" type="checkbox" value="1">
                                    <label>@lang('app.toc')</label>
                                </div>
                                <button type="submit" class="btn btn-show w-100">@lang('app.register_now')</button>
                                <div class="form-group text-center">
                                    <a href="{{ route('login') }}" class="forget-pass">@lang('app.login')</a>
                                    <a href="{{ route('password.request') }}" class="forget-pass">@lang('app.forget_password')</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="endrequest" tabindex="-1" role="dialog" aria-labelledby="addPriceLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-box">
                    <button type="button" class="close float-left" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <div class="modal-body">
                        <form class="text-center">
                            <img class="img-fluid mb-3" src="{{ asset('frontend/img/done-re.png') }}">
                            <h4>تم اكمال الطلب بنجاح</h4>
                            <h4>يرجي الانتظار لحين تايد الطلب من الادارة</h4>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

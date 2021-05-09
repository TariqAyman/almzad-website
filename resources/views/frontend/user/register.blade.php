@extends('frontend.layouts.app')

@section('content')
    <section>
        <div class="container pt-5">
            <div class="row">
                <div class="col-md-6 col-sm-8 mx-auto">
                    <div class="form-login">
                        <div class="form-title">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('frontend/img/black-logo.png') }}" alt="{{ setting('company_name') }}" class="img-fluid">
                            </a>
                        </div>
                        <div class="form-body">
                            <form class="form-horizontal" action="{{ route('register') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="first_name" class="form-control" placeholder="@lang('app.first_name')" required value="{{ old('first_name') }}">
                                    <img class="" src="{{ asset('frontend/img/pro.png') }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="last_name" class="form-control" placeholder="@lang('app.last_name')" required value="{{ old('last_name') }}">
                                    <img class="" src="{{ asset('frontend/img/pro.png') }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control" placeholder="@lang('app.username')" required value="{{ old('username') }}">
                                    <img class="" src="{{ asset('frontend/img/pro.png') }}">
                                </div>

                                <div class="input-group input-group-merge mb-2" style="direction: {{ Session::get('appLocale') == 'ar' ? 'ltr' : 'rtl' }};">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon5">+966</span>
                                    </div>
                                    <input type="tel" style="direction: {{ Session::get('appLocale') == 'ar' ? 'ltr' : 'rtl' }};text-align: {{ Session::get('appLocale') == 'ar' ? 'left' : 'right' }};" class="form-control" placeholder="@lang('app.phone_number')" aria-label="phone_number" aria-describedby="basic-addon5" name="phone_number" required value="{{ old('phone_number') }}" title="@lang('app.phone_number')" autocomplete="false">
                                    <img class="" src="{{ asset('frontend/img/phone-icon.png') }}">
                                </div>

                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="@lang('app.email')" required value="{{ old('email') }}">
                                    <img class="" src="{{ asset('frontend/img/password-icon.png') }}">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="@lang('app.password')" required>
                                    <img class="" src="{{ asset('frontend/img/password-icon.png') }}">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="@lang('app.password_confirmation')" required>
                                    <img class="" src="{{ asset('frontend/img/password-icon.png') }}">
                                </div>
                                <div class="form-group">
                                    <input name="tos" type="checkbox" value="1">
                                    <a href="#tos_modal" id="open_tos">@lang('app.toc')</a>
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
    <div class="modal" id="tos_modal" tabindex="-1" role="dialog" aria-labelledby="addPriceLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close float-left" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
                <div class="modal-box">
                    <div class="modal-body">
                        <form class="text-center">
                            <h4>@lang('app.tos')</h4>
                            <h4>{{ setting('tos_text') }}</h4>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <script>
        $(document).ready(function() {
            // executes when HTML-Document is loaded and DOM is ready
            console.log("document is ready");
            $('#open_tos').click(function(e){
                e.preventDefault();
                var href = jQuery(this).attr('href');
                $(href).modal('toggle');
            });
        });
    </script>
@endsection

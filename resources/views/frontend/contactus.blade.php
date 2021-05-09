@extends('frontend.layouts.app')

@section('page-title' , trans('app.contactus'))

@section('content')
    <section>
        <div class="container pt-5">
            <div class="row">
                <div class="col-md-8 col-sm-8 mx-auto">
                    <div class="form-login">
                        <div class="form-title">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('frontend/img/black-logo.png') }}" alt="مزاد الخير" class="img-fluid">
                            </a>
                        </div>
                        <div class="form-body">
                            <form class="form-horizontal" action="{{ route('frontend.contact-us.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subject" placeholder="@lang('app.subject')" required {{--pattern="[0-9]"--}} value="{{ old('subject') }}" title="@lang('app.subject')">
                                    <img class="" src="{{ asset('frontend/img/subject.png') }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="@lang('app.full_name')" required {{--pattern="[0-9]"--}} value="{{ old('name') ?? (auth('user')->check() ? auth('user')->user()->name : null) }}"
                                           title="@lang('app.full_name')">
                                    <img class="" src="{{ asset('frontend/img/name.png') }}">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="@lang('app.email')" required {{--pattern="[0-9]"--}} value="{{ old('email') ?? (auth('user')->check() ? auth('user')->user()->email : null) }}"
                                           title="@lang('app.email')">
                                    <img class="" src="{{ asset('frontend/img/email.png') }}">
                                </div>
                                <div class="input-group input-group-merge mb-2" style="direction: {{ Session::get('appLocale') == 'ar' ? 'ltr' : 'rtl' }};">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon5">+966</span>
                                    </div>
                                    <input type="tel" style="direction: {{ Session::get('appLocale') == 'ar' ? 'ltr' : 'rtl' }};text-align: {{ Session::get('appLocale') == 'ar' ? 'left' : 'right' }};" class="form-control" placeholder="@lang('app.phone_number')" aria-label="phone_number" aria-describedby="basic-addon5" name="phone" required
                                           value="{{ old('phone') ?? (auth('user')->check() ? \Illuminate\Support\Str::replaceFirst('+966','',auth('user')->user()->phone_number) : null) }}" title="@lang('app.phone_number')" autocomplete="false">
                                    <img class="" src="{{ asset('frontend/img/phone-icon.png') }}">
                                </div>
                                <div class="form-group">
                                    <textarea name="message" id="message" class="form-control" placeholder="@lang('app.message_contactus')" cols="40" rows="15" style="margin-top: 0px; margin-bottom: 0px; height: 96px;"
                                              title="@lang('app.message_contactus')">{{ old('message') }}</textarea>
                                    <img class="" src="{{ asset('frontend/img/message2.png') }}">
                                </div>

                                <button type="submit" class="btn btn-show w-100">ارسال</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

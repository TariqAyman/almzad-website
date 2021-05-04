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
                                    <input type="text" style="direction: ltr;text-align: left;" class="form-control" name="subject" placeholder="@lang('app.subject')" required {{--pattern="[0-9]"--}} value="{{ old('subject') }}" title="@lang('app.subject')">
                                    <img class="" src="{{ asset('frontend/img/pro.png') }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" style="direction: ltr;text-align: left;" class="form-control" name="name" placeholder="@lang('app.name')" required {{--pattern="[0-9]"--}} value="{{ old('name') }}" title="@lang('app.name')">
                                    <img class="" src="{{ asset('frontend/img/pro.png') }}">
                                </div>
                                <div class="form-group">
                                    <input type="email" style="direction: ltr;text-align: left;" class="form-control" name="email" placeholder="@lang('app.email')" required {{--pattern="[0-9]"--}} value="{{ old('email') }}" title="@lang('app.email')">
                                    <img class="" src="{{ asset('frontend/img/pro.png') }}">
                                </div>
                                <div class="form-group">
                                    <input type="phone" style="direction: ltr;text-align: left;" class="form-control" name="phone" placeholder="@lang('app.phone')" required {{--pattern="[0-9]"--}} value="{{ old('phone') }}" title="@lang('app.phone')">
                                    <img class="" src="{{ asset('frontend/img/pro.png') }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" style="direction: ltr;text-align: left;" class="form-control" name="message" placeholder="@lang('app.message')" required {{--pattern="[0-9]"--}} value="{{ old('message') }}" title="@lang('app.message')">
                                    <img class="" src="{{ asset('frontend/img/pro.png') }}">
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

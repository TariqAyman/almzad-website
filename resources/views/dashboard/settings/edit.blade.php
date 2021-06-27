@extends('dashboard.layouts.contentLayoutMaster')

@section('page-title', trans('app.settings'))
@section('page-heading', trans('app.settings'))

@section('content')
    <div class="row">
        <div class="col-md-12">
            {{ Form::open(['route' => 'admin.settings.update', 'files'=>true])}}
            <div class="card mb-5">
                <div class="card-header bg-transparent"><h3 class="mb-0">@lang('app.General Settings')</h3></div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('company_name', 'اسم الشركة', ['class' => 'form-control-label'])}}
                                {{ Form::text('company_name', setting('company_name'), ['class'=>"form-control"])}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('company_email', 'البريد الالكتروني لشركة', ['class' => 'form-control-label'])}}
                                {{ Form::text('company_email', setting('company_email'), ['class'=>"form-control"])}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('company_phone', 'رقم الجوال', ['class' => 'form-control-label'])}}
                                {{ Form::text('company_phone', setting('company_phone'), ['class'=>"form-control"])}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('company_address', 'العنوان', ['class' => 'form-control-label'])}}
                                {{ Form::text('company_address', setting('company_address'), ['class'=>"form-control"])}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('company_city', 'المدينة', ['class' => 'form-control-label'])}}
                                {{ Form::text('company_city', setting('company_city'), ['class'=>"form-control"])}}
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                {{ Form::label('company_logo', 'اللوجو', ['class' => 'form-control-label d-block']) }}
                                @if (setting('company_logo'))
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" value="{{ setting('company_logo') }}" name="company_logo"/>
                                    <label class="custom-file-label" for="customFile">Choose Photo</label>
                                </div>
                                @else
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="company_logo"/>
                                        <label class="custom-file-label" for="customFile">Choose Photo</label>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2">
                            @if (setting('company_logo'))
                                <a href="{{ setting('company_name') }} Logo" target="_blank">
                                    <img alt="Image placeholder" width="100" height="100"
                                         class="avatar avatar-xl  rounded-circle"
                                         data-toggle="tooltip" data-original-title="{{ setting('company_name') }} Logo"
                                         src="{{ asset(setting('company_logo')) }}">
                                </a>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ Form::label('company_logo_2', 'اللوجو اضافي', ['class' => 'form-control-label d-block']) }}
                                @if (setting('company_logo_2'))
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" value="{{ setting('company_logo_2') }}" name="company_logo_2"/>
                                        <label class="custom-file-label" for="customFile">Choose Photo</label>
                                    </div>
                                @else
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="company_logo_2"/>
                                        <label class="custom-file-label" for="customFile">Choose Photo</label>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2">
                            @if (setting('company_logo_2'))
                                <a href="{{ setting('company_name') }} Logo" target="_blank">
                                    <img alt="Image placeholder" width="100" height="100"
                                         class="avatar avatar-xl  rounded-circle"
                                         data-toggle="tooltip" data-original-title="{{ setting('company_name') }} Logo"
                                         src="{{ asset(setting('company_logo_2')) }}">
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-5">
                <div class="card-header bg-transparent"><h3 class="mb-0">@lang('app.Social Media Settings')</h3></div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('instagram_url', 'instagram', ['class' => 'form-control-label'])}}
                                {{ Form::url('instagram_url', setting('instagram_url') ?? 'https://www.instagram.com/', ['class'=>"form-control"])}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('twitter_url', 'twitter', ['class' => 'form-control-label'])}}
                                {{ Form::url('twitter_url', setting('twitter_url') ?? 'https://www.twitter.com/', ['class'=>"form-control"])}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('facebook_url', 'facebook', ['class' => 'form-control-label'])}}
                                {{ Form::url('facebook_url', setting('facebook_url') ?? 'https://www.facebook.com/', ['class'=>"form-control"])}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('youtube_url', 'youtube', ['class' => 'form-control-label'])}}
                                {{ Form::url('youtube_url', setting('youtube_url') ?? 'https://www.youtube.com/', ['class'=>"form-control"])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-5">
                <div class="card-header bg-transparent"><h3 class="mb-0">اعدادت المزادات</h3></div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('hold_balance_wallet', trans('app.hold_balance_wallet'), ['class' => 'form-control-label'])}}
                                {{ Form::number('hold_balance_wallet', setting('hold_balance_wallet') ?? 20, ['class'=>"form-control"])}}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('min_bid', trans('app.min_bid'), ['class' => 'form-control-label'])}}
                                {{ Form::number('min_bid', setting('min_bid') ?? 1, ['class'=>"form-control"])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-5">
                <div class="card-header bg-transparent"><h3 class="mb-0">روابط ذات صلة</h3></div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('url_1', trans('app.url_1'), ['class' => 'form-control-label'])}}
                                {{ Form::text('url_1_text', setting('url_1_text') ?? 'url', ['class'=>"form-control",'placeholder' => trans('app.url_1_text')])}}
                                {{ Form::url('url_1', setting('url_1') ?? url(''), ['class'=>"form-control",'placeholder' => trans('app.url')])}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('url_2', trans('app.url_2'), ['class' => 'form-control-label'])}}
                                {{ Form::text('url_2_text', setting('url_2_text') ?? 'url', ['class'=>"form-control",'placeholder' => trans('app.url_2_text')])}}
                                {{ Form::url('url_2', setting('url_2') ?? url(''), ['class'=>"form-control",'placeholder' => trans('app.url')])}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('url_3', trans('app.url_3'), ['class' => 'form-control-label'])}}
                                {{ Form::text('url_3_text', setting('url_3_text') ?? 'url', ['class'=>"form-control",'placeholder' => trans('app.url_3_text')])}}
                                {{ Form::url('url_3', setting('url_3') ?? url(''), ['class'=>"form-control",'placeholder' => trans('app.url')])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-5">
                <div class="card-header bg-transparent"><h4 class="mb-0">@lang('app.Display Settings')</h4></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('record_per_page', 'عدد الاصناف في الصفحه', ['class' => 'form-control-label'])}}
                                {{ Form::text('record_per_page', setting('record_per_page') ?? 15, ['class'=>"form-control"])}}
                            </div>
                        </div>

{{--                        <div class="col-md-6">--}}
{{--                            <div class="form-group">--}}
{{--                                {{Form::label('company_currency_symbol_ar', 'Currency Symbol Ar', ['class' => 'form-control-label'])}}--}}
{{--                                {{ Form::text('company_currency_symbol_ar', setting('company_currency_symbol_ar'), ['class'=>"form-control"])}}--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="form-group">--}}
{{--                                {{Form::label('company_currency_symbol_en', 'Currency Symbol En', ['class' => 'form-control-label'])}}--}}
{{--                                {{ Form::text('company_currency_symbol_en', setting('company_currency_symbol_en'), ['class'=>"form-control"])}}--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
            <div class="card mb-5">
                <div class="card-header bg-transparent"><h4 class="mb-0">@lang('app.Other Settings')</h4></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            {{ Form::label('default_role', 'البريد الإلكتروني لإشعار بتسجيل المستخدم', ['class' => 'form-control-label']) }}
                            <div class="custom-control custom-checkbox">
                                {!! Form::hidden('register_notification_email', 0) !!}
                                <input type="checkbox" name="register_notification_email" value="1" {{ setting('register_notification_email') ? 'checked' : ''}} class="custom-control-input" id="register_notification_email">
                                {{ Form::label('register_notification_email', 'Activate', ['class' => 'custom-control-label form-control-label']) }}
                            </div>
                        </div>

{{--                        <div class="col-lg-6">--}}
{{--                            <div class="form-group">--}}
{{--                                {{ Form::label('default_role', 'Select default register role', ['class' => 'form-control-label']) }}--}}
{{--                                {{ Form::select('default_role', $roles, setting('default_role', null), [ 'class'=> 'selectpicker form-control', 'placeholder' => 'Select role...']) }}--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('max_login_attempts', "الحد الأقصى لمحاولات تسجيل الدخول غير الصالحة", ['class' => 'form-control-label'])}}
                                {{ Form::text('max_login_attempts', setting('max_login_attempts') ?? 3, ['class'=>"form-control"])}}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('lockout_delay', 'مدة حظر تسجيل الدخول ( دقائق)', ['class' => 'form-control-label'])}}
                                {{ Form::text('lockout_delay', setting('lockout_delay') ?? 3, ['class'=>"form-control"])}}
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            {!! Form::submit('حفظ', ['class'=> 'btn btn-primary']) !!}
                        </div>
                    </div>
                </div>
            </div>
            {{Form::close()}}

        </div>
    </div>
@endsection

@extends('dashboard.layouts.contentLayoutMaster')

@section('page-title', trans('app.settings'))
@section('page-heading', trans('app.settings'))

@section('content')
    <div class="row">
        <div class="col-md-12">
            {{ Form::open(['route' => 'admin.settings.update', 'files'=>true])}}
            <div class="card mb-5">
                <div class="card-header bg-transparent"><h3 class="mb-0">General Settings</h3></div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('company_name', 'Company Name', ['class' => 'form-control-label'])}}
                                {{ Form::text('company_name', setting('company_name'), ['class'=>"form-control"])}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('company_email', 'Company Email', ['class' => 'form-control-label'])}}
                                {{ Form::text('company_email', setting('company_email'), ['class'=>"form-control"])}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('company_phone', 'Company Phone', ['class' => 'form-control-label'])}}
                                {{ Form::text('company_phone', setting('company_phone'), ['class'=>"form-control"])}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('company_address', 'Company Address', ['class' => 'form-control-label'])}}
                                {{ Form::text('company_address', setting('company_address'), ['class'=>"form-control"])}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('company_city', 'City', ['class' => 'form-control-label'])}}
                                {{ Form::text('company_city', setting('company_city'), ['class'=>"form-control"])}}
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                {{ Form::label('company_logo', 'Photo', ['class' => 'form-control-label d-block']) }}
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
                    </div>
                </div>
            </div>
            <div class="card mb-5">
                <div class="card-header bg-transparent"><h3 class="mb-0">Social Media Settings</h3></div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('instagram_url', 'instagram', ['class' => 'form-control-label'])}}
                                {{ Form::url('instagram_url', setting('instagram_url'), ['class'=>"form-control"])}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('twitter_url', 'twitter', ['class' => 'form-control-label'])}}
                                {{ Form::url('twitter_url', setting('twitter_url'), ['class'=>"form-control"])}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('facebook_url', 'facebook', ['class' => 'form-control-label'])}}
                                {{ Form::url('facebook_url', setting('facebook_url'), ['class'=>"form-control"])}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('youtube_url', 'youtube_url', ['class' => 'form-control-label'])}}
                                {{ Form::url('youtube_url', setting('youtube_url'), ['class'=>"form-control"])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-5">
                <div class="card-header bg-transparent"><h3 class="mb-0">اكتشف الروابط</h3></div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('url_1', 'url_1', ['class' => 'form-control-label'])}}
                                {{ Form::text('url_1_text', setting('url_1_text'), ['class'=>"form-control"])}}
                                {{ Form::url('url_1', setting('url_1'), ['class'=>"form-control"])}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('url_2', 'url_2', ['class' => 'form-control-label'])}}
                                {{ Form::text('url_2_text', setting('url_2_text'), ['class'=>"form-control"])}}
                                {{ Form::url('url_2', setting('url_2'), ['class'=>"form-control"])}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('url_3', 'url_3', ['class' => 'form-control-label'])}}
                                {{ Form::text('url_3_text', setting('url_3_text'), ['class'=>"form-control"])}}
                                {{ Form::url('url_3', setting('url_3'), ['class'=>"form-control"])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-5">
                <div class="card-header bg-transparent"><h4 class="mb-0">Display Settings</h4></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('record_per_page', 'Record Per Page', ['class' => 'form-control-label'])}}
                                {{ Form::text('record_per_page', setting('record_per_page'), ['class'=>"form-control"])}}
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
                <div class="card-header bg-transparent"><h4 class="mb-0">Other Settings</h4></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            {{ Form::label('default_role', 'User Registeration Admin Notification Email', ['class' => 'form-control-label']) }}
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
                                {{Form::label('max_login_attempts', 'Maximum invaild login attempts', ['class' => 'form-control-label'])}}
                                {{ Form::text('max_login_attempts', setting('max_login_attempts'), ['class'=>"form-control"])}}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('lockout_delay', 'Lockout delay (minutes)', ['class' => 'form-control-label'])}}
                                {{ Form::text('lockout_delay', setting('lockout_delay'), ['class'=>"form-control"])}}
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            {!! Form::submit('Update Settings', ['class'=> 'btn btn-primary']) !!}
                        </div>
                    </div>
                </div>
            </div>
            {{Form::close()}}

        </div>
    </div>
@endsection

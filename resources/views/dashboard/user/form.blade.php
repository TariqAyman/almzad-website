@extends('dashboard.layouts.contentLayoutMaster')

@if($edit)
    @section('page-title', trans('app.edit_users'))
@section('page-heading', trans('app.edit_users'))
@else
    @section('page-title', trans('app.add_user'))
@section('page-heading', trans('app.add_user'))
@endif

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    @if($edit)
                        {!! Form::open(['route' => ['admin.user.update',$user->id], 'method' => 'PUT','files' => true, 'id' => 'update-form']) !!}
                    @else
                        {!! Form::open(['route' => 'admin.user.store', 'files' => true, 'id' => 'store-form']) !!}
                    @endif
                    <h6 class="heading-small text-muted mb-4">@lang('app.User information')</h6>
                    <div class="pl-lg-4">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('first_name', trans('app.first_name'), ['class' => 'form-control-label']) }}
                                    {{ Form::text('first_name', $edit ? $user->first_name : old('first_name'), ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('last_name', trans('app.last_name'), ['class' => 'form-control-label']) }}
                                    {{ Form::text('last_name', $edit ? $user->last_name : old('last_name'), ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('email', trans('app.email'), ['class' => 'form-control-label']) }}
                                    {{ Form::email('email', $edit ? $user->email : old('email'), ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('username', trans('app.username'), ['class' => 'form-control-label']) }}
                                    {{ Form::text('username', $edit ? $user->username : old('username'), ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('phone_number', trans('app.phone_number'), ['class' => 'form-control-label']) }}
                                    {{ Form::tel('phone_number', $edit ? $user->phone_number : old('phone_number'), ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('address', trans('app.address'), ['class' => 'form-control-label']) }}
                                    {{ Form::text('address', $edit ? $user->address : old('address'), ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::label('profile_photo', trans('app.Photo'), ['class' => 'form-control-label d-block']) }}
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="profile_photo"/>
                                        <label class="custom-file-label" for="customFile">Choose Photo</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                @if ($edit && $user->profile_photo)
                                    <a href="{{ asset($user->profile_photo) }}" target="_blank">
                                        <img alt="Image placeholder"
                                             class="avatar avatar-xl  rounded-circle"
                                             data-toggle="tooltip" data-original-title="{{ $user->name }} Logo"
                                             src="{{ asset($user->profile_photo) }}">
                                    </a>
                                @endif
                            </div>
                        </div>
                        <hr class="my-4"/>
                        <!-- Address -->
                        <h6 class="heading-small text-muted mb-4">@lang('app.Password information')</h6>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('password', trans('app.Password'), ['class' => 'form-control-label']) }}
                                    {{ Form::password('password', ['class' => 'form-control']) }}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('password_confirmation', trans('app.Confirm password'), ['class' => 'form-control-label']) }}
                                    {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>

                        <hr class="my-4"/>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        {!! Form::hidden('status', 0) !!}
                                        <input type="checkbox" name="status" value="1" {{ ($edit && $user->status) ? 'checked' : ''}} class="custom-control-input" id="status">
                                        {{ Form::label('status', trans('app.status'), ['class' => 'custom-control-label']) }}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        {!! Form::hidden('phone_verified', 0) !!}
                                        <input type="checkbox" name="phone_verified" value="1" {{ ($edit && $user->phone_verified) ? 'checked' : ''}} class="custom-control-input" id="phone_verified">
                                        {{ Form::label('phone_verified', trans('app.phone_verified'), ['class' => 'custom-control-label']) }}
                                    </div>
                                </div>
                                @can('update-user')
                                    <div class="col-md-12">
                                        {{ Form::submit('Submit', ['class'=> 'mt-5 btn btn-primary']) }}
                                    </div>
                                @endcan
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        jQuery(document).ready(function () {
            jQuery('#uploadFile').filemanager('file');
        })
    </script>
@endpush

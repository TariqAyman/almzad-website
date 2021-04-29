@extends('dashboard.layouts.contentLayoutMaster')

@if($edit)
    @section('page-title', trans('app.edit_admins'))
@section('page-heading', trans('app.edit_admins'))
@else
    @section('page-title', trans('app.add_admin'))
@section('page-heading', trans('app.add_admin'))
@endif

@push('pg_btn')
    <a href="{{route('admin.admins.index')}}" class="btn btn-sm btn-neutral">All Users</a>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    @if($edit)
                        {!! Form::open(['route' => ['admin.admins.update',$admin->id], 'method' => 'PUT','files' => true, 'id' => 'update-form']) !!}
                    @else
                        {!! Form::open(['route' => 'admin.admins.store', 'files' => true, 'id' => 'store-form']) !!}
                    @endif
                    <h6 class="heading-small text-muted mb-4">User information</h6>
                    <div class="pl-lg-4">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('name', 'Name', ['class' => 'form-control-label']) }}
                                    {{ Form::text('name', $edit ? $admin->name : null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('email', 'E-mail', ['class' => 'form-control-label']) }}
                                    {{ Form::email('email', $edit ? $admin->email : null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('phone_number', 'Phone number', ['class' => 'form-control-label']) }}
                                    {{ Form::text('phone_number', $edit ? $admin->phone_number : null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('role', 'Select Role', ['class' => 'form-control-label']) }}
                                    {{ Form::select('role', $roles, $edit ? $admin->roles : null, [ 'class'=> 'selectpicker form-control', 'placeholder' => 'Select role...']) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::label('profile_photo', 'Photo', ['class' => 'form-control-label d-block']) }}
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="profile_photo"/>
                                        <label class="custom-file-label" for="customFile">Choose Photo</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                @if ($edit && $admin->profile_photo)
                                    <a href="{{ asset($admin->profile_photo) }}" target="_blank">
                                        <img alt="Image placeholder"
                                             class="avatar avatar-xl  rounded-circle"
                                             data-toggle="tooltip" data-original-title="{{ $admin->name }} Logo"
                                             src="{{ asset($admin->profile_photo) }}">
                                    </a>
                                @endif
                            </div>
                        </div>
                        <hr class="my-4"/>
                        <!-- Address -->
                        <h6 class="heading-small text-muted mb-4">Password information</h6>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('password', 'Password', ['class' => 'form-control-label']) }}
                                    {{ Form::password('password', ['class' => 'form-control']) }}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('password_confirmation', 'Confirm password', ['class' => 'form-control-label']) }}
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
                                        <input type="checkbox" name="status" value="1" {{ ($edit && $admin->status) ? 'checked' : ''}} class="custom-control-input" id="status">
                                        {{ Form::label('status', 'Status', ['class' => 'custom-control-label']) }}
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

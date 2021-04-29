@extends('dashboard.layouts.contentLayoutMaster')

@section('title', 'Create New Permission')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    {!! Form::open(['route' => ['admin.profile.update'], 'files' => true]) !!}
                    <h6 class="heading-small text-muted mb-4">Profile</h6>
                    <div class="pl-lg-4">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('name', 'Name', ['class' => 'form-control-label']) }}
                                    {{ Form::text('name',  $admin->name, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label('email', 'E-mail', ['class' => 'form-control-label']) }}
                                    {{ Form::email('email',  $admin->email , ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('phone_number', 'Phone number', ['class' => 'form-control-label']) }}
                                    {{ Form::text('phone_number',  $admin->phone_number, ['class' => 'form-control']) }}
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
                                @if ( $admin->profile_photo)
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
                    </div>
                    <hr class="my-4"/>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-md-12">
                                {{ Form::submit('Submit', ['class'=> 'mt-5 btn btn-primary']) }}
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection


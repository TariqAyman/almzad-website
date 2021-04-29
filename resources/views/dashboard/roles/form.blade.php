@extends('dashboard.layouts.contentLayoutMaster')

@section('page-title', trans('app.roles'))
@section('page-heading', $edit ? $role->name : trans('app.create_new_role'))

@push('pg_btn')
    <a href="{{route('admin.roles.index')}}" class="btn btn-sm btn-neutral">All Roles</a>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    @if ($edit)
                        {!! Form::open(['route' => ['admin.roles.update', $role->id], 'method' => 'PUT', 'id' => 'role-form']) !!}
                    @else
                        {!! Form::open(['route' => 'admin.roles.store', 'id' => 'role-form']) !!}
                    @endif
                    <h6 class="heading-small text-muted mb-4">Role information</h6>
                    <div class="pl-lg-4">
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">@lang('app.name')</label>
                            <div class="col-sm-10">
                                {!! Form::text('name',$edit ? $role->name : old('name'),['class' => 'form-control','placeholder' => trans('app.name')]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">@lang('app.display_name')</label>
                            <div class="col-sm-10">
                                {{ Form::text('display_name', $edit ? $role->display_name : old('display_name'), ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="pl-lg-1">
                            <div class="row">
                                <div class="col-md-12">
                                    {{ Form::submit('Submit', ['class'=> 'mt-3 btn btn-primary']) }}
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

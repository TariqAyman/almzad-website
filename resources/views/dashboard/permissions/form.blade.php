@extends('dashboard.layouts.contentLayoutMaster')

@if($edit)
    @section('page-title', $edit ? $permission->name : trans('app.create_new_permission'))
@section('page-heading', $edit ? $permission->name : trans('app.create_new_permission'))

@else
    @section('page-title', trans('app.permissions'))
@section('page-heading', trans('app.permissions'))
@endif


@push('pg_btn')
    <a href="{{route('admin.permissions.index')}}" class="btn btn-sm btn-neutral">All Permissions</a>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    @if ($edit)
                        {!! Form::open(['route' => ['admin.permissions.update', $permission->id], 'method' => 'PUT', 'id' => 'permission-form']) !!}
                    @else
                        {!! Form::open(['route' => 'admin.permissions.store', 'id' => 'permission-form']) !!}
                    @endif
                    <h6 class="heading-small text-muted mb-4">Permission information</h6>
                    <div class="pl-lg-4">
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">@lang('app.name')</label>
                            <div class="col-sm-10">
                                {!! Form::text('name',$edit ? $permission->name : old('name'),['class' => 'form-control','placeholder' => trans('app.name') , 'readonly']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">@lang('app.display_name')</label>
                            <div class="col-sm-10">
                                {{ Form::text('display_name', $edit ? $permission->display_name : old('display_name'), ['class' => 'form-control']) }}
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

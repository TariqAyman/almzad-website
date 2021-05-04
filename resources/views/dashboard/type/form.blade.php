@extends('dashboard.layouts.contentLayoutMaster')

@if($edit)
    @section('page-title', trans('app.edit_type'))
@section('page-heading', trans('app.edit_type'))
@else
    @section('page-title', trans('app.add_type'))
@section('page-heading', trans('app.add_type'))
@endif

@push('pg_btn')
    <a href="{{route('admin.type.index')}}" class="btn btn-sm btn-neutral">All type</a>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    @if($edit)
                        {!! Form::open(['route' => ['admin.type.update',$type->id], 'method' => 'PUT','files' => false, 'id' => 'type-form']) !!}
                    @else
                        {!! Form::open(['route' => 'admin.type.store', 'files' => true, 'id' => 'type-form']) !!}
                    @endif
                    <h6 class="heading-small text-muted mb-4">@lang('app.type information')</h6>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">@lang('app.name_en')</label>
                        <div class="col-sm-10">
                            {{ Form::text('name_en', $edit ? $type->name_en : old('name_en'), ['class' => 'form-control']) }}
                        </div>
                    </div>

                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">@lang('app.name_ar')</label>
                            <div class="col-sm-10">
                                {{ Form::text('name_ar', $edit ? $type->name_ar : old('name_ar'), ['class' => 'form-control']) }}
                            </div>
                        </div>

                    <div class="form-group row">
                        <div class="pl-lg-4">
                            <div class="col-md-12">
                                <div class="custom-control custom-checkbox">
                                    {{ Form::checkbox('status', $edit ? $type->status : 1, 1, ['id'=>"status",'class' => 'custom-control-input']) }}
                                    {{ Form::label('status', trans('app.status'), ['class' => 'custom-control-label']) }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10 ml-sm-auto">
                            @can('update-type')
                                {{ Form::submit(trans('app.submit'), ['class'=> 'mt-5 btn btn-primary']) }}
                            @endcan
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

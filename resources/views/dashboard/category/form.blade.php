@extends('dashboard.layouts.contentLayoutMaster')

@if($edit)
    @section('page-title', trans('app.edit_category'))
@section('page-heading', trans('app.edit_category'))
@else
    @section('page-title', trans('app.add_category'))
@section('page-heading', trans('app.add_category'))
@endif

@push('pg_btn')
    <a href="{{route('admin.category.index')}}" class="btn btn-sm btn-neutral">All category</a>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    @if($edit)
                        {!! Form::open(['route' => ['admin.category.update',$category->id], 'method' => 'PUT','files' => false, 'id' => 'category-form']) !!}
                    @else
                        {!! Form::open(['route' => 'admin.category.store', 'files' => true, 'id' => 'category-form']) !!}
                    @endif
                    <h6 class="heading-small text-muted mb-4">@lang('app.Category information')</h6>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">@lang('app.name_en')</label>
                        <div class="col-sm-10">
                            {{ Form::text('name_en', $edit ? $category->name_en : old('name_en'), ['class' => 'form-control']) }}
                        </div>
                    </div>

                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">@lang('app.name_ar')</label>
                            <div class="col-sm-10">
                                {{ Form::text('name_ar', $edit ? $category->name_ar : old('name_ar'), ['class' => 'form-control']) }}
                            </div>
                        </div>

                    <div class="form-group row">
                        <div class="pl-lg-4">
                            <div class="col-md-12">
                                <div class="custom-control custom-checkbox">
                                    {{ Form::checkbox('status', $edit ? $category->status : 1, 1, ['id'=>"status",'class' => 'custom-control-input']) }}
                                    {{ Form::label('status', trans('app.status'), ['class' => 'custom-control-label']) }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10 ml-sm-auto">
                            @can('update-category')
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

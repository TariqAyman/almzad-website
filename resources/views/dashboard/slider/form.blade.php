@extends('dashboard.layouts.contentLayoutMaster')

@if($edit)
    @section('page-title', trans('app.edit_slider'))
@section('page-heading', trans('app.edit_slider'))
@else
    @section('page-title', trans('app.add_slider'))
@section('page-heading', trans('app.add_slider'))
@endif

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    @if($edit)
                        {!! Form::open(['route' => ['admin.slider.update',$slider->id], 'method' => 'PUT','files' => false, 'id' => 'slider-form']) !!}
                    @else
                        {!! Form::open(['route' => 'admin.slider.store', 'files' => true, 'id' => 'slider-form']) !!}
                    @endif
                    <h6 class="heading-small text-muted mb-4">@lang('app.Slider information')</h6>

                    <div class="form-group row">
                        <div class="col-6">
                            <label class="col-form-label col-sm-2 text-sm-right">@lang('app.name_ar')</label>
                            <div class="col-sm-10">
                                {{ Form::text('name_ar', $edit ? $slider->name_ar : old('name_ar'), ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="col-form-label col-sm-2 text-sm-right">@lang('app.name_en')</label>
                            <div class="col-sm-10">
                                {{ Form::text('name_en', $edit ? $slider->name_en : old('name_en'), ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-6">
                            <label class="col-form-label col-sm-2 text-sm-right">@lang('app.title_ar')</label>
                            <div class="col-sm-10">
                                {{ Form::text('title_ar', $edit ? $slider->title_ar : old('title_ar'), ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="col-form-label col-sm-2 text-sm-right">@lang('app.title_en')</label>
                            <div class="col-sm-10">
                                {{ Form::text('title_en', $edit ? $slider->title_en : old('title_en'), ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-6">
                            <label class="col-form-label col-sm-2 text-sm-right">@lang('app.sub_title_ar')</label>
                            <div class="col-sm-10">
                                {{ Form::text('sub_title_ar', $edit ? $slider->sub_title_ar : old('sub_title_ar'), ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="col-form-label col-sm-2 text-sm-right">@lang('app.sub_title_en')</label>
                            <div class="col-sm-10">
                                {{ Form::text('sub_title_en', $edit ? $slider->sub_title_en : old('sub_title_en'), ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-6">
                            <label class="col-form-label col-sm-2 text-sm-right">@lang('app.description_ar')</label>
                            <div class="col-sm-10">
                                {{ Form::textarea('description_ar', $edit ? $slider->description_ar : old('description_ar'), ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="col-form-label col-sm-2 text-sm-right">@lang('app.description_en')</label>
                            <div class="col-sm-10">
                                {{ Form::textarea('description_en', $edit ? $slider->description_en : old('description_en'), ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="pl-lg-4">
                            <div class="col-md-12">
                                <div class="custom-control custom-checkbox">
                                    {!! Form::hidden('status', 0) !!}
                                    <input type="checkbox" name="status" value="1" {{ ($edit && $slider->status) ? 'checked' : ''}} class="custom-control-input" id="status">

                                    {{ Form::label('status', trans('app.status'), ['class' => 'custom-control-label']) }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10 ml-sm-auto">
                            @can('update-slider')
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

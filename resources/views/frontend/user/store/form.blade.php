@extends('frontend.layouts.app')

@section('page-title' , trans('app.my_store'))

@section('content')
    <div class="page-header">
        <div class="container">
            <h2>@lang('app.all_auctions')</h2>
            <div class="tit"><i class="fas fa-home"></i>
                <a href="{{ url('/') }}">@lang('app.home')</a>
                / <a href="{{ route('frontend.user.store') }}">@lang('app.my_store')</a>
                / <span>@lang('app.add_store')</span>
            </div>
        </div>
    </div>
    <div class="container mt-5 store-pro">
        <div class="add-det aboutme">
            <p class="det-name px-md-2">@lang('app.add_store')</p>
        </div>
    </div>
    <!--StartAddMzad-->
    <section class="add-mzad">
        <div class="container">
            <!--mainContent-->
            <h4>المحتوى الأساسي</h4>
            {!! Form::open(['route' => ['frontend.user.store.save'], 'files' => true]) !!}
            <div class="bord">
                <div class="form-group row">
                    <div class="col-6">
                        <input type="text" name="name_ar" class="form-control" placeholder="@lang('app.store_name_ar')" required value="{{ $edit ? $store->name_ar : old('name_ar') }}">
                    </div>
                    <div class="col-6">
                        <input type="text" name="name_en" class="form-control" placeholder="@lang('app.store_name_en')" required value="{{ $edit ? $store->name_en : old('name_en') }}">
                    </div>
                </div>
                <input type="text" class="form-control" name="phone_number" placeholder="@lang('app.phone_number')" required value="{{ $edit ? $store->phone_number : old('phone_number') }}">
                <input type="text" class="form-control" name="email" placeholder="@lang('app.email')" required value="{{ $edit ? $store->email : old('email') }}">
                <!--descripe-->
                <div class="form-group row">
                    <div class="col-6">
                        <textarea class="form-control" rows="7" id="comment" name="@lang('app.description_ar')" placeholder="@lang('app.description_ar')">{{ $edit ? $store->description_ar : old('description_ar') }}</textarea>
                    </div>
                    <div class="col-6">
                        <textarea class="form-control" rows="7" id="comment" name="@lang('app.description_en')" placeholder="@lang('app.description_en')">{{ $edit ? $store->description_en : old('description_en') }}</textarea>
                    </div>
                </div>

                <div class="d-flex flex-upload">
                    <div class="upload-pic">
                        <input type="file" name="image" id="file-5" class="inputfile inputfile-1 form-control" accept="image/*">
                        @if($edit && $store->image)
                            <label for="file-5"> <img id="imgshow" src="{{ asset($store->image) }}" class="img-fluid"> </label>
                        @else
                            <label for="file-5"> <img id="imgshow" src="{{ asset('frontend/img/add-pic.png') }}" class="img-fluid"> </label>
                        @endif
                        <p>@lang('app.Choose an image')</p>
                    </div>
                    <div class="upload-text">
                        <h4>@lang('app.Add a picture to the store')</h4>
                        <p>@lang('app.Note')</p>
                        <p>@lang('app.Image dimensions are a minimum')</p>
                        <p class="ub-font">600*400 PX</p>
                        <p>@lang('app.The image must not exceed the size')</p>
                        <p class="ub-font">2MB</p>
                    </div>
                </div>
            </div><!--bord-->
            <div>
                <button type="submit" class="btn btn-add w-100">@lang('app.add_store')</button>
            </div>
            {!! Form::close() !!}
        </div>
    </section>
@endsection

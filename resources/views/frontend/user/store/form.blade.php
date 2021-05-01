@extends('frontend.layouts.app')


@section('content')
    <div class="page-header">
        <div class="container">
            <h2>كل المزادات</h2>
            <div class="tit"><i class="fas fa-home"></i>
                <a href="{{ url('/') }}">الرئيسية</a>
                / <a href="{{ route('frontend.user.store') }}">متجري</a>
                / <span>إضافة متجر</span>
            </div>
        </div>
    </div>
    <div class="container mt-5 store-pro">
        <div class="add-det aboutme">
            <p class="det-name px-md-2">إضافة متجر</p>
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
                        <input type="text" name="name_ar" class="form-control" placeholder="اسم المتجر" required value="{{ $edit ? $store->name_ar : old('name_ar') }}">
                    </div>
                    <div class="col-6">
                        <input type="text" name="name_en" class="form-control" placeholder="اسم المتجر" required value="{{ $edit ? $store->name_en : old('name_en') }}">
                    </div>
                </div>
                <input type="text" class="form-control" name="phone_number" placeholder="رقم الموبايل" required value="{{ $edit ? $store->phone_number : old('phone_number') }}">
                <input type="text" class="form-control" name="email" placeholder="البريد الالكتروني" required value="{{ $edit ? $store->email : old('email') }}">
                <!--descripe-->
                <div class="form-group row">
                    <div class="col-6">
                        <textarea class="form-control" rows="7" id="comment" name="description_ar" placeholder="وصف للمتجر">{{ $edit ? $store->description_ar : old('description_ar') }}</textarea>
                    </div>
                    <div class="col-6">
                        <textarea class="form-control" rows="7" id="comment" name="description_en" placeholder="وصف للمتجر">{{ $edit ? $store->description_en : old('description_en') }}</textarea>
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
                        <p>اختر صورة</p>
                    </div>
                    <div class="upload-text">
                        <h4>اضف صورة للمتجر</h4>
                        <p>ملحوظة</p>
                        <p>أبعاد الصورة حد ادني</p>
                        <p class="ub-font">600*400 PX</p>
                        <p>و يجب ان لا تتعدي الصورة حجم</p>
                        <p class="ub-font">2MB</p>
                    </div>
                </div>
            </div><!--bord-->
            <div>
                <button type="submit" class="btn btn-add w-100">اضافة المتجر</button>
            </div>
            {!! Form::close() !!}
        </div>
    </section>
@endsection

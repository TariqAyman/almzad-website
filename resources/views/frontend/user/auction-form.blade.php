@extends('frontend.layouts.app')

@section('style')
    <style>
        /* The grid: Four equal columns that floats next to each other */
        .custom-column {
            float: left;
            width: 25%;
            padding: 10px;
        }

        /* Style the images inside the grid */
        .custom-column img {
            opacity: 0.8;
            cursor: pointer;
        }

        .custom-column img:hover {
            opacity: 1;
        }

        /* Clear floats after the columns */
        .custom-row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
@endsection

@section('content')
    <div class="page-header">
        <div class="container">
            <h2>كل المزادات</h2>
            <div class="tit"><i class="fas fa-home"></i><a href="{{ url('/') }}">الرئيسية</a>
                / <span>البائع</span>
                / <span>المزادات</span>
                / <span>إضافة مزاد</span>
            </div>
        </div>
    </div>
    <div class="container mt-5 store-pro">
        <div class="add-det aboutme">
            <p class="det-name px-md-2">إضافة مزاد</p>
        </div>
    </div>

    <section class="add-mzad">
        @if ($edit)
            {!! Form::open(['route' => ['frontend.user.auctions.update', $auction->id], 'files' => true, 'method' => 'PUT', 'id' => 'update-form']) !!}
        @else
            {!! Form::open(['route' => 'frontend.user.auctions.store','files' => true, 'id' => 'create-form']) !!}
        @endif
        <div class="container">
            <h4>المحتوى الأساسي</h4>
            <div class="bord">
{{--                <select name="currency_id" class="form-control">--}}
{{--                    @foreach($currencies as $currency)--}}
{{--                        <option value="{{ $currency->id }}" {{ ($edit && $auction->currency_id === $currency->id) ? 'selected' : '' }} >{{ $currency->name }}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
                <select name="type_id" class="form-control">
                    @foreach($types as $type)
                        <option value="{{ $type->id }}" {{ ($edit && $auction->type_id === $type->id) ? 'selected' : '' }} >{{ $type->name }}</option>
                    @endforeach
                </select>

                <select name="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ ($edit && $auction->category_id === $category->id) ? 'selected' : '' }} >{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <h4>عن المزاد</h4>
            <div class="bord">
                <div class="form-group row">
                    <div class="col-6">
                        <input type="text" name="name_ar" class="form-control" placeholder="العنوان عربي" data-bv-field="address" value="{{ $edit ? $auction->name_ar : old('name_ar') }}">
                    </div>
                    <div class="col-6">
                        <input type="text" name="name_en" class="form-control" placeholder="العنوان انجليزي" data-bv-field="address" value="{{ $edit ? $auction->name_en : old('name_en') }}">
                    </div>
                </div>
                <input type="number" name="start_from" class="form-control" placeholder="سعر بداية المزاد" data-bv-field="price" value="{{ $edit ? $auction->start_from : old('start_from') }}" step="1">
                <input type="number" name="purchase_price" class="form-control" placeholder="سعر الشراء الفوري" data-bv-field="price" value="{{ $edit ? $auction->price : old('price') }}" step='1'>
                <div class="date-box">
                    <div class="date-a flex-fill ml-lg-2">
                        <label class="text-d">تاريح البداية</label>
                        <input name="start_date" type="date" class="form-control" value="{{ $edit ? $auction->start_date->format('Y-m-d') : old('start_date') }}">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div class="date-a flex-fill">
                        <label class="text-d">تاريح النهاية</label>
                        <input name="end_date" type="date" class="form-control" value="{{ $edit ? $auction->end_date->format('Y-m-d') : old('end_date') }}">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-6">
                        <textarea class="form-control" rows="7" id="comment" placeholder="وصف المزاد عربي" name="description_ar">{{ $edit ? $auction->description_ar : old('description_ar') }}</textarea>
                    </div>
                    <div class="col-6">
                        <textarea class="form-control" rows="7" id="comment" placeholder="وصف المزاد انجليزي" name="description_en">{{ $edit ? $auction->description_en : old('description_en') }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-6">
                        <textarea class="form-control" rows="7" id="comment" placeholder="شروط المزاد عربي" name="conditions_ar">{{ $edit ? $auction->conditions_ar : old('conditions_ar') }}</textarea>
                    </div>
                    <div class="col-6">
                        <textarea class="form-control" rows="7" id="comment" placeholder="شروط المزاد انجليزي" name="conditions_en">{{ $edit ? $auction->conditions_en : old('conditions_en') }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="custom-row">
                        @if($edit && $auction->auctionsImages->count() > 0)
                            @foreach($auction->auctionsImages as $image)
                                <div class="custom-column">
                                    <img src="{{ asset($image->image) }}" alt="{{ $auction->name }}" style="width:100%">
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="d-flex flex-upload">
                    <div class="upload-pic">
                        <input type="file" name="images[]" id="file-5" class="inputfile inputfile-1 form-control" data-multiple-caption="{count} files selected" multiple accept="image/*">
                        <label for="file-5">
                            <img id="imgshow" src="{{ asset('frontend/img/add-pic.png') }}" class="img-fluid">
                        </label>
                        <p>اختر صورة</p>
                    </div>
                    <div class="upload-text">
                        <h4>اضف صورة او صور متعددة للمزاد</h4>
                        <p>ملحوظة</p>
                        <p>أبعاد الصورة حد ادني</p>
                        <p class="ub-font">600*400 PX</p>
                        <p>و يجب ان لا تتعدي الصورة حجم</p>
                        <p class="ub-font">2MB</p>
                    </div>
                    <div class="upload-more">
                        <input type="file" name="images[]" id="file-5" class="inputfile inputfile-1 form-control" data-multiple-caption="{count} files selected" multiple accept="image/*">
                        <label for="files">
                            <button type="button" class="btn btn-show">أضف الصورة التالية</button>
                        </label>
                        <div id='result'></div>
                    </div>
                </div>
            </div>
            <h4>معلومات اضافية</h4>
            <div class="bord">
                <div class="charge-box">
                    <p>هل متاح الشحن؟</p>
                    <div class="d-flex">
                        <label class="charge-txt">نعم
                            <input type="radio" {{ $edit && $auction->shipping ? 'checked' : '' }} name="shipping" value="1">
                            <span class="checkmark"></span>
                        </label>
                        <label class="charge-txt">لا
                            <input type="radio" {{ $edit && $auction->shipping ? '' : 'checked' }} name="shipping" value="0">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
                <div class="charge-box mt-2">
                    <p>نوع الشحن؟</p>
                    <div class="d-flex">
                        <label class="charge-txt">مجاني
                            <input type="radio" {{ $edit && $auction->shipping_free ? 'checked' : '' }} name="shipping_free" value="1">
                            <span class="checkmark"></span>
                        </label>
                        <label class="charge-txt">مدفوع
                            <input type="radio" {{ $edit && $auction->shipping_free ? '' : 'checked' }} name="shipping_free" value="0">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-6">
                        <textarea class="form-control" rows="7" id="comment" placeholder="وصف الشحن عربي" name="shipping_conditions_ar">{{ $edit ? $auction->shipping_conditions_ar : old('shipping_conditions_ar') }}</textarea>
                    </div>
                    <div class="col-6">
                        <textarea class="form-control" rows="7" id="comment" placeholder="وصف الشحن انجليزي" name="shipping_conditions_en">{{ $edit ? $auction->shipping_conditions_en : old('shipping_conditions_en') }}</textarea>
                    </div>
                </div>
            </div>
            <div class="bord my-3">
                <div class="charge-box">
                    <p>متعدد المزادات</p>
                    <div class="d-flex">
                        <label class="charge-txt">مسموع به
                            <input type="radio" {{ $edit && $auction->multi_auction ? 'checked' : '' }} name="multi_auction" value="1">
                            <span class="checkmark"></span>
                        </label>
                        <label class="charge-txt">ملغي
                            <input type="radio" {{ $edit && $auction->multi_auction ? '' : 'checked' }} name="multi_auction" value="0">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-add w-100">حفظ المزاد</button>
            </div>
        </div>
        {!! Form::close() !!}
    </section>
@endsection

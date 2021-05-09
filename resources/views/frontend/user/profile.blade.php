@extends('frontend.layouts.app')

@section('page-title' , trans('app.Edit Profile'))

@section('content')
    <div class="page-header">
        <div class="container">
            <h2>حسابي</h2>
            <div class="tit"><i class="fas fa-home"></i><a href="{{ url('/') }}">الرئيسية</a> / <span>حسابي</span></div>
        </div>
    </div>
    <section class="user-acount">
        <div class="container">
            <div class="sort-product">
                <div class="row user-box">
                    <div class="col-md-4">
                        <div class="user-pic">
                            <label for="file-5">
                                @if($user->profile_photo)
                                    <img id="imgshow" src="{{ asset($user->profile_photo) }}" class="img-fluid">
                                @else
                                    <img id="imgshow" src="{{ asset('frontend/img/user-pic.png') }}" class="img-fluid">
                                @endif
                            </label>
                        </div>
                    </div>
                    <div class="col-md-4 det-name">
                        <h4>{{ $user->name }}</h4>
                        <p class="email ub-font">{{ $user->email }}</p>
                    </div>
                    <div class="col-md-4">
                        {!! Form::open(['route' => ['frontend.profile.store'], 'files' => true]) !!}
                        <div class="upload-pic">
                            <input type="file" name="profile_photo" id="file-5" class="inputfile inputfile-1 form-control" accept="image/*">
                            <label for="file-5" class="btn btn-show">تغير الصورة</label>
                            <button type="submit" class="btn btn-show">@lang('app.Edit image')</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3">
                    <div class="tab-title">
                        <ul class="nav nav-tabs nav-detail">
                            <li><a href="#info" class="tabs__trigger active" role="tab" data-toggle="tab"> @lang('app.Personal Info') </a>
                            </li>
                            <li><a href="#password" class="tabs__trigger" role="tab" data-toggle="tab">
                                    تغيير كلمة المرور</a>
                            </li>
{{--                            <li><a href="#address" class="tabs__trigger" role="tab" data-toggle="tab">--}}
{{--                                    عناويني</a>--}}
{{--                            </li>--}}
{{--                            <li><a href="#idactive" class="tabs__trigger" role="tab" data-toggle="tab">--}}
{{--                                    تفعيل الهوية</a>--}}
{{--                            </li>--}}
                            <li><a href="#updateProfile" class="tabs__trigger" role="tab" data-toggle="tab">
                                    تعديل الملف</a>
                            </li>
                        </ul>
                    </div><!--tabTite-->
                </div>
                <div class="col-md-9">
                    <div class="tab-content mb-3">
                        <!--Startinfo-->
                        <div class="tab-pane active" role="tabpanel" id="info">
                            <div class="row">
                                <!--name-->

                                <div class="col-sm-6">
                                    <p class="tit">@lang('app.name')</p>
                                </div>
                                <div class="col-sm-6">
                                    <p>{{ $user->name }}</p>
                                </div>
                                <!--taype-->
                                <div class="col-sm-6">
                                    <p class="tit">نوع المستخدم</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="det">{{ ($user->type == 'user' ) ? 'مستخدم' : 'بائع' }}</p>
                                </div>
                                <!--email-->
                                <div class="col-sm-6">
                                    <p class="tit">@lang('app.email')</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="det ub-font">{{ $user->email }}</p>
                                </div>
                                <!--username-->
                                <div class="col-sm-6">
                                    <p class="tit">@lang('app.username')</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="det ub-font">{{ $user->username }}</p>
                                </div>
                                <!--address-->
{{--                                <div class="col-sm-6">--}}
{{--                                    <p class="tit">@lang('app.address')</p>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-6">--}}
{{--                                    <p class="det">{{ $user->address }}</p>--}}
{{--                                </div>--}}
                                <!--acount-->
                                <div class="col-sm-6">
                                    <p class="tit">@lang('app.account_status')</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="det">{{ $user->status ? trans('app.active') : trans('app.disable') }}</p>
                                </div>
                                <!--aboutE-->
                                <div class="col-sm-6">
                                    <p class="tit">الحالة الاقتصادية</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="det">مفعل</p>
                                </div>
                                <!--aboutD-->
                                <div class="col-sm-6">
                                    <p class="tit">حالة الدعم والوصول</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="det">مفعل</p>
                                </div>
                            </div>
                        </div>
                        <!--Startpassword-->
                        <div class="tab-pane" role="tabpanel" id="password">
                            {!! Form::open(['route' => ['frontend.profile.store'], 'files' => false]) !!}
                            <div class="row">
                                <input type="password" name="oldPassword" class="form-control" placeholder="كلمة المرور الحالية">
                                <input id="newPassword" type="password" name="password" class="form-control" placeholder="كلمة المرور الجديدة">
                                <input name="password_confirmation" id="confirm_password" type="password" class="form-control" placeholder="تأكيد كلمة المرور الجديدة">
                                <span id='message'></span>
                                <div class="b-left w-100">
                                    <button class="btn btn-show" type="submit">تأكيد التعديل</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <!--Startaddress-->
                        <div class="tab-pane" role="tabpanel" id="address">
                            <div class="row">
                                <!--name-->
                                <div class="col-12 green-bg">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="tit">@lang('app.name')</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p>{{ $user->name }}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--address-->
                                <div class="col-12 ">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="tit">@lang('app.address')</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="det">{{ $user->address }}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--Mobaile-->
                                <div class="col-12 green-bg">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="tit">رقم الجوال</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="det ub-font">{{ $user->phone_number }}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--Code-->
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="tit">كود البريد</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="det ub-font">{{ $user->postcode }}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--acount-->
                                <div class="col-12 green-bg">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="tit">حالة الحساب</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="det">{{ $user->status }}</p>
                                        </div>
                                    </div>
                                </div>
{{--                                <div class="b-left w-100 mt-3">--}}
{{--                                    <button class="btn btn-show" type="submit" data-toggle="modal" data-target="#addaddress"> إضافة عنوان جديد</button>--}}
{{--                                    <!-- ModaladdBalance -->--}}
{{--                                    <div class="modal fade" id="addaddress" tabindex="-1" role="dialog" aria-labelledby="addPriceLabel" aria-hidden="true">--}}
{{--                                        <div class="modal-dialog" role="document">--}}
{{--                                            <div class="modal-content blue-color">--}}
{{--                                                <div class="modal-box upZindex">--}}
{{--                                                    <button type="button" class="close float-left" data-dismiss="modal" aria-label="Close">--}}
{{--                                                        <span aria-hidden="true"><i class="fas fa-times"></i></span>--}}
{{--                                                    </button>--}}
{{--                                                    <div class="modal-header text-center mx-auto">--}}
{{--                                                        <div class="modal-title  blue-color">--}}
{{--                                                            <h4 id="addPriceLabel">اضافة عنوان جديد</h4>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="modal-body">--}}
{{--                                                        <form>--}}
{{--                                                            <div class="form-group my-3">--}}
{{--                                                                <h6>العنوان</h6>--}}
{{--                                                                <input type="email" class="form-control" placeholder="العنوان">--}}
{{--                                                            </div>--}}
{{--                                                            <div class="form-group my-3">--}}
{{--                                                                <h6>رقم الجوال</h6>--}}
{{--                                                                <input type="text" class="form-control" placeholder="رقم الجوال">--}}
{{--                                                            </div>--}}
{{--                                                            <div class="form-group my-3">--}}
{{--                                                                <h6>كود البريد</h6>--}}
{{--                                                                <input type="text" class="form-control" placeholder="كود البريد">--}}
{{--                                                            </div>--}}
{{--                                                            <div class="form-group my-3">--}}
{{--                                                                <h6>حالة الحساب</h6>--}}
{{--                                                                <input type="text" class="form-control" placeholder="حالة الحساب">--}}
{{--                                                            </div>--}}
{{--                                                        </form>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="modal-footer">--}}
{{--                                                        <button class="btn btn-show">إضافة العنوان</button>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                        <!--Startidactive-->
                        <div class="tab-pane" role="tabpanel" id="idactive">
                        </div>
                        <!--Startupdatefile-->
                        <div class="tab-pane" role="tabpanel" id="updateProfile">
                            {!! Form::open(['route' => ['frontend.profile.store'], 'files' => false]) !!}
                            <div class="row">
                                <input type="text" name="first_name" class="form-control" value="{{ old('first_name') ?? $user->first_name  }}" placeholder="@lang('app.first_name')">
                                <input type="text" name="last_name" class="form-control" value="{{ old('last_name') ?? $user->last_name  }}" placeholder="@lang('app.last_name')">
                                <input type="text" name="username" class="form-control" value="{{ old('username') ?? $user->username  }}" placeholder="@lang('app.username')">
                                <input type="text" name="email" class="form-control" value="{{ old('email') ?? $user->email  }}" placeholder="@lang('app.email')">
                                <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number') ?? $user->phone_number  }}" placeholder="@lang('app.phone_number')">
                                <input type="text" name="address" class="form-control" value="{{ old('address') ?? $user->address  }}" placeholder="@lang('app.address')">
                                <span id='message'></span>
                                <div class="b-left w-100">
                                    <button class="btn btn-show" type="submit">تأكيد التعديل</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div><!--tab-content-->
                </div>
            </div>
        </div>
    </section>
@endsection

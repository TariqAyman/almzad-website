@extends('frontend.layouts.app')

@section('content')
    <section class="user-acount">
        <div class="container">
            <div class="sort-product">
                <div class="row user-box">
                    <div class="col-md-4">
                        <div class="user-pic">
                            <label for="file-5"> <img id="imgshow" src="img/user-pic.png" class="img-fluid"> </label>
                        </div>
                    </div>
                    <div class="col-md-4 det-name">
                        <h4>محمد حسبو</h4>
                        <p class="email ub-font">Auction@gmail.com</p>
                    </div>
                    <div class="col-md-4">
                        <div class="upload-pic">
                            <input type="file" name="file-5[]" id="file-5" class="inputfile inputfile-1 form-control" data-multiple-caption="{count} files selected" multiple accept="image/*">
                            <label for="file-5" class="btn btn-show">تعديل الصورة</label>
                        </div>
                    </div>
                </div></div>
            <div class="row mt-3">
                <div class="col-md-3">
                    <div class="tab-title">
                        <ul class="nav nav-tabs nav-detail">
                            <li ><a href="#info" class="tabs__trigger active" role="tab" data-toggle="tab"> معلومات شخصية </a>
                            </li>
                            <li><a href="#password" class="tabs__trigger" role="tab" data-toggle="tab">
                                    تغيير كلمة المرور</a>
                            </li>
                            <li><a href="#address" class="tabs__trigger" role="tab" data-toggle="tab">
                                    عناويني</a>
                            </li>
                            <li><a href="#idactive" class="tabs__trigger" role="tab" data-toggle="tab">
                                    تفعيل الهوية</a>
                            </li>
                            <li><a href="#updatefile" class="tabs__trigger" role="tab" data-toggle="tab">
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
                                    <p class="tit">الاسم</p>
                                </div>
                                <div class="col-sm-6">
                                    <p>محمد حسبو</p>
                                </div>
                                <!--taype-->
                                <div class="col-sm-6">
                                    <p class="tit">نوع المستخدم</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="det">بائع</p>
                                </div>
                                <!--email-->
                                <div class="col-sm-6">
                                    <p class="tit">البريد الالكتروني</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="det ub-font">Auction@gmail.com</p>
                                </div>
                                <!--username-->
                                <div class="col-sm-6">
                                    <p class="tit">اسم المستخدم</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="det ub-font">Hasabou93</p>
                                </div>
                                <!--address-->
                                <div class="col-sm-6">
                                    <p class="tit">العنوان</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="det">القاهرة - مصر</p>
                                </div>
                                <!--acount-->
                                <div class="col-sm-6">
                                    <p class="tit">حالة الحساب</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="det">مفعل</p>
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
                            <div class="row">
                                <input type="text" type="text" class="form-control" placeholder="كلمة المرور الحالية">
                                <input id="passwor" type="password" class="form-control" placeholder="كلمة المرور الجديدة" >
                                <input name="confirm_password" id="confirm_password" type="password" class="form-control" placeholder="تأكيد كلمة المرور الجديدة"><span id='message'></span>
                                <div class="b-left w-100">
                                    <button class="btn btn-show" type ="submit">تأكيد التعديل</button></div>
                            </div>
                        </div>
                        <!--Startaddress-->
                        <div class="tab-pane" role="tabpanel" id="address">
                            <div class="row">
                                <!--name-->
                                <div class="col-12 green-bg">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="tit">الاسم</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p>محمد حسبو</p>
                                        </div>
                                    </div>
                                </div>
                                <!--address-->
                                <div class="col-12 ">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="tit">العنوان</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="det">القاهرة - مصر</p>
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
                                            <p class="det ub-font">0966 553637736737</p>
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
                                            <p class="det ub-font">1324</p>
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
                                            <p class="det">مفعل</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="b-left w-100 mt-3">
                                    <button class="btn btn-show" type="submit" data-toggle="modal" data-target="#addaddress"> إضافة عنوان جديد</button>
                                    <!-- ModaladdBalance -->
                                    <div class="modal fade" id="addaddress" tabindex="-1" role="dialog" aria-labelledby="addPriceLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content blue-color">
                                                <div class="modal-box upZindex">
                                                    <button type="button" class="close float-left" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true" ><i class="fas fa-times"></i></span>
                                                    </button>
                                                    <div class="modal-header text-center mx-auto">
                                                        <div class="modal-title  blue-color">
                                                            <h4 id="addPriceLabel">اضافة عنوان جديد</h4>
                                                        </div>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form>
                                                            <div class="form-group my-3">
                                                                <h6>العنوان</h6>
                                                                <input type="email" class="form-control" placeholder="العنوان">
                                                            </div>
                                                            <div class="form-group my-3">
                                                                <h6>رقم الجوال</h6>
                                                                <input type="text" class="form-control" placeholder="رقم الجوال">
                                                            </div>
                                                            <div class="form-group my-3">
                                                                <h6>كود البريد</h6>
                                                                <input type="text" class="form-control" placeholder="كود البريد">
                                                            </div>
                                                            <div class="form-group my-3">
                                                                <h6>حالة الحساب</h6>
                                                                <input type="text" class="form-control" placeholder="حالة الحساب">
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-show">إضافة العنوان </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Startidactive-->
                        <div class="tab-pane" role="tabpanel" id="idactive">
                        </div>
                        <!--Startupdatefile-->
                        <div class="tab-pane" role="tabpanel" id="updatefile">
                        </div>
                    </div><!--tab-content-->
                </div>
            </div>
        </div>
    </section>
@endsection

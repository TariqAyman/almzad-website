@extends('frontend.layouts.app')

@section('content')
    <div class="page-header">
        <div class="container">
            <h2>كل المزادات</h2>
            <div class="tit"><i class="fas fa-home"></i><a href="index.html">الرئيسية</a> /  <span>البائع</span>/  <span>المزادات</span>/  <span>إضافة مزاد</span></div>
        </div>
    </div>
    <div class="container mt-5 store-pro">
        <div class="add-det aboutme">
            <p class="det-name px-md-2">إضافة مزاد</p>
        </div>
    </div>
    <!--StartAddMzad-->
    <section class="add-mzad">
        <div class="container">
            <!--mainContent-->
            <h4>المحتوى الأساسي</h4>
            <div class="bord">
                <select class="form-control">
                    <option value="01">اختر نوع العملة</option>
                    <option value="02">النوع-1</option>
                    <option value="03">النوع-2</option>
                </select>
                <select class="form-control">
                    <option value="01">اختر نوع المزاد</option>
                    <option value="02">النوع-1</option>
                    <option value="03">النوع-2</option>
                    <option value="02">النوع-1</option>
                    <option value="03">النوع-2</option>
                </select>
                <select class="form-control">
                    <option value="01">اختر القسم</option>
                    <option value="02">القسم-1</option>
                    <option value="03">القسم-2</option>
                    <option value="02">القسم-1</option>
                    <option value="03">القسم-2</option>
                </select>
            </div>
            <!--AboutMzad-->
            <h4>عن المزاد</h4>
            <div class="bord">
                <input type="text" name="address" class="form-control" placeholder="العنوان" data-bv-field="address">
                <input type="text" name="price" class="form-control" placeholder="سعر بداية المزاد" data-bv-field="price">
                <div class="date-box">
                    <div class="date-a flex-fill ml-lg-2">
                        <label class="text-d">تاريح البداية</label>
                        <input  type="date" class="form-control">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div class="date-a flex-fill">
                        <label class="text-d">تاريح النهاية</label>
                        <input type="date" class="form-control" >
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                </div><!--dateBox-->
                <!--descripe-->
                <textarea class="form-control" rows="7" id="comment" placeholder="وصف المزاد"></textarea>
                <div class="d-flex flex-upload">
                    <div class="upload-pic">
                        <input type="file" name="file-5[]" id="file-5" class="inputfile inputfile-1 form-control" data-multiple-caption="{count} files selected" multiple accept="image/*">
                        <label for="file-5"> <img id="imgshow" src="img/add-pic.png" class="img-fluid"> </label>
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
                        <input id='files' type="file"  class="inputfile inputfile-1" multiple accept="image/*">
                        <label for="files"> <button class="btn btn-show">أضف الصورة التالية</button> </label>
                        <div  id='result'></div>
                    </div>
                </div>
            </div><!--bord-->
            <h4>معلومات اضافية</h4>
            <div class="bord">
                <div class="charge-box">
                    <p>هل متاح الشحن؟</p>
                    <div class="d-flex">
                        <label class="charge-txt">نعم
                            <input type="radio" checked="checked" name="radio1">
                            <span class="checkmark"></span>
                        </label>
                        <label class="charge-txt">لا
                            <input type="radio" name="radio1">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
                <div class="charge-box mt-2">
                    <p>نوع الشحن؟</p>
                    <div class="d-flex">
                        <label class="charge-txt">مجاني
                            <input type="radio" checked="checked" name="radio">
                            <span class="checkmark"></span>
                        </label>
                        <label class="charge-txt">مدفوع
                            <input type="radio" name="radio">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
                <div class="charge-box mt-2">
                    <textarea class="form-control" rows="7" id="comment" placeholder="وصف الشحن"></textarea>
                </div>
            </div>
            <div class="bord my-3">
                <div class="charge-box">
                    <p>متعدد المزادات</p>
                    <div>
                        <button class="btn btn-show">مسموع به</button>
                        <button class="btn btn-dis">ملغي</button>
                    </div>
                </div>
            </div>
            <div><button class="btn btn-add w-100">اضافة المزاد</button></div>
        </div>
    </section>
@endsection

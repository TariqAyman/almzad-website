@extends('frontend.layouts.app')

@section('content')
    <div class="page-header">
        <div class="container">
            <h2>كل المزادات</h2>
            <div class="tit"><i class="fas fa-home"></i><a href="index.html">الرئيسية</a> /  <span>متجري</span></div>
        </div>
    </div>
    <!--aboutme-->
    <section>
        <div class="container mt-5 store-pro">
            <div class="add-det aboutme">
                <p class="det-name px-md-2">محمد حسبو</p>
                <div class="update-store">
                    <a class="dept-name" href="addstroe.html">إضافة متجر</a>
                    <a class="dept-name" href="editstroe.html">تعديل المتجر</a>
                    <a class="dept-name" href="#">شاهد الكل</a>
                </div>
            </div>
            <div class="my-detaile mt-2">
                <div class="row w-100">
                    <div class="col-md-4">
                        <div class="my-pic">
                            <img class="img-fluid" src="img/my-pic.png">
                        </div>
                    </div>
                    <div class="my-contact col-md-8">
                        <p class="store-n mb-3">اسم المتجر هنا</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="pub-mzad mt-3">
                                    <i class="fas fa-phone pub-pic"></i>
                                    <div class="pub-body">
                                        <h6>رقم الجوال</h6>
                                        <p>0096 553637736 </p>
                                    </div>
                                </div>
                                <div class="pub-mzad mt-3">
                                    <i class="fas fa-envelope-open pub-pic"></i>
                                    <div class="pub-body">
                                        <h6>البريد الالكتروني</h6>
                                        <p class="ub-font">Auction@gmail.com</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="pub-mzad mt-3">
                                    <i class="far fa-newspaper pub-pic"></i>
                                    <div class="pub-body">
                                        <h6>رقم الهوية</h6>
                                        <p class="ub-font">0096 553637736</p>
                                    </div>
                                </div>
                                <div class="pub-mzad mt-3">
                                    <i class="fas fa-bolt pub-pic"></i>
                                    <div class="pub-body">
                                        <h6>الحالة</h6>
                                        <p class="ub-font">Ative</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--EndAboutme-->
    <section class="my-product">
        <div class="container">
            <div class="sort-product">
                <div class="row">
                    <!--sort-01-->
                    <div class="col-md d-flex px-0 mt-2">
                        <select class="form-control ">
                            <option value="01">النوع</option>
                            <option value="02">النوع-1</option>
                            <option value="03">النوع-2</option>
                        </select>
                        <select class="form-control  ">
                            <option value="01">القسم</option>
                            <option value="02">القسم-1</option>
                            <option value="03">القسم-2</option>
                        </select>
                        <a href="#" class="valid"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    <!--sort-02-->
                    <!--sort-03-->
                    <div class="col-md  d-flex px-0 mt-2 serch-w">
                        <select class="form-control">
                            <option value="01">الأقسام</option>
                            <option value="02">الأقسام-1</option>
                            <option value="03">الأقسام-2</option>
                        </select>
                        <select class="form-control">
                            <option value="01">مشابه لـ</option>
                            <option value="02">القسم-1</option>
                            <option value="03">القسم-2</option>
                        </select>
                        <input type="text" value="" class="form-control" placeholder="البحث">
                        <a href="#" class="valid"><i class="fas fa-search"></i></a>
                        <a href="#" class="valid"><i class="fas fa-filter"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <!--product-01-->
            <div class="new-mzad bord my-3">
                <div class="row new-box">
                    <div class="col-lg-3 col-md-4">
                        <figure>
                            <a href="#">
                                <img class="img-fluid" alt="مزاد خيري" src="img/new-mzad-01.png">
                            </a>
                            <p class="top-offer">أعلى عرض</p>
                        </figure>
                    </div>
                    <div class="new-box col-lg-6 col-md-4">
                        <h3>مائدة متطورة</h3>
                        <div class="dept-name mb-3">اسم القسم</div>
                        <p class="my-start">يبدأ من <span><span class="ub-font">25</span> ريال</span></p>
                        <div class="dept-end">منتهى</div>
                    </div><!--new-box-->
                    <div class="col-lg-3 col-md-4">
                        <div class="add-det offer-start mb-3">
                            <p>يبدأ في</p>
                            <div class="d-flex">
                                <p class="offer-st">12</p>
                                <p class="offer-e">JAN <br>2020</p>
                            </div>
                        </div>
                        <div class="add-det offer-start">
                            <p>ينتهي في</p>
                            <div class="d-flex">
                                <p class="offer-s">25</p>
                                <p class="offer-e">JAN <br>2020</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--product-02-->
            <div class="new-mzad bord my-3">
                <div class="row new-box">
                    <div class="col-lg-3 col-md-4">
                        <figure>
                            <a href="#">
                                <img class="img-fluid" alt="مزاد خيري" src="img/new-mzad-02.png">
                            </a>
                            <p class="top-offer">أعلى عرض</p>
                        </figure>
                    </div>
                    <div class="new-box col-lg-6 col-md-4">
                        <h3>مائدة متطورة</h3>
                        <div class="dept-name mb-3">اسم القسم</div>
                        <p class="my-start">يبدأ من <span><span class="ub-font">25</span> ريال</span></p>
                        <div class="valid">جاري</div>
                    </div><!--new-box-->
                    <div class="col-lg-3 col-md-4">
                        <div class="add-det offer-start mb-3">
                            <p>يبدأ في</p>
                            <div class="d-flex">
                                <p class="offer-st">12</p>
                                <p class="offer-e">JAN <br>2020</p>
                            </div>
                        </div>
                        <div class="add-det offer-start">
                            <p>ينتهي في</p>
                            <div class="d-flex">
                                <p class="offer-s"><span class="ub-font">25</span></p>
                                <p class="offer-e">JAN <br>2020</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--product-03-->
            <div class="new-mzad bord my-3">
                <div class="row new-box">
                    <div class="col-lg-3 col-md-4">
                        <figure>
                            <a href="#">
                                <img class="img-fluid" alt="مزاد خيري" src="img/new-mzad-01.png">
                            </a>
                            <p class="top-offer">أعلى عرض</p>
                        </figure>
                    </div>
                    <div class="new-box col-lg-6 col-md-4">
                        <h3>مائدة متطورة</h3>
                        <div class="dept-name mb-3">اسم القسم</div>
                        <p class="my-start">يبدأ من <span><span class="ub-font">25</span> ريال</span></p>
                        <div class="dept-end">منتهى</div>
                    </div><!--new-box-->
                    <div class="col-lg-3 col-md-4">
                        <div class="add-det offer-start mb-3">
                            <p>يبدأ في</p>
                            <div class="d-flex">
                                <p class="offer-st">12</p>
                                <p class="offer-e">JAN <br>2020</p>
                            </div>
                        </div>
                        <div class="add-det offer-start">
                            <p>ينتهي في</p>
                            <div class="d-flex">
                                <p class="offer-s">25</p>
                                <p class="offer-e">JAN <br>2020</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--product-04-->
            <div class="new-mzad bord my-3">
                <div class="row new-box">
                    <div class="col-lg-3 col-md-4">
                        <figure>
                            <a href="#">
                                <img class="img-fluid" alt="مزاد خيري" src="img/new-mzad-04.png">
                            </a>
                            <p class="top-offer">أعلى عرض</p>
                        </figure>
                    </div>
                    <div class="new-box col-lg-6 col-md-4">
                        <h3>مائدة متطورة</h3>
                        <div class="dept-name mb-3">اسم القسم</div>
                        <p class="my-start">يبدأ من <span><span class="ub-font">25</span> ريال</span></p>
                        <div class="valid">جاري</div>
                    </div><!--new-box-->
                    <div class="col-lg-3 col-md-4">
                        <div class="add-det offer-start mb-3">
                            <p>يبدأ في</p>
                            <div class="d-flex">
                                <p class="offer-st">12</p>
                                <p class="offer-e">JAN <br>2020</p>
                            </div>
                        </div>
                        <div class="add-det offer-start">
                            <p>ينتهي في</p>
                            <div class="d-flex">
                                <p class="offer-s">25</p>
                                <p class="offer-e">JAN <br>2020</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--StartPaganition-->
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    .....
                    <li class="page-item"><a class="page-link" href="#">20</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>

    <!--End-Header-->
    <div class="page-header">
        <div class="container">
            <h2>كل المزادات</h2>
            <div class="tit"><i class="fas fa-home"></i><a href="index.html">الرئيسية</a> /  <a href="userstore.html">متجري</a>/   <span>تعديل متجر</span></div>
        </div>
    </div>
    <div class="container mt-5 store-pro">
        <div class="add-det aboutme">
            <p class="det-name px-md-2">تعديل  متجر</p>
        </div>
    </div>
    <!--StartAddMzad-->
    <section class="add-mzad">
        <div class="container">
            <!--mainContent-->
            <h4>المحتوى الأساسي</h4>
            <div class="bord">
                <input type="text"  class="form-control" placeholder="اسم المتجر" required>
                <input type="text" class="form-control" placeholder="رقم الموبايل" required>
                <input type="text" class="form-control" placeholder="البريد الالكتروني" required>
                <!--descripe-->
                <textarea class="form-control" rows="7" id="comment" placeholder="وصف للمتجر"></textarea>
                <div class="d-flex flex-upload">
                    <div class="upload-pic">
                        <input type="file" name="file-5[]" id="file-5" class="inputfile inputfile-1 form-control" data-multiple-caption="{count} files selected" multiple accept="image/*">
                        <label for="file-5"> <img id="imgshow" src="img/add-pic.png" class="img-fluid"> </label>
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
            <div><button class="btn btn-add w-100">اضافة المتجر</button></div>
        </div>
    </section>

    <div class="page-header">
        <div class="container">
            <h2>كل المزادات</h2>
            <div class="tit"><i class="fas fa-home"></i><a href="index.html">الرئيسية</a> /  <a href="userstore.html">متجري</a>/   <span>إضافة متجر</span></div>
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
            <div class="bord">
                <input type="text"  class="form-control" placeholder="اسم المتجر" required>
                <input type="text" class="form-control" placeholder="رقم الموبايل" required>
                <input type="text" class="form-control" placeholder="البريد الالكتروني" required>
                <!--descripe-->
                <textarea class="form-control" rows="7" id="comment" placeholder="وصف للمتجر"></textarea>
                <div class="d-flex flex-upload">
                    <div class="upload-pic">
                        <input type="file" name="file-5[]" id="file-5" class="inputfile inputfile-1 form-control" data-multiple-caption="{count} files selected" multiple accept="image/*">
                        <label for="file-5"> <img id="imgshow" src="img/add-pic.png" class="img-fluid"> </label>
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
            <div><button class="btn btn-add w-100">اضافة المتجر</button></div>
        </div>
    </section>
@endsection

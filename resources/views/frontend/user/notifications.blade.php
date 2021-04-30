@extends('frontend.layouts.app')

@section('content')
    <div class="page-header">
        <div class="container">
            <h2>حسابي</h2>
            <div class="tit"><i class="fas fa-home"></i><a href="index.html">الرئيسية</a> / <span>الإشعارات</span></div>
        </div>
    </div>
    <div class="container all-product">
        <div class="sort-product">
            <div class="row">
                <!--sort-01-->
                <div class="col-lg-4 d-flex px-0 mt-2">
                    <select class="form-control">
                        <option value="01">النوع</option>
                        <option value="02">النوع-1</option>
                        <option value="03">النوع-2</option>
                    </select>
                    <select class="form-control">
                        <option value="01">القسم</option>
                        <option value="02">القسم-1</option>
                        <option value="03">القسم-2</option>
                    </select>
                    <a href="#" class="valid"><i class="fas fa-arrow-left"></i></a>
                </div>
                <!--sort-02-->
                <div class="col-lg-4 d-flex px-0 mt-2">
                    <div class="date-f">
                        <input type="date" class="form-control" value="1990-02-01">
                    </div>
                    <div class="date-f">
                        <input type="date" class="form-control" value="1990-02-01">
                    </div>
                    <a href="#" class="valid"><i class="fas fa-arrow-left"></i></a>
                </div>
                <!--sort-03-->
                <div class="col-lg-4  d-flex px-0 mt-2 serch-w">
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
                    <a href="#" class="valid ml-1"><i class="fas fa-search"></i></a>
                </div>
            </div>
        </div>
    </div>
    <section class="message">
        <div class="container">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">الرسالة</th>
                        <th scope="col">التاريخ</th>
                        <th scope="col">الحالة</th>
                        <th scope="col">الفعل</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>محتوي الاشعار هنا محتوي الاشعار هنا محتوي الاشعار هنا محتوي الاشعار هنا</td>
                        <td class="ub-font">2021/3/23</td>
                        <td>غير مقروءة</td>
                        <td>
                            <div class="dropdown show">
                                <a class="btn dropdown-toggle valid" href="#" role="button" id="setting" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-cog"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="setting">
                                    <a class="dropdown-item" href="#">1</a>
                                    <a class="dropdown-item" href="#">2 </a>
                                    <a class="dropdown-item" href="#">3</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>محتوي الاشعار هنا محتوي الاشعار هنا محتوي الاشعار هنا محتوي الاشعار هنا</td>
                        <td class="ub-font">2021/3/23</td>
                        <td>غير مقروءة</td>
                        <td>
                            <div class="dropdown show">
                                <a class="btn dropdown-toggle valid" href="#" role="button" id="setting" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-cog"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="setting">
                                    <a class="dropdown-item" href="#">1</a>
                                    <a class="dropdown-item" href="#">2 </a>
                                    <a class="dropdown-item" href="#">3</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>محتوي الاشعار هنا محتوي الاشعار هنا محتوي الاشعار هنا محتوي الاشعار هنا</td>
                        <td class="ub-font">2021/3/23</td>
                        <td>غير مقروءة</td>
                        <td>
                            <div class="dropdown show">
                                <a class="btn dropdown-toggle valid" href="#" role="button" id="setting" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-cog"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="setting">
                                    <a class="dropdown-item" href="#">1</a>
                                    <a class="dropdown-item" href="#">2 </a>
                                    <a class="dropdown-item" href="#">3</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!--StartPaganition-->
        <div class="container">
            <nav aria-label="Page navigation">
                <ul class="pagination ub-font">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link active" href="#">1</a></li>
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
@endsection

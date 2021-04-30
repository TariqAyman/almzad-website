@extends('frontend.layouts.app')

@section('content')

    <div class="page-header">
        <div class="container">
            <h2>حسابي</h2>
            <div class="tit"><i class="fas fa-home"></i><a href="index.html">الرئيسية</a> / <span>المحفظة</span></div>
        </div>
    </div>
    <div class="container all-product">
        <div class="sort-product">
            <div class="row">
                <!--sort-01-->
                <div class="col-lg-6 d-flex px-0 mt-2">
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
                <div class="col-lg-6  d-flex px-0 mt-2 serch-w">
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
                    <a href="#" class="valid "><i class="fas fa-filter"></i></a>
                </div>
            </div>
        </div>
    </div>
    <section class="wellet">
        <div class="container">
            <div class="table-responsive">
                <table class="table table-striped table-bordered tab-wall">
                    <thead>
                    <tr>
                        <th scope="col">العملة</th>
                        <th scope="col">تحت التنفيذ</th>
                        <th scope="col">رصيد معلق</th>
                        <th scope="col">الرصيد المتاح</th>
                        <th scope="col">الفعل</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>USD</td>
                        <td>0.00</td>
                        <td>0.00</td>
                        <td class="vaild-r">0.00</td>
                        <td><a href="#" class="valid ml-1"><i class="fas fa-cog"></i></a></td>
                    </tr>
                    <tr>
                        <td>USD</td>
                        <td>0.00</td>
                        <td>0.00</td>
                        <td class="vaild-r">0.00</td>
                        <td><a href="#" class="valid ml-1"><i class="fas fa-cog"></i></a></td>
                    </tr>
                    <tr>
                        <td>SAR</td>
                        <td>0.00</td>
                        <td>0.00</td>
                        <td class="vaild-r">0.00</td>
                        <td><a href="#" class="valid ml-1"><i class="fas fa-cog"></i></a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

@extends('frontend.layouts.app')

@section('content')

    <div class="page-header">
        <div class="container">
            <h2>حسابي</h2>
            <div class="tit"><i class="fas fa-home"></i><a href="{{ url('/') }}">الرئيسية</a> / <span>المحفظة</span></div>
        </div>
    </div>
    <section class="wellet">
        <div class="container">
            <div class="add-det aboutme">
                <p class="det-name px-md-2">{{ auth('user')->user()->name }}</p>
                <div class="update-store">
                    <a class="dept-name" data-toggle="modal" data-target="#addBalance">اضافة رصيد</a>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-striped table-bordered tab-wall">
                    <thead>
                    <tr>
                        <th scope="col">التاريخ</th>
                        <th scope="col">ايداع</th>
                        <th scope="col">سحب</th>
                        <th scope="col">رصيد معلق</th>
                        <th scope="col">الرصيد المتاح</th>
                        <th scope="col">ملاحظه</th>
                    </tr>
                    </thead>
                    @foreach($wallets as $wallet)
                        <tr>
                            <td>{{ $wallet->created_at->format('Y/m/d H:s a') }}</td>
                            <td>{{ $wallet->in }}</td>
                            <td>{{ $wallet->out }}</td>
                            <td>{{ $wallet->hold }}</td>
                            <td>{{ $wallet->balance }}</td>
                            @if($wallet->auction_id)
                                <td><a href="{{ route('frontend.auctions.show',$wallet->auction_id) }}">{{ $wallet->note }}</a></td>
                            @else
                                <td>{{ $wallet->note }}</td>
                            @endif


                            {{--                            <td><a href="#" class="valid ml-1"><i class="fas fa-cog"></i></a></td>--}}
                        </tr>
                    @endforeach
                    <tbody>
                    </tbody>
                </table>
            </div>
            {{ $wallets->links('frontend.layouts.paginator') }}
        </div>
    </section>

    <div class="modal fade" id="addBalance" tabindex="-1" role="dialog" aria-labelledby="addPriceLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content blue-color">
                <div class="modal-box upZindex">
                    <button type="button" class="close float-left" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <div class="modal-header text-center mx-auto">
                        <div class="modal-title  blue-color">
                            <h4 id="addPriceLabel">اضافة رصيد</h4>
                        </div>
                    </div>
                    {!! Form::open(['route' => 'frontend.payment.store', 'id' => 'payment-form']) !!}
                    <div class="modal-body">
                        <div class="form-group my-3">
                            <h6>إختر طريقة الإضافة</h6>
                            <select class="form-control">
                                <option value="visa">VISA</option>
                            </select>
                        </div>
                        <div class="form-group my-3">
                            <h6>البريد الالكتروني</h6>
                            <input type="email" name="email" value="{{ auth('user')->user()->email }}" class="form-control" placeholder="البريد الالكتروني" autocomplete="false">
                        </div>
                        <div class="form-group my-3">
                            <h6>الكمية</h6>
                            <input type="number" class="form-control" placeholder="مثال : ١٢٣٤ ريال" name="amount" autocomplete="false">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-show" data-toggle="modal" type="submit">إضافة رصيد</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    {{--    <div class="modal fade" id="addBalance2" tabindex="-1" role="dialog" aria-labelledby="addPriceLabel" aria-hidden="true">--}}
    {{--        <div class="modal-dialog" role="document">--}}
    {{--            <div class="modal-content blue-color">--}}
    {{--                <div class="modal-box upZindex">--}}
    {{--                    <button type="button" class="close float-left" data-dismiss="modal" aria-label="Close">--}}
    {{--                        <span aria-hidden="true"><i class="fas fa-times"></i></span>--}}
    {{--                    </button>--}}
    {{--                    <div class="modal-header text-center mx-auto">--}}
    {{--                        <div class="modal-title  blue-color">--}}
    {{--                            <h4 id="addPriceLabel">اضافة رصيد</h4>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="modal-body">--}}
    {{--                        <form>--}}
    {{--                            <div class="form-group my-3">--}}
    {{--                                <h6>رقم الكرت</h6>--}}
    {{--                                <input type="text" class="form-control" placeholder="رقم الكرت">--}}
    {{--                            </div>--}}
    {{--                            <div class="form-group my-3">--}}
    {{--                                <h6>الاسم المدون على الكرت</h6>--}}
    {{--                                <input type="text" class="form-control" placeholder="الاسم المدون على الكرت">--}}
    {{--                            </div>--}}
    {{--                            <div class="form-group my-3 date-box">--}}
    {{--                                <div>--}}
    {{--                                    <h6>تاريح الانتهاء</h6>--}}
    {{--                                    <div class="date-a flex-fill ml-lg-2">--}}
    {{--                                        <input type="date" class="form-control">--}}
    {{--                                        <i class="fas fa-calendar-alt"></i>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                                <div class="date-a flex-fill">--}}
    {{--                                    <p class="ub-font">CVV</p>--}}
    {{--                                    <input type="text" class="form-control" placeholder="أرقام توجد خلف الكرت">--}}
    {{--                                </div>--}}
    {{--                            </div><!--dateBox-->--}}
    {{--                        </form>--}}
    {{--                    </div>--}}
    {{--                    <div class="modal-footer">--}}
    {{--                        <button class="btn btn-show">إضافة رصيد</button>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
@endsection

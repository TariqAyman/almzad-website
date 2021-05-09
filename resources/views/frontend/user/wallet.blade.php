@extends('frontend.layouts.app')

@section('content')

    <div class="page-header">
        <div class="container">
            <h2>حسابي</h2>
            <div class="tit"><i class="fas fa-home"></i><a href="{{ url('/') }}">الرئيسية</a> / <span>المحفظة</span></div>
        </div>
    </div>
    <section class="message">
        <div class="container">
            <div class="add-det aboutme">
                <p class="det-name px-md-2">{{ auth('user')->user()->name }}</p>
                <p class="det-name px-md-2"> الرصيد المتاح: {{ auth('user')->user()->actual_balance }}</p>

                <div class="update-store">
                    <a class="dept-name" data-toggle="modal" data-target="#addBalance">اضافة رصيد</a>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-striped table-bordered tab-wall">
                    <thead>
                    <tr>
                        <th scope="col">ملاحظه</th>
                        <th scope="col">التاريخ</th>
                        <th scope="col">ايداع</th>
                        <th scope="col">سحب</th>
                        <th scope="col">رصيد معلق</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($wallets as $wallet)
                        <tr>
                            @if($wallet->auction_id)
                                <td><a href="{{ route('frontend.auctions.show',$wallet->auction_id) }}">{{ $wallet->note }}</a></td>
                            @else
                                <td>{{ $wallet->note }}</td>
                            @endif
                            <td class="ub-font">{{ $wallet->created_at->format('Y/m/d H:s a') }}</td>
                            <td>{{ $wallet->in }}</td>
                            <td>{{ $wallet->out }}</td>
                            <td>{{ $wallet->hold }}</td>
                            {{--                            <td><a href="#" class="valid ml-1"><i class="fas fa-cog"></i></a></td>--}}
                        </tr>
                    @endforeach
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

    @if(!empty(session('url')))
        <iframe class="iframe" id="iframe"></iframe>
    @endif
@endsection

@section('page-script')
    @if(!empty(session('url')))
        <script>
            if (window.parent.document.getElementById("iframe") != null) {
                var division = document.createElement("div");
                division.setAttribute("id", "payframe");
                division.setAttribute("style", "min-height: 100%; position: fixed; top: 0px; left: 0px; width: 100%; height: 100%; background: rgba(0, 0, 0, 0); padding-right: 0px; padding-left: 0px;padding-top: 0px;");
                division.innerHTML = '<div style="position: absolute;right: 0px;top: 0px;cursor: pointer;font-size: 24px;opacity: .6;width: 100%;text-align: cen-ter;line-height: 0px;z-index: 1;" class="close" id="F" onclick="javascript: win-dow.parent.document.getElementById(\'iframe\').parentNode.removeChild(window.parent.document.getElementById(\'iframe\'));window.parent.document.getElementById(\'payframe\').parentNode.removeChild(window.parent.document.getElementById(\'payframe\'));">x</div><iframe id="iframe" style="opacity: 7; height: 100%; position: relative; background: none; display: block; border: 0px none transparent; margin-left: 0%; padding: 0px; z-index: 2; width: 100%; margin-top: 0%" allowtransparency="true" frameborder="0" allowpaymentrequest="true" src="{{ session('url') }}"></iframe>';
                document.body.appendChild(division);
            } else {
                var division = document.createElement("div");
                division.setAttribute("id", "payframe");
                division.setAttribute("style", "min-height: 100%; transition: all 0.3s ease-out 0s; position: fixed; top: 0px; left: 0px; width: 100%; height: 100%; back-ground: rgba(0, 0, 0, 0.4); padding-right: 10px; padding-left: 250px;padding-top: 0px;");
                division.innerHTML = '<div style="position: absolute;right: 0px;top: 0px;cursor: pointer;font-size: 24px;opacity: .6;width: 24px;text-align: cen-ter;line-height: 0px;z-index: 1;" class="close" id="F" onclick="javascript: win-dow.parent.document.getElementById(\'iframe\').parentNode.removeChild(window.parent.document.getElementById(\'iframe\'));window.parent.document.getElementById(\'payframe\').parentNode.removeChild(window.parent.document.getElementById(\'payframe\'));">x</div><iframe id="iframe" style="opacity: 7; height: 100%; position: relative; background: none; display: block; border: 0px none transparent; margin-left: 7%; padding: 0px; z-index: 2; width: 65%; margin-top: 0%" allowtransparency="true" frameborder="0" allowpaymentrequest="true" src="{{ session('url') }}"></iframe>';
                document.body.appendChild(division);
            }
            else
            {
                response.sendRedirect(pipe.getWebAddress());
            }
        </script>
    @endif
@endsection

@extends('frontend.layouts.app')

@section('page-title' , trans('app.wallets'))


@section('content')

    <div class="page-header">
        <div class="container">
            <h2>@lang('app.my account')</h2>
            <div class="tit"><i class="fas fa-home"></i>
                <a href="{{ url('/') }}">@lang('app.home')</a>
                / <span>@lang('app.wallet')</span>
            </div>
        </div>
    </div>
    <section class="message">
        <div class="container">
            <div class="add-det aboutme">
                <p class="det-name px-md-2">{{ auth('user')->user()->name }}</p>
                <p class="det-name px-md-2"> @lang('app.Available balance:') {{ auth('user')->user()->actual_balance }}</p>

                <div class="update-store">
                    <a class="dept-name" data-toggle="modal" data-target="#addBalance">@lang('app.Add credit')</a>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-striped table-bordered tab-wall">
                    <thead>
                    <tr>
                        <th scope="col">@lang('app.Note')</th>
                        <th scope="col">@lang('app.dates')</th>
                        <th scope="col">@lang('app.in_wallet')</th>
                        <th scope="col">@lang('app.out')</th>
                        <th scope="col">@lang('app.hold')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($wallets as $wallet)
                        <tr>
                            @if($wallet->auction_id)
                                <td><a href="{{ route('frontend.auctions.show',$wallet->auction->slug) }}">{{ $wallet->note }}</a></td>
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
                            <h4 id="addPriceLabel">@lang('app.Add credit')</h4>
                        </div>
                    </div>
                    {!! Form::open(['route' => 'frontend.payment.store', 'id' => 'payment-form']) !!}
                    <div class="modal-body">
                        <div class="form-group my-3">
                            <h6>@lang('app.Choose a payment method')</h6>
                            <select class="form-control">
                                <option value="visa">VISA</option>
                            </select>
                        </div>
                        <div class="form-group my-3">
                            <h6>@lang('app.email')</h6>
                            <input type="email" name="email" value="{{ auth('user')->user()->email }}" class="form-control" placeholder="@lang('app.email')" autocomplete="false" required>
                        </div>
                        <div class="form-group my-3">
                            <h6>الكمية</h6>
                            <input type="number" id="amount" class="form-control" placeholder="@lang('app.Example: 1234 riyals')" name="amount" autocomplete="false" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-show" data-toggle="modal" type="submit">@lang('app.Add credit')</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    @if(session()->has('payUrl'))
        <div id="divPayFrame"></div>
    @endif
@endsection

@section('page-script')
    <script>
        @if(request()->has('credit'))
        $('#addBalance').modal('show');
        $('#amount').val({{ ceil(request()->get('credit')) }});
        @endif
    </script>
    @if(session()->has('payUrl'))
        <script>
            if (window.parent.document.getElementById("divPayFrame") != null) {
                var division = document.createElement("div");
                division.setAttribute("id", "divPayFrame");
                division.setAttribute("style", "min-height: 100%; position: fixed; top: 0px; left: 0px; width: 100%; height: 100%; background: rgba(0, 0, 0, 0); padding-right: 0px; padding-left: 0px;padding-top: 0px;");
                division.innerHTML = '<div style="position: absolute;right: 0px;top: 0px;cursor: pointer;font-size: 24px;opacity: .6;width: 100%;text-align: cen-ter;line-height: 0px;z-index: 1;" class="close" id="F" onclick="javascript: win-dow.parent.document.getElementById(\'divPayFrame\').parentNode.removeChild(window.parent.document.getElementById(\'divPayFrame\'));window.parent.document.getElementById(\'divPayFrame\').parentNode.removeChild(window.parent.document.getElementById(\'divPayFrame\'));">x</div><iframe id="payframe" style="opacity: 7; height: 100%; position: relative; background: none; display: block; border: 0px none transparent; margin-left: 0%; padding: 0px; z-index: 2; width: 100%; margin-top: 0%" allowtransparency="true" frameborder="0" allowpaymentrequest="true" src="{{ session()->get('payUrl') }}"></iframe>';
                document.body.appendChild(division);
            } else {
                var division = document.createElement("div");
                division.setAttribute("id", "divPayFrame");
                division.setAttribute("style", "min-height: 100%; transition: all 0.3s ease-out 0s; position: fixed; top: 0px; left: 0px; width: 100%; height: 100%; back-ground: rgba(0, 0, 0, 0.4); padding-right: 10px; padding-left: 250px;padding-top: 0px;");
                division.innerHTML = '<div style="position: absolute;right: 0px;top: 0px;cursor: pointer;font-size: 24px;opacity: .6;width: 24px;text-align: cen-ter;line-height: 0px;z-index: 1;" class="close" id="F" onclick="javascript: win-dow.parent.document.getElementById(\'divPayFrame\').parentNode.removeChild(window.parent.document.getElementById(\'divPayFrame\'));window.parent.document.getElementById(\'divPayFrame\').parentNode.removeChild(window.parent.document.getElementById(\'divPayFrame\'));">x</div><iframe id="payframe" style="opacity: 7; height: 100%; position: relative; background: none; display: block; border: 0px none transparent; margin-left: 7%; padding: 0px; z-index: 2; width: 65%; margin-top: 0%" allowtransparency="true" frameborder="0" allowpaymentrequest="true" src="{{ session()->get('payUrl') }}"></iframe>';
                document.body.appendChild(division);
            }

            function iframeURLChange(iframe, callback) {
                var lastDispatched = null;

                var dispatchChange = function () {
                    var newHref = iframe.contentWindow.location.href;

                    if (newHref !== lastDispatched) {
                        callback(newHref);
                        lastDispatched = newHref;
                    }
                };

                var unloadHandler = function () {
                    // Timeout needed because the URL changes immediately after
                    // the `unload` event is dispatched.
                    setTimeout(dispatchChange, 0);
                };

                function attachUnload() {
                    // Remove the unloadHandler in case it was already attached.
                    // Otherwise, there will be two handlers, which is unnecessary.
                    iframe.contentWindow.removeEventListener("unload", unloadHandler);
                    iframe.contentWindow.addEventListener("unload", unloadHandler);
                }

                iframe.addEventListener("load", function () {
                    attachUnload();

                    // Just in case the change wasn't dispatched during the unload event...
                    dispatchChange();
                });

                attachUnload();
            }

            // Usage:
            iframeURLChange(document.getElementById("payframe"), function (newURL) {
                console.log("URL changed:", newURL);
                window.location.href = '{{ route('frontend.wallet.index',['paymentId' => session()->get('paymentId')]) }}'
            });
        </script>
    @endif
@endsection

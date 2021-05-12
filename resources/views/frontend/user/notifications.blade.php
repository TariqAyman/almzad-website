@extends('frontend.layouts.app')

@section('page-title' , trans('app.notification'))

@section('content')
    <div class="page-header">
        <div class="container">
            <h2>حسابي</h2>
            <div class="tit"><i class="fas fa-home"></i><a href="index.html">الرئيسية</a> / <span>الإشعارات</span></div>
        </div>
    </div>
    <div class="container all-product">
        {{--        <div class="sort-product">--}}
        {{--            <div class="row">--}}
        {{--                <!--sort-01-->--}}
        {{--                <div class="col-lg-4 d-flex px-0 mt-2">--}}
        {{--                    <select class="form-control">--}}
        {{--                        <option value="01">النوع</option>--}}
        {{--                        <option value="02">النوع-1</option>--}}
        {{--                        <option value="03">النوع-2</option>--}}
        {{--                    </select>--}}
        {{--                    <select class="form-control">--}}
        {{--                        <option value="01">القسم</option>--}}
        {{--                        <option value="02">القسم-1</option>--}}
        {{--                        <option value="03">القسم-2</option>--}}
        {{--                    </select>--}}
        {{--                    <a href="#" class="valid"><i class="fas fa-arrow-left"></i></a>--}}
        {{--                </div>--}}
        {{--                <!--sort-02-->--}}
        {{--                <div class="col-lg-4 d-flex px-0 mt-2">--}}
        {{--                    <div class="date-f">--}}
        {{--                        <input type="date" class="form-control" value="1990-02-01">--}}
        {{--                    </div>--}}
        {{--                    <div class="date-f">--}}
        {{--                        <input type="date" class="form-control" value="1990-02-01">--}}
        {{--                    </div>--}}
        {{--                    <a href="#" class="valid"><i class="fas fa-arrow-left"></i></a>--}}
        {{--                </div>--}}
        {{--                <!--sort-03-->--}}
        {{--                <div class="col-lg-4  d-flex px-0 mt-2 serch-w">--}}
        {{--                    <select class="form-control">--}}
        {{--                        <option value="01">الأقسام</option>--}}
        {{--                        <option value="02">الأقسام-1</option>--}}
        {{--                        <option value="03">الأقسام-2</option>--}}
        {{--                    </select>--}}
        {{--                    <select class="form-control">--}}
        {{--                        <option value="01">مشابه لـ</option>--}}
        {{--                        <option value="02">القسم-1</option>--}}
        {{--                        <option value="03">القسم-2</option>--}}
        {{--                    </select>--}}
        {{--                    <input type="text" value="" class="form-control" placeholder="البحث">--}}
        {{--                    <a href="#" class="valid ml-1"><i class="fas fa-search"></i></a>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
    </div>
    <section class="message">
        <div class="container">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">@lang('app.message')</th>
                        <th scope="col">@lang('app.date')</th>
                        <th scope="col">@lang('app.status')</th>
                        <th scope="col">الفعل</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($notifications as $notification)
                        <tr>
                            <td>{{ $notification->note }}<a href="{{ $notification->url }}"> (@lang('app.link'))</a></td>
                            <td class="ub-font">{{ $notification->created_at->format('Y/m/d H:s a') }}</td>
                            <td>{{ $notification->status }}</td>
                            <td>
                                @if(!$notification->read_at)
                                    <a href="#" role="button" data-id="{{ $notification->id }}" id="mark-as-read">
                                        <i class="fas fa-check"></i> @lang('app.markAsRead')
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--StartPaganition-->
        <div class="container">
            {{ $notificationsPaginate->links('frontend.layouts.paginator') }}
        </div>
    </section>
@endsection

@section('page-script')
    <script>
        function sendMarkRequest(id = null) {
            return $.ajax("{{ route('frontend.notifications.markAsRead') }}", {
                method: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    id
                }
            });
        }

        $(function () {
            $('#mark-as-read').click(function () {
                let request = sendMarkRequest($(this).data('id'));
                request.done(() => {
                    window.location.href = '{{ route('frontend.notifications.index') }}';
                });
            });
        });
    </script>
@endsection

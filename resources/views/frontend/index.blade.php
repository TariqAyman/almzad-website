@extends('frontend.layouts.app')

@section('content')
    <!--StartMzadhaed-->
    <section class="mzadhead slider">
        <div id="mzadslider" class="carousel container" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach($sliders as $key => $slider)
                    <li data-target="#mzadslider" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : ''}}"><span></span></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach($sliders as $key => $slider)
                    <div class="carousel-item {{ $key == 0 ? 'active' : ''}}">
                        <div class="mzadbox">
                            <h1 class="animate__animated animate__fadeInDown del-1"><span>{{ $slider->title }} </span></h1>
                            <h2 class="animate__animated animate__fadeInDown del-2">{{ $slider->sub_title }}</h2>
                            <p class="animate__animated animate__fadeInDown del-4">
                                {{ $slider->description }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--EndMzadhaed-->
    <!--StartnewMzad-->
    <section class="new-product">
        <div class="container">
            <div class="bigtit">
                <div class="tit-box">
                    <img class="img-fluid" src="{{ asset('frontend/img/newmzad.png') }}" alt="">
                    <h5>@lang('app.latest_auctions')</h5>
                </div>
                <button class="btn btn-show" onclick="window.location.href='{{ route('frontend.auctions.index') }}'">@lang('app.see_all')</button>
            </div>
            <div class="row">
                @foreach($latest_auctions as $auction)
                    @include('frontend.auction',['auction' => $auction])
                @endforeach
            </div>
        </div>
    </section>
    <!--EndnewMzad-->
    <!--StartHowWork-->
    <section class="how-work">
        <div class="container">
            <div class="bigtit">
                <div class="tit-box">
                    <img class="img-fluid" src="{{ asset('frontend/img/howwork.png') }}">
                    <h5>كيف يعمل</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 work-box">
                    <img class="img-fluid" src="{{ asset('frontend/img/how-01.png') }}" alt="سجل مزاد خيري">
                    <h4>سجل معانا</h4>
                    <p>تعريف بسيط هنا تعريف بسيط هنا تعريف بسيط هنا تعريف بسيط هنا تعريف بسيط</p>
                </div>
                <div class="col-md-3 work-box">
                    <img class="img-fluid" src="{{ asset('frontend/img/how-02.png') }}" alt="اشتري او زايد">
                    <h4>اشتري او زايد</h4>
                    <p>تعريف بسيط هنا تعريف بسيط هنا تعريف بسيط هنا تعريف بسيط هنا تعريف بسيط</p>
                </div>
                <div class="col-md-3 work-box">
                    <img class="img-fluid" src="{{ asset('frontend/img/how-03.png') }}" alt="قدم مزايده">
                    <h4>قدم مزايده</h4>
                    <p>تعريف بسيط هنا تعريف بسيط هنا تعريف بسيط هنا تعريف بسيط هنا تعريف بسيط</p>
                </div>
                <div class="col-md-3 work-box">
                    <img class="img-fluid" src="{{ asset('frontend/img/how-04.png') }}" alt="اربح المزاد">
                    <h4>اربح المزاد</h4>
                    <p>تعريف بسيط هنا تعريف بسيط هنا تعريف بسيط هنا تعريف بسيط هنا تعريف بسيط</p>
                </div>
            </div>
        </div>
    </section>
    <!--EndHowWork-->
    <!--StartnewMzad-->
    <section class="new-product">
        <div class="container">
            <div class="bigtit">
                <div class="tit-box">
                    <img class="img-fluid" src="{{ asset('frontend/img/newmzad.png') }}">
                    <h5>@lang('app.public auctions')</h5>
                </div>
                <button class="btn btn-show" onclick="window.location.href='{{ route('frontend.auctions.index') }}'">@lang('app.see_all')</button>
            </div>
            <div class="row">
                @foreach($auctions as $auction)
                    @include('frontend.auction',['auction' => $auction])
                @endforeach
            </div><!--row-->
        </div><!--container-->
    </section>
    <!--EndnewMzad-->
    <br>
    <!--StartClint-->
    {{--    <section class="clints">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row">--}}
    {{--                <div class="bigtit">--}}
    {{--                    <div class="tit-box">--}}
    {{--                        <img class="img-fluid" src="{{ asset('frontend/img/clinticon.png') }}" alt="@lang('app.customer_review')">--}}
    {{--                        <h5>@lang('app.customer_review')</h5>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <!--clint-01-->--}}
    {{--                <div class="owl-clints owl-carousel">--}}
    {{--                    @foreach($reviews as $review)--}}
    {{--                        <div class="item">--}}
    {{--                            <div class="clint-box">--}}
    {{--                                <i class="fas fa-quote-right"></i>--}}
    {{--                                <p>--}}
    {{--                                    {{ $review->note }}--}}
    {{--                                </p>--}}
    {{--                            </div>--}}
    {{--                            <div class="clint-name">--}}
    {{--                                <div><img class="img-fluid" src="{{ $review->user->profile_photo }}" alt="{{ $review->user->profile_photo }}"></div>--}}
    {{--                                <div class="pub-body">--}}
    {{--                                    <h6>{{ $review->user->name }}</h6>--}}
    {{--                                    <p>مصمم جرافيك </p>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    @endforeach--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
@endsection

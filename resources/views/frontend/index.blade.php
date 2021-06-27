@extends('frontend.layouts.app')

@section('page-title' , trans('app.home'))


@section('content')
    <!--StartMzadhaed-->
    <section class="mzadhead slider">
        <div id="mzadslider" class="carousel container" data-ride="carousel">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach($sliders as $key => $slider)
                        <li data-target="#mzadslider" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : ''}}"><span></span></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach($sliders as $key => $slider)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img style="background-size: cover; height: 540px; display: flex; align-items: center; justify-content: center;" src="{{ asset($slider->image) }}" alt="{{ $slider->title }}">
                            <div class="carousel-caption d-none d-md-block">
                                <h1 class="animate__animated animate__fadeInDown del-1"><span>{{ $slider->title }} </span></h1>
                                <h2 class="animate__animated animate__fadeInDown del-2">{{ $slider->sub_title }}</h2>
                                <p class="animate__animated animate__fadeInDown del-4">
                                    {{ $slider->description }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">@lang('app.previous')</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">@lang('app.next')</span>
                </a>
            </div>

            {{-- <ol class="carousel-indicators">
                 @foreach($sliders as $key => $slider)
                     <li data-target="#mzadslider" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : ''}}"><span></span></li>
                 @endforeach
             </ol>
             <div class="carousel-inner">
                 @foreach($sliders as $key => $slider)
                     <div class="carousel-item {{ $key == 0 ? 'active' : ''}}">
                         <div class="mzadbox" style="background: '{{ asset($slider->image) }}'">
                             <img class="d-block w-100" src="{{ asset($slider->image) }}" alt="First slide">
                             <h1 class="animate__animated animate__fadeInDown del-1"><span>{{ $slider->title }} </span></h1>
                             <h2 class="animate__animated animate__fadeInDown del-2">{{ $slider->sub_title }}</h2>
                             <p class="animate__animated animate__fadeInDown del-4">
                                 {{ $slider->description }}
                             </p>
                         </div>
                     </div>
                 @endforeach
             </div>--}}
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
                    <h5>@lang('app.How it works')</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 work-box">
                    <img class="img-fluid" src="{{ asset('frontend/img/how-01.png') }}" alt="@lang('app.Register with us')">
                    <h4>@lang('app.Register with us')</h4>
                    <p>@lang('app.A simple definition here a simple definition here a simple definition here a simple definition here a simple definition')</p>
                </div>
                <div class="col-md-3 work-box">
                    <img class="img-fluid" src="{{ asset('frontend/img/how-02.png') }}" alt="@lang('app.Buy or Bid')">
                    <h4>@lang('app.Buy or Bid')</h4>
                    <p>@lang('app.A simple definition here a simple definition here a simple definition here a simple definition here a simple definition')</p>
                </div>
                <div class="col-md-3 work-box">
                    <img class="img-fluid" src="{{ asset('frontend/img/how-03.png') }}" alt="@lang('app.Submit his bid')">
                    <h4>@lang('app.Submit his bid')</h4>
                    <p>@lang('app.A simple definition here a simple definition here a simple definition here a simple definition here a simple definition')</p>
                </div>
                <div class="col-md-3 work-box">
                    <img class="img-fluid" src="{{ asset('frontend/img/how-04.png') }}" alt="@lang('app.Win the auction')">
                    <h4>@lang('app.Win the auction')</h4>
                    <p>@lang('app.A simple definition here a simple definition here a simple definition here a simple definition here a simple definition')</p>
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

@section('page-script')
    <script>
        $('.carousel').carousel({
            loop: true,
            margin: 10,
            interval: 2000
        })
    </script>
@endsection

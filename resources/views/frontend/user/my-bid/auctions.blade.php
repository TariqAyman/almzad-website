@extends('frontend.layouts.app')

@section('page-title' , trans('app.my-bid') )


@section('content')
    <!--End-Header-->
    <div class="page-header">
        <div class="container">
            <h2>مزاداتي</h2>
            <div class="tit"><i class="fas fa-home"></i><a href="{{ url('/') }}">@lang('app.home')</a> / <span>@lang('app.auctions')</span></div>
        </div>
    </div>
    <!--StartnewMzad-->
    <section class="all-product">
        <div class="container">
            <div class="sort-product">
            </div>
            <div class="row">
                @foreach($auctions as $auction)
                    @include('frontend.user.my-bid.auction',['auction' => $auction])
                @endforeach
            </div>
        </div>
    </section>
    <!--EndnewMzad-->
    <!--StartPaganition-->
    <div class="container">
        {{ $auctions->links('frontend.layouts.paginator') }}
    </div>
@endsection

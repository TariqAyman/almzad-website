@extends('frontend.layouts.app')

@section('content')
    <!--End-Header-->
    <div class="page-header">
        <div class="container">
            <h2>كل المزادات</h2>
            <div class="tit"><i class="fas fa-home"></i><a href="{{ url('/') }}">@lang('app.home')</a> / <span>@lang('app.auctions')</span></div>
        </div>
    </div>
    <!--StartnewMzad-->
    <section class="all-product">
        <div class="container">
            <div class="sort-product">
                <div class="row">
                    <!--sort-01-->
                    <div class="col-lg-4 d-flex px-0 mt-2">
                        <select name="type" class="form-control">
                            @foreach($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>

                        <select name="category" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <a href="#" class="valid"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    <!--sort-02-->
                    <div class="col-lg-4 d-flex px-0 mt-2">
                        <div class="date-f">
                            <input type="date" class="form-control" placeholder="اتاريخ الوثيقة" value="1990-02-01">
                        </div>
                        <div class="date-f">
                            <input type="date" class="form-control" placeholder="اتاريخ الوثيقة" value="1990-02-01">
                        </div>
                        <a href="#" class="valid"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    <!--sort-03-->
                    <div class="col-lg-4  d-flex px-0 mt-2 serch-w">
                        <select name="type" class="form-control">
                            @foreach($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>

                        <select name="category" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <input type="text" value="" class="form-control" placeholder="البحث">
                        <a href="#" class="valid ml-1"><i class="fas fa-search"></i></a>
                        <a href="#" class="valid"><i class="fas fa-filter"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($auctions as $auction)
                    @include('frontend.auction',['auction' => $auction])
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

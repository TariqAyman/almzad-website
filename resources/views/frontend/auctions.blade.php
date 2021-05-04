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
                {!! Form::open(['route' => 'frontend.auctions.index','method' => 'GET', 'files' => false, 'id' => 'search-form']) !!}
                <div class="row">
                    <div class="col-lg-4 d-flex px-0 mt-2">
                        <select name="type" class="form-control">
                            <option value="">اختار النوع</option>
                            @foreach($types as $type)
                                <option value="{{ $type->id }}" {{ (( old('type') ?? request()->type ) == $type->id ) ? 'selected' : '' }}>{{ $type->name }}</option>
                            @endforeach
                        </select>
                        <select name="category" class="form-control">
                            <option value="">اختار القسم</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ (( old('category') ?? request()->category ) == $category->id ) ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <a href="#" class="valid"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    <div class="col-lg-4 d-flex px-0 mt-2">
                        <div class="date-f">
                            <input type="date" class="form-control" name="start_date" placeholder="اتاريخ الوثيقة" value="{{ old('name') ?? request()->start_date ?? date('Y-m-d') }}">
                        </div>
                        <div class="date-f">
                            <input type="date" class="form-control" name="end_date" placeholder="اتاريخ الوثيقة" value="{{ old('name') ?? request()->end_date ?? date('Y-m-d') }}">
                        </div>
                        <a href="#" class="valid"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    <div class="col-lg-4  d-flex px-0 mt-2 serch-w">
                        <input type="text" value="{{ old('name') ?? request()->name }}" class="form-control" placeholder="البحث">
                        <a href="#" class="valid ml-1" onclick="document.getElementById('search-form').submit()"><i class="fas fa-search"></i></a>
                    </div>
                </div>
                {!! Form::close() !!}
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

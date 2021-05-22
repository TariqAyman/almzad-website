@extends('frontend.layouts.app')

@section('page-title' , trans('app.auctions'))

@section('content')
    <div class="page-header">
        <div class="container">
            <h2>كل المزادات</h2>
            <div class="tit"><i class="fas fa-home"></i>
                <a href="{{ url('/') }}">@lang('app.home')</a>
                / <span>@lang('app.my_store')</span>
            </div>
        </div>
    </div>
    <!--aboutme-->
    <section>
        <div class="container mt-5 store-pro">
            <div class="add-det aboutme">
                <p class="det-name px-md-2">{{ auth('user')->user()->name }}</p>
                <div class="update-store">
                    {{--                    @if(auth()->user()->store)--}}
                    {{--                        <a class="dept-name" href="{{ route('frontend.user.store.edit') }}">تعديل المتجر</a>--}}
                    {{--                    @else--}}
                    {{--                        <a class="dept-name" href="{{ route('frontend.user.store.edit') }}">إضافة متجر</a>--}}
                    {{--                    @endif--}}
                    <a class="dept-name" href="{{ route('frontend.user.auctions.create') }}">@lang('app.add_auction')</a>
                </div>
            </div>
            <div class="my-detaile mt-2">
                {{--                <div class="row w-100">--}}
                {{--                    <div class="col-md-4">--}}
                {{--                        <div class="my-pic">--}}
                {{--                            <img class="img-fluid" src="{{ asset('frontend/img/my-pic.png') }}">--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    @if($store)--}}
                {{--                        <div class="my-contact col-md-8">--}}
                {{--                            <p class="store-n mb-3">{{ $store->name }}</p>--}}
                {{--                            <div class="row">--}}
                {{--                                <div class="col-md-6">--}}
                {{--                                    <div class="pub-mzad mt-3">--}}
                {{--                                        <i class="fas fa-phone pub-pic"></i>--}}
                {{--                                        <div class="pub-body">--}}
                {{--                                            <h6>رقم الجوال</h6>--}}
                {{--                                            <p>{{ $store->phone_number }}</p>--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="pub-mzad mt-3">--}}
                {{--                                        <i class="fas fa-envelope-open pub-pic"></i>--}}
                {{--                                        <div class="pub-body">--}}
                {{--                                            <h6>البريد الالكتروني</h6>--}}
                {{--                                            <p class="ub-font">{{ $store->email }}</p>--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                                <div class="col-md-6">--}}
                {{--                                    <div class="pub-mzad mt-3">--}}
                {{--                                        <i class="far fa-newspaper pub-pic"></i>--}}
                {{--                                        <div class="pub-body">--}}
                {{--                                            <h6>رقم الهوية</h6>--}}
                {{--                                            <p class="ub-font">{{ $store->identity }}</p>--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="pub-mzad mt-3">--}}
                {{--                                        <i class="fas fa-bolt pub-pic"></i>--}}
                {{--                                        <div class="pub-body">--}}
                {{--                                            <h6>الحالة</h6>--}}
                {{--                                            <p class="ub-font">{{ $store->status }}</p>--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}

                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    @endif--}}
                {{--                </div>--}}
            </div>
        </div>
    </section>

    <section class="all-product">
        <div class="container">
            <div class="sort-product">
                {!! Form::open(['route' => 'frontend.auctions.index','method' => 'GET', 'files' => false, 'id' => 'search-form']) !!}
                <div class="row">
                    <div class="col-lg-4 d-flex px-0 mt-2">
                        <select name="type" class="form-control">
                            <option value="">@lang('app.Chose to type')</option>
                            @foreach($types as $type)
                                <option value="{{ $type->id }}" {{ (( old('type') ?? request()->type ) == $type->id ) ? 'selected' : '' }}>{{ $type->name }}</option>
                            @endforeach
                        </select>
                        <select name="category" class="form-control">
                            <option value="">@lang('app.Choose a section')</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ (( old('category') ?? request()->category ) == $category->id ) ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <a href="#" class="valid"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    <div class="col-lg-5 d-flex px-0 mt-2">
                        <div class="date-f">
                            <input type="date" class="form-control" name="start_date" placeholder="@lang('app.start_date')" value="{{ old('name') ?? request()->start_date ?? date('Y-m-d') }}">
                        </div>
                        <div class="date-f">
                            <input type="date" class="form-control" name="end_date" placeholder="@lang('app.end_date')" value="{{ old('name') ?? request()->end_date ?? date('Y-m-d') }}">
                        </div>
                        <a href="#" class="valid"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    <div class="col-lg-3  d-flex px-0 mt-2 serch-w">
                        <input type="text" value="{{ old('name') ?? request()->name }}" class="form-control" placeholder="@lang('app.search')">
                        <a href="#" class="valid ml-1" onclick="document.getElementById('search-form').submit()"><i class="fas fa-search"></i></a>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
    <section class="my-product">
        <div class="container">
            @foreach($auctions as $auction)
                <div class="new-mzad bord my-3">
                    <div class="row new-box">
                        <div class="col-lg-3 col-md-4">
                            <figure>
                                <a href="{{ route('frontend.user.auctions.edit',$auction->id) }}">
                                    <img class="img-fluid" alt="{{ $auction->name }}" src="{{ !empty($auction->image->image) ? asset($auction->image->image) : asset('frontend/img/new-mzad-01.png') }}">
                                </a>
                                <p class="top-offer">{{ $auction->highest_price }}</p>
                            </figure>
                        </div>
                        <div class="new-box col-lg-6 col-md-4">
                            <a href="{{ route('frontend.user.auctions.edit',$auction->id) }}"><h3>{{ $auction->name }}</h3></a>
                            <div class="dept-name mb-3">{{ $auction->category->name }}</div>
                            <p class="my-start">@lang('app.start_from') <span><span class="ub-font">{{ $auction->start_from }}</span> @lang('app.currency')</span></p>
                            @if($auction->isExpired)
                                <p class="dept-end">@lang('app.expired')</p>
                            @else
                                <p class="valid">@lang('app.current')</p>
                            @endif
                        </div>
                        <!--new-box-->
                        <div class="col-lg-3 col-md-4">
                            <div class="add-det offer-start mb-3">
                                <p>يبدأ في</p>
                                <div class="d-flex">
                                    <p class="offer-st">{{ $auction->start_date->format('d') }}</p>
                                    <p class="offer-e">{{ $auction->start_date->format('M') }} <br>{{ $auction->start_date->format('Y') }}</p>
                                </div>
                            </div>
                            <div class="add-det offer-start">
                                <p>ينتهي في</p>
                                <div class="d-flex">
                                    <p class="offer-s">{{ $auction->end_date->format('d') }}</p>
                                    <p class="offer-e">{{ $auction->end_date->format('M') }} <br>{{ $auction->end_date->format('Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <nav aria-label="Page navigation">
                {{ $auctions->links('frontend.layouts.paginator') }}
            </nav>
        </div>
    </section>
@endsection

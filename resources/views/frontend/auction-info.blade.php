@extends('frontend.layouts.app')

@section('content')
    <div class="page-header">
        <div class="container">
            <h2>كل المزادات</h2>
            <div class="tit"><i class="fas fa-home"></i><a href="{{ url('/') }}">الرئيسية</a> / <span>المزادات</span> / <span>{{ $auction->name }}</span></div>
        </div>
    </div>
    <!--MzadDetials-->
    <div class="container mt-5">
        <div class="product-details">
            <div class="tab-title">
                <ul class="nav nav-tabs nav-detail">
                    <li><a href="#detail" class="tabs__trigger {{ request()->has('page') ? '' : 'active' }}" role="tab" data-toggle="tab"> تفاصيل المزاد </a>
                    </li>
                    <li><a href="#comment" class="tabs__trigger {{ request()->has('page') ? 'active' : '' }}" role="tab" data-toggle="tab">
                            التعليقات</a>
                    </li>
                    <li><a href="#date" class="tabs__trigger" role="tab" data-toggle="tab">
                            تاريخ المزايدة</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <!--StartDetail-->
                <div class="tab-pane {{ request()->has('page') ? '' : 'active' }} " role="tabpanel" id="detail">
                    <div class="detail-name mt-3">
                        <div class="row  ">
                            <div class="col-sm-9">
                                <div class="new-box">
                                    <h3>{{ $auction->name }}</h3>
                                    <div class="user-name">
                                        <i class="fas fa-user"></i>{{ $auction->user->name }}
                                    </div>
                                    <div class="new-name">
                                        <div class="dept-name">{{ $auction->category->name }}</div>
                                        <div class="date-name"><i class="fas fa-clock"></i> {{ $auction->created_at->diffForHumans() }}</div>
                                    </div>
                                </div>
                            </div><!--end detail-name-->
                            <div class="col-sm-3">
                                <p class="start-with">@lang('app.start_from')</p>
                                <p class="start-price"><span class="ub-font">{{ $auction->start_from }}</span> {{ $auction->currency->symbol }}</p>
                                @if($auction->isExpired)
                                    <p class="dept-end">@lang('app.expired')</p>
                                @else
                                    <p class="valid">@lang('app.current')</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row  mt-3">
                        <!-- Countdown-->
                        <div class="col-md-6">
                            @if(!$auction->isExpired)
                                <div class="detail-name ">
                                    <p class="end-in">@lang('app.Ends during')</p>
                                    @include('frontend.countdown',['auction'=>$auction])
                                </div>
                            @endif
                            <div class="detail-name mt-3">
                                <p class="end-in">@lang('app.Bidding')</p>
                                <div class="add-det">
                                    <p class="det-name">@lang('app.Bid type')</p>
                                    <p class="det-type">{{ $auction->type->name }}</p>
                                </div>
                                <div class="add-det">
                                    <p class="det-name">@lang('app.Multiple bidding')</p>
                                    <p class="det-type">{{ $auction->multi_auction ? trans('app.yes') : trans('app.no') }}</p>
                                </div>
                                <div class="add-det">
                                    <p class="det-name">@lang('app.Auction Fees')</p>
                                    <p class="det-type">لا يوجد</p>
                                </div>
                                <div class="add-det">
                                    <p class="det-name">@lang('app.Lowest bid price')</p>
                                    <p class="det-type"><span class="ub-font">{{ $auction->hightest_price }}</span> {{ $auction->currency->symbol }}</p>
                                </div>
                                @auth('user')
                                    <div class="add-det ">
                                        <p class="det-name">@lang('app.available balance')</p>
                                        <p class="det-type"><span class="ub-font">{{ auth('user')->user()->balance }}</span></p>
                                    </div>
                                @endif
                            </div><!--detail-name-->
                            @if(auth('user')->check() && !$auction->isExpired)
                                <div class="detail-name mt-3">
                                    {!! Form::open(['route' => 'frontend.auctions.store', 'id' => 'bid-form']) !!}
                                    {!! Form::hidden('auction_id',$auction->id) !!}
                                    <div class="add-icon">
                                        <p class="det-name det-icon">+</p>
                                        <input type="number" name="price" class="input-num" min="{{ $auction->hightest_price ?? $auction->start_from  }}" value="{{ $auction->hightest_price ?? $auction->start_from  }}">
                                        <p class="det-name det-icon01">-</p>
                                    </div>
                                    <button type="submit" class="btn btn-show w-100 mt-3">@lang('app.Add bid')</button>
                                    {!! Form::close() !!}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="bord">
                                <div class="big-img">
                                    <img class="detailsbigimg w-100" src="{{ !empty($auction->image->image) ? asset($auction->image->image) : asset('frontend/img/new-mzad-01.png') }}" id="expandedImg">
                                </div>
                                <div class="d-flex pic-detail">
                                    @foreach($auction->auctionsImages as $image)
                                        <div class="m-3">
                                            <img src="{{ asset($image->image) }}" height="100" onclick="myFunction(this);" class="img-fluid">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="add-det my-5 px-4">
                                <p class="det-name">@lang('app.Share this auction')</p>
                                <ul class="nav socail-media det-type">
                                    <li class="sub-social">
                                        <a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li class="sub-social">
                                        <a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li class="sub-social">
                                        <a href="#"><i class="fab fa-facebook-square"></i></a></li>
                                    <li class="sub-social">
                                        <a href="#"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-title">
                        <ul class="nav nav-tabs nav-detail">
                            <li>
                                <a href="#describe" class="tabs__trigger active" role="tab" data-toggle="tab"> @lang('app.Auction description') </a>
                            </li>
                            <li>
                                <a href="#lines" class="tabs__trigger" role="tab" data-toggle="tab">@lang('app.conditions')</a>
                            </li>
                        </ul>
                        <div class="tab-content describe">
                            <!--Startdescribe-->
                            <div class="tab-pane active" role="tabpanel" id="describe">
                                <p>
                                    {{ $auction->description }}
                                </p>
                            </div>
                            <div class="tab-pane " role="tabpanel" id="lines">
                                <p>
                                    {{ $auction->conditions }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div><!--End detail-->
                <div class="clear"></div>
                <!--StartComment-->
                <div class="tab-pane mt-4 {{ request()->has('page') ?  'active' : '' }}" role="tabpanel" id="comment">

                    @if(!$comments->count())
                        <div class="bord">
                            <div class="row">
                                <!--noComment-->
                                <h3 class="comment-tit w-100">@lang('app.Comments')</h3>
                                <p class="no-comment">@lang('app.no comments')</p>
                            </div>
                        </div>
                    @else
                        <div class="comment">
                            <!--Comment-->
                            <div class="row">
                                <h3 class="my-4 end-in">@lang('app.Comments')</h3>
                                @foreach($comments as $comment)
                                    <div class="col-12">
                                        <div class="comment-box">
                                            <div class="new-name">
                                                <div class="com-name">
                                                    <i class="fas fa-user"></i>{{ $comment->user->name }}
                                                </div>
                                            </div>
                                            <div class="sort-product">
                                                <p>
                                                    {{ $comment->comment }}
                                                </p>
                                                <p class="float-left pb-3">{{ $comment->created_at->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{ $comments->links('frontend.layouts.paginator') }}
                            </div><!--comment-->
                        </div>
                    @endif

                    @auth('user')
                        <div class="add-comment">
                            {!! Form::open(['route' => 'frontend.user.comment', 'id' => 'review-form']) !!}
                            {!! Form::hidden('auction_id',$auction->id) !!}
                            <div class="row">
                                <h3 class="my-4 end-in">أضف تعليق</h3>
                                <textarea class="form-control" rows="7" id="comment" name="comment" placeholder="اضف تعليق"></textarea>
                                <div class="b-left w-100 my-4">
                                    <button class="btn btn-show" type="submit">إضلفة تعليق</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    @endauth
                </div>
                <div class="tab-pane mt-4" role="tabpanel" id="date">
                    <div class="row">
                        @if(!$auction->auctionsUsers()->count())
                            <p class="date-not">لا يوجد معلومات متاحة</p>
                        @else
                            <table class="table table-striped rounded">
                                <thead>
                                <tr>
                                    <th scope="col">@lang('app.dates')</th>
                                    <th scope="col">@lang('app.price')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($auction->auctionsUsers as $user)
                                    <tr>
                                        <td class="ub-font">{{ $user->created_at->locale(app()->getLocale())->format('Y/m/d H:s') }}</td>
                                        <td><span class="ub-font">{{ $user->price }}</span> {{ $auction->currency->symbol }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{--                            <!--StartPaganition-->--}}
                            {{--                            <div class="container">--}}
                            {{--                                <nav aria-label="Page navigation">--}}
                            {{--                                    <ul class="pagination">--}}
                            {{--                                        <li class="page-item">--}}
                            {{--                                            <a class="page-link" href="#" aria-label="Previous">--}}
                            {{--                                                <span aria-hidden="true">&laquo;</span>--}}
                            {{--                                                <span class="sr-only">Previous</span>--}}
                            {{--                                            </a>--}}
                            {{--                                        </li>--}}
                            {{--                                        <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
                            {{--                                        <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
                            {{--                                        <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
                            {{--                                        .....--}}
                            {{--                                        <li class="page-item"><a class="page-link" href="#">20</a></li>--}}
                            {{--                                        <li class="page-item">--}}
                            {{--                                            <a class="page-link" href="#" aria-label="Next">--}}
                            {{--                                                <span aria-hidden="true">&raquo;</span>--}}
                            {{--                                                <span class="sr-only">Next</span>--}}
                            {{--                                            </a>--}}
                            {{--                                        </li>--}}
                            {{--                                    </ul>--}}
                            {{--                                </nav>--}}
                            {{--                            </div>--}}
                        @endif

                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
@endsection

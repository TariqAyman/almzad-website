
    <div class="col-lg-4 col-md-6 mt-3">
        <div class="new-mzad">
            <figure>
                <a href="{{ route('frontend.auctions.show',$auction->slug) }}">
                    <img class="img-fluid" alt="" src="{{ $auction->image->image ?? asset('frontend/img/new-mzad-01.png') }}">
                </a>
            </figure>
            <p class="top-offer">@lang('app.height_price')</p>
            <div class="new-box">
                <h3>{{ $auction->name }}</h3>
                <div class="new-name">
                    <div class="user-name">
                        <i class="fas fa-user"></i> {{ $auction->user->name }}
                    </div>
                    <div class="dept-name">{{ $auction->category->name }}</div>
                </div>
                @if($auction->is_expired)
                    <div class="dept-end">@lang('app.expired')</div>
                @else
                <!-- Countdown #2 -->
                    <div class="countdown">
                        <div class="bloc-time days" data-init-value="0">
                            <div class="figure days days-1">
                                <span class="top">0</span>
                                <span class="top-back">
                                <span>0</span>
                            </span>
                                <span class="bottom">0</span>
                                <span class="bottom-back">
                                <span>0</span>
                            </span>
                            </div>
                            <div class="figure days days-1">
                                <span class="top">0</span>
                                <span class="top-back">
                                <span>0</span>
                            </span>
                                <span class="bottom">0</span>
                                <span class="bottom-back">
                                <span>0</span>
                            </span>
                            </div>
                            <span class="count-title">الأيام</span>
                        </div>
                        <div class="bloc-time hours" data-init-value="4">
                            <div class="figure hours hours-1">
                                <span class="top">0</span>
                                <span class="top-back">
                                <span>0</span>
                            </span>
                                <span class="bottom">0</span>
                                <span class="bottom-back">
                                <span>0</span>
                            </span>
                            </div>
                            <div class="figure hours hours-2">
                                <span class="top">4</span>
                                <span class="top-back">
                                <span>4</span>
                            </span>
                                <span class="bottom">4</span>
                                <span class="bottom-back">
                                <span>4</span>
                            </span>
                            </div>
                            <span class="count-title">الساعات</span>
                        </div>

                        <div class="bloc-time min" data-init-value="30">
                            <div class="figure min min-1">
                                <span class="top">3</span>
                                <span class="top-back">
                                <span>3</span>
                            </span>
                                <span class="bottom">3</span>
                                <span class="bottom-back">
                                <span>3</span>
                            </span>
                            </div>
                            <div class="figure min min-2">
                                <span class="top">0</span>
                                <span class="top-back">
                                <span>0</span>
                            </span>
                                <span class="bottom">0</span>
                                <span class="bottom-back">
                                <span>0</span>
                            </span>
                            </div>
                            <span class="count-title">الدقائق</span>
                        </div>

                        <div class="bloc-time sec" data-init-value="30">
                            <div class="figure sec sec-1">
                                <span class="top">3</span>
                                <span class="top-back">
                                <span>3</span>
                            </span>
                                <span class="bottom">3</span>
                                <span class="bottom-back">
                                <span>3</span>
                            </span>
                            </div>
                            <div class="figure sec sec-2">
                                <span class="top">0</span>
                                <span class="top-back">
                                <span>0</span>
                            </span>
                                <span class="bottom">0</span>
                                <span class="bottom-back">
                                <span>0</span>
                            </span>
                            </div>
                            <span class="count-title">الثواني</span>
                        </div>
                    </div>
                @endif
            </div><!--new-box-->
            <div class="box-detail">
                <div class="new-det-01 flex-fill"><p class="take">@lang('app.shopping')</p>
                    <p class="price">@lang('app.paid')</p></div>
                <div class="new-det-02 flex-fill"><p class="take">@lang('app.price_start')</p>
                    <p class="price"><span class="ub-font">{{ $auction->start_from }}</span> {{ $auction->currency->name }}</p></div>
                <div class="new-det-03 flex-fill"><p class="take">@lang('app.multiple')</p>
                    <p class="price">@lang('app.yes')</p>
                </div>
            </div>
        </div>
    </div>





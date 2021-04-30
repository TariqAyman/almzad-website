<div class="col-lg-4 col-md-6 mt-3">
    <div class="new-mzad">
        <figure>
            <a href="{{ route('frontend.auctions.show',$auction->slug) }}">
                <img class="img-fluid" alt="" src="{{ $auction->image->image ? asset($auction->image->image) : asset('frontend/img/new-mzad-01.png') }}">
            </a>
        </figure>
        <p class="top-offer">@lang('app.height_price'): {{ $auction->highest_price }}</p>
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
                @include('frontend.countdown',['auction'=>$auction])
            @endif
        </div>
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





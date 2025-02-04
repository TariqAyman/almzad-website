<div class="col-lg-4 col-md-6 mt-3">
    <div class="new-mzad">
        <figure>
            <a href="{{ route('frontend.auctions.show',$auction->slug) }}">
                <img class="img-fluid" alt="{{ $auction->name }}" src="{{ !empty($auction->image->image) ? asset($auction->image->image) : asset('frontend/img/new-mzad-01.png') }}">
            </a>
        </figure>
        <p class="top-offer"><span class="ub-font">{{ $auction->highest_price }}</span> @lang('app.currency')</p>
        <div class="new-box">
            <a href="{{ route('frontend.auctions.show',$auction->slug) }}">
                <h3>{{ $auction->name }}</h3>
            </a>
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
                <p class="price"><span class="ub-font">{{ $auction->start_from }}</span> @lang('app.currency')</p></div>
            <div class="new-det-03 flex-fill"><p class="take">@lang('app.multiple')</p>
                <p class="price">@lang('app.yes')</p>
            </div>
        </div>
    </div>
</div>





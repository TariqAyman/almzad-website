<div class="countdown" style="{{ request()->routeIs('frontend.auctions.show') ? 'padding-left: 170px; padding-right: 170px;' : '' }}">
    <div class="bloc-time days" data-init-value="{{ $auction->expiredIn['days'] }}">
        <div class="figure days days-1">
            <span class="top">{{ $auction->expiredIn['days_split'][1] }}</span>
            <span class="top-back"><span>{{ $auction->expiredIn['days_split'][1] }}</span></span>
            <span class="bottom">{{ $auction->expiredIn['days_split'][1] }}</span>
            <span class="bottom-back"><span>{{ $auction->expiredIn['days_split'][1] }}</span></span>
        </div>
        <div class="figure days days-2">
            <span class="top">{{ $auction->expiredIn['days_split'][1] }}</span>
            <span class="top-back"><span>{{ $auction->expiredIn['days_split'][1] }}</span></span>
            <span class="bottom">{{ $auction->expiredIn['days_split'][1] }}</span>
            <span class="bottom-back"><span>{{ $auction->expiredIn['days_split'][1] }}</span></span>
        </div>
        @if(count($auction->expiredIn['days_split']) === 3)
            <div class="figure days days-3">
                <span class="top">{{ $auction->expiredIn['days_split'][2] }}</span>
                <span class="top-back"><span>{{ $auction->expiredIn['days_split'][2] }}</span></span>
                <span class="bottom">{{ $auction->expiredIn['days_split'][2] }}</span>
                <span class="bottom-back"><span>{{ $auction->expiredIn['days_split'][2] }}</span></span>
            </div>
        @endif
        <span class="count-title">@lang('app.days')</span>
    </div>
    <div class="bloc-time hours" data-init-value="{{ $auction->expiredIn['hours'] }}">
        <div class="figure hours hours-1">
            <span class="top">{{ $auction->expiredIn['hours_split'][0] }}</span>
            <span class="top-back"><span>{{ $auction->expiredIn['hours_split'][0] }}</span></span>
            <span class="bottom">{{ $auction->expiredIn['hours_split'][0] }}</span>
            <span class="bottom-back"><span>{{ $auction->expiredIn['hours_split'][0] }}</span></span>
        </div>
        <div class="figure hours hours-2">
            <span class="top">{{ $auction->expiredIn['hours_split'][1] }}</span>
            <span class="top-back"><span>{{ $auction->expiredIn['hours_split'][1] }}</span></span>
            <span class="bottom">{{ $auction->expiredIn['hours_split'][1] }}</span>
            <span class="bottom-back"><span>{{ $auction->expiredIn['hours_split'][1] }}</span></span>
        </div>
        <span class="count-title">@lang('app.hours')</span>
    </div>
    <div class="bloc-time min" data-init-value="{{ $auction->expiredIn['minutes'] }}">
        <div class="figure min min-1">
            <span class="top">{{ $auction->expiredIn['minutes_split'][0] }}</span>
            <span class="top-back"><span>{{ $auction->expiredIn['minutes_split'][0] }}</span></span>
            <span class="bottom">{{ $auction->expiredIn['minutes_split'][0] }}</span>
            <span class="bottom-back"><span>{{ $auction->expiredIn['minutes_split'][0] }}</span></span>
        </div>
        <div class="figure min min-2">
            <span class="top">{{ $auction->expiredIn['minutes_split'][1] }}</span>
            <span class="top-back"><span>{{ $auction->expiredIn['minutes_split'][1] }}</span></span>
            <span class="bottom">{{ $auction->expiredIn['minutes_split'][1] }}</span>
            <span class="bottom-back"><span>{{ $auction->expiredIn['minutes_split'][1] }}</span></span>
        </div>
        <span class="count-title">@lang('app.minutes')</span>
    </div>
</div>

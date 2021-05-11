<?php

namespace App\Http\View\Composers;

use App\Models\Auction;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\View\View;

class AuctionsComposer
{
    /**
     * Create a new profile composer.
     *
     */
    public function __construct()
    {
    }

    /**
     * Bind data to the view.
     *
     * @param \Illuminate\View\View $view
     * @return void
     */
    public function compose(View $view)
    {
        $auctions = Auction::query()->where('status', 1)->where('end_date', '>=', Carbon::now())->latest()->limit(3)->get();

        $view->with('auctionsLayout', $auctions);
    }
}

<?php

namespace App\Http\View\Composers;

use App\Models\Auction;
use App\Models\Category;
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
        $auctions = Auction::query()->where('status', 1)->latest()->limit(3)->get();

        $view->with('auctionsLayout', $auctions);
    }
}

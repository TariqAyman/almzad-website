<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\Category;
use App\Models\Type;
use Illuminate\Http\Request;

class AuctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $auctions = Auction::paginate(setting('record_per_page'));

        $types = Type::query()->where('status', 1)->get();

        $categories = Category::query()->where('status', 1)->get();

        return view('frontend.auctions', compact('auctions', 'categories', 'types'));
    }
}

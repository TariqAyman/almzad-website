<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BidCreateRequest;
use App\Models\Auction;
use App\Models\AuctionsUser;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Type;
use Carbon\Carbon;
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

    /**
     * Display the specified resource.
     *
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($slug)
    {
        $auction = Auction::where('slug_ar', $slug)->orwhere('slug_en', $slug)->firstOrFail();

        $comments = Comment::query()->where('status', 1)->where('auction_id', $auction->id)->paginate(setting('record_per_page'));

        return view('frontend.auction-info', compact('auction', 'comments'));
    }

    public function store(BidCreateRequest $request)
    {
        $auction = Auction::find($this->auction_id);

        if (!$auction->allowBid) return redirect()->back()->withErrors('Cant bid in this auction');

        AuctionsUser::create([
            'user_id' => auth('user')->user()->id,
            'auction_id' => $request->auction_id,
            'price' => $request->price
        ]);

        return redirect()->back()->withSuccess('Saved Bid For this Auction');
    }
}

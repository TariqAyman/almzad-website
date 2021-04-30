<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Auction;
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
        $auction = Auction::where('slug_ar',$slug)->orwhere('slug_en',$slug)->firstOrFail();

        $comments = Comment::query()->where('status',1)->where('auction_id',$auction->id)->paginate(setting('record_per_page'));

//        dump(str_pad($auction->expiredIn['minutes'], 2, '0', STR_PAD_LEFT));
//        dump(($auction->expired_in['minutes_split']));
//        dd(($auction->expired_in));
//
//        dd(1);
////        dd($auction->expired_in);
//
//        //        dd(strlen($auction->expired_in['minutes']));
        return view('frontend.auction-info',compact('auction','comments'));
    }
}

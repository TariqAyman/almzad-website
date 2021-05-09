<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BidCreateRequest;
use App\Models\Auction;
use App\Models\AuctionsUser;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Type;
use App\Models\Wallet;
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
        $auctions = Auction::query();

        if ($request->has('type')) {
            $auctions = $auctions->where('type_id', $request->type);
        }

        if ($request->has('category')) {
            $auctions = $auctions->where('category_id', $request->category);
        }

        if ($request->has('start_date')) {
            $auctions = $auctions->where('start_date', '>=', $request->start_date);
        }

        if ($request->has('end_date')) {
            $auctions = $auctions->where('end_date', '<=', $request->end_date);
        }

        $auctions = $auctions->where('status', 1)->where('end_date', '>=', Carbon::now())->latest()->paginate(setting('record_per_page'));

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
        $auction = Auction::find($request->auction_id);

        $highest_price = $auction->highest_price ?? $auction->start_from;

        if ($highest_price >= $request->price) return redirect()->back()->withErrors(trans('app.It is not possible to bid for less than', ['value' => $highest_price]));

        $hold_balance_wallet = setting('hold_balance_wallet', 20);

        $hold_balance_wallet = ($request->price * $hold_balance_wallet) / 100;

        if ($hold_balance_wallet >= auth('user')->user()->actual_balance) return redirect()->back()->withErrors('لا تملك رصيد يكفي');

        if ($auction->is_sold) return redirect()->back()->withErrors(trans('app.Auction sold'));

        if (!$auction->allowBid()) return redirect()->back()->withErrors(trans('app.Cant bid in this auction'));

        AuctionsUser::create([
            'user_id' => auth('user')->user()->id,
            'auction_id' => $request->auction_id,
            'price' => $request->price
        ]);

        if ($auction->last_bid) {
            Wallet::query()->where('user_id', $auction->last_bid)->where('type', 'bid')->where('auction_id', $auction->id)->delete();
        }

        Wallet::query()->create([
            'type' => 'bid',
            'auction_id' => $auction->id,
            'user_id' => auth('user')->user()->id,
            'in' => 0,
            'out' => 0,
            'hold' => $hold_balance_wallet,
            'balance' => auth('user')->user()->available_balance - $hold_balance_wallet,
            'note' => "تحصيل 20% من قيمة المزايده للمزاد {$auction->name} لمشاهدة المزارد"
        ]);

        $auction->update([
            'last_bid' => auth('user')->user()->id
        ]);

        return redirect()->back()->withSuccess(trans('app.Saved Bid For this Auction'));
    }

    public function buyNow(Request $request)
    {
        $auction = Auction::find($request->auction_id);

        $highest_price = $auction->highest_price ?? $auction->start_from;

        $purchase_price = ($auction->purchase_price > $highest_price) ? $auction->purchase_price : $highest_price;

        if ($purchase_price >= auth('user')->user()->actual_balance) return redirect()->back()->withErrors('لا تملك رصيد يكفي');

        if ($auction->is_sold) return redirect()->back()->withErrors('تم بيع المزاد');

        if (!$auction->allowBid()) return redirect()->back()->withErrors(trans('app.Cant bid in this auction'));

        $auction->update([
            'is_sold' => true,
            'sale_amount' => $purchase_price
        ]);

        Wallet::query()->create([
            'type' => 'shopping',
            'auction_id' => $auction->id,
            'user_id' => auth('user')->user()->id,
            'in' => 0,
            'out' => $purchase_price,
            'hold' => 0,
            'balance' => auth('user')->user()->available_balance - floatval($purchase_price),
            'note' => "تحصيل مبلغ الشراء للمزاد {$auction->name} لمشاهدة المزارد "
        ]);

        return redirect()->back()->withSuccess(trans('app.The product has been successfully purchased'));
    }
}

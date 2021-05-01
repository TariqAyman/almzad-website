<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\UploadFile;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuctionUserCreateRequest;
use App\Http\Requests\AuctionUserUpdateRequest;
use App\Models\Auction;
use App\Models\AuctionsImage;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AuctionUserController extends Controller
{
    use UploadFile;

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;

        $types = Type::query()->where('status', 1)->get();

        $categories = Category::query()->where('status', 1)->get();

        $currencies = Currency::query()->where('status', 1)->get();

        return view('frontend.user.auction-form', compact('edit', 'categories', 'types', 'currencies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AuctionUserCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuctionUserCreateRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth('user')->user()->id;
        $data['slug_ar'] = Str::slug($request->name_ar, '-', 'ar');
        $data['slug_en'] = Str::slug($request->name_en, '-', 'en');

        $auction = Auction::query()->create($data);

        if ($request->has('images')) {
            foreach ($request->images as $key => $image) {

                if ($image == null) continue;

                if ($image instanceof UploadedFile) {

                    $imageName = $this->uploadFile($request, 'images', 'auctions', $key);

                    AuctionsImage::query()->create([
                        'auction_id' => $auction->id,
                        'image' => $imageName
                    ]);
                }
            }
        }


        return redirect()->route('frontend.user.store')->withSuccess('Successfully Create Auction');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = true;

        $auction = Auction::find($id);

        $types = Type::query()->where('status', 1)->get();

        $categories = Category::query()->where('status', 1)->get();

        $currencies = Currency::query()->where('status', 1)->get();

        return view('frontend.user.auction-form', compact('edit', 'categories', 'types', 'currencies', 'auction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AuctionUserUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AuctionUserUpdateRequest $request, $id)
    {
        Auction::query()->find($id)->update($request->validated());

        return redirect()->route('frontend.user.store')->withSuccess('Successfully Update Auction');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

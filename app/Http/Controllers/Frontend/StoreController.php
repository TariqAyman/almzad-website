<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\UploadFile;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateRequest;
use App\Models\Auction;
use App\Models\Category;
use App\Models\Store;
use App\Models\Type;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    use UploadFile;

    public function myStore(Request $request)
    {
        $store = auth('user')->user()->store;

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

        $auctions = $auctions->where('user_id', auth('user')->user()->id)
            ->where('status', 1)
            ->paginate(setting('record_per_page'));

        $types = Type::query()->where('status', 1)->get();

        $categories = Category::query()->where('status', 1)->get();

        return view('frontend.user.store.list-auction', compact('store', 'auctions', 'categories', 'types'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $store = auth('user')->user()->store;

        $edit = (($store) ? true : false);

        return view('frontend.user.store.form', compact('store', 'edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreUpdateRequest $request)
    {
        $data = $request->except(['image', '_token']);

        if ($request->image) {
            $data['image'] = $this->uploadFile($request, 'image', 'stores');
        }

        Store::updateOrCreate([
            'user_id' => auth('user')->user()->id
        ], $data);

        return redirect()->route('frontend.user.store')->with('success', 'Saved Store info');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

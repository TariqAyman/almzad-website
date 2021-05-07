<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\UploadFile;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auction\AuctionStoreRequest;
use App\Http\Requests\AuctionUserUpdateRequest;
use App\Models\Auction;
use App\Models\AuctionsImage;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use App\Models\Comment;
use App\Models\Currency;
use App\Models\DiveSiteImage;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class AuctionController extends Controller
{
    use UploadFile;

    public function __construct()
    {
        $this->middleware('permission:view-auction');
        $this->middleware('permission:create-auction', ['only' => ['create', 'store']]);
        $this->middleware('permission:update-auction', ['only' => ['edit', 'update']]);
        $this->middleware('permission:destroy-auction', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.auction.index');
    }

    public function getDatatable()
    {
        return DataTables::of(Auction::orderBy('updated_at', 'desc')->get())
            ->addIndexColumn()
            ->addColumn('action', function ($model) {
                $edit = '<a href="' . route('admin.auction.edit', $model->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.edit') . '</a> ';
                $delete = '<button id="deleteButton" data-id="' . $model->id . '" type="button" class="btn btn-sm btn-danger">' . trans('app.delete') . '</button>';
                return $edit . ' ' . $delete;
            })
            ->addColumn('status', function ($model) {
                return $model->status ? '<span class="badge badge-pill badge-lg badge-success">مفعل</span>' : '<span class="badge badge-pill badge-lg badge-danger">معطل</span>';
            })
            ->addColumn('created_at', function ($model) {
                return $model->created_at->diffForHumans();
            })
            ->addColumn('updated_at', function ($model) {
                return $model->updated_at->diffForHumans();
            })
            ->rawColumns(['action', 'created_at', 'updated_at', 'status'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;

        $types = Type::query()->pluck('name_ar', 'id');

        $categories = Category::query()->pluck('name_ar', 'id');

        $users = User::query()->get(['id', 'first_name', 'last_name'])->pluck('name', 'id');

        return view('dashboard.auction.form', compact('edit', 'categories', 'types', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AuctionStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuctionStoreRequest $request)
    {
        $data = $request->all();

        $data['slug_ar'] = Str::slug($request->name_ar, '-', 'ar');
        $data['slug_en'] = Str::slug($request->name_en, '-', 'en');

        $auction = Auction::create($data);

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

        return redirect()->route('admin.auction.index')->withSuccess(trans('aap.successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Auction $auction)
    {
        $types = Type::query()->pluck('name_ar', 'id');

        $categories = Category::query()->pluck('name_ar', 'id');

        $users = User::query()->get(['id', 'first_name', 'last_name'])->pluck('name', 'id');

        $edit = true;
//        $auction->with('user');
        return view('dashboard.auction.form', compact('edit', 'auction', 'categories', 'types', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AuctionRequest $request
     * @param Auction $auction
     * @return \Illuminate\Http\Response
     */
    public function update(AuctionUserUpdateRequest $request, Auction $auction)
    {
        $auction->update($request->all());

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
        return redirect()->back()->withSuccess(trans('app.successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Auction::find($request->id)->delete();
        return response()->json(['message' => 'success']);
    }

    public function removeImage(int $id, int $imageId): JsonResponse
    {
        $image = AuctionsImage::query()->findOrFail($imageId);

        Storage::delete($image->image);
        $image->delete();
        return response()->json(['message' => 'success']);
    }

    public function commentChangeStatus(Request $request)
    {
        Comment::find($request->id)->update([
            'status' => $request->status
        ]);

        return redirect()->back()->withSuccess(trans('app.success'));
    }
}

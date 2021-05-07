<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\Wallet\WalletStoreRequest;
use App\Models\Category;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class WalletController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view-wallet');
        $this->middleware('permission:create-wallet', ['only' => ['create', 'store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.wallet.index');
    }

    public function getDatatable()
    {
        return DataTables::of(Wallet::orderBy('updated_at', 'desc')->get())
            ->addIndexColumn()
            ->addColumn('created_at', function ($model) {
                return $model->created_at->diffForHumans();
            })
            ->addColumn('name', function ($model) {
                return $model->user->name;
            })
            ->addColumn('phone', function ($model) {
                return $model->user->phone_number;
            })
            ->rawColumns(['created_at', 'name', 'phone'])
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

        $users = User::query()->where('status', 1)->get(['id', 'first_name', 'last_name'])->pluck('name', 'id');

        return view('dashboard.wallet.form', compact('edit', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(WalletStoreRequest $request)
    {
        $data = $request->only(['user_id','note']);

        $user = User::find($request->user_id);

        $type = $request->type;

        $data[$type] = $request->amount;

        if ($type == 'in') {
            $data['balance'] = $user->available_balance + floatval($request->amount);

        } elseif ($type == 'out') {
            $data['balance'] = $user->available_balance - floatval($request->amount);
        }

        Wallet::create($data);


        return redirect()->route('admin.wallet.index')->withSuccess(trans('app.success'));
    }
}

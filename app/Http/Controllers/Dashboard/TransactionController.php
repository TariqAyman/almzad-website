<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\Wallet\WalletStoreRequest;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view-transaction');
        $this->middleware('permission:show-transaction', ['only' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.transaction.index');
    }

    public function getDatatable()
    {
        return DataTables::of(Transaction::orderBy('updated_at', 'desc')->get())
            ->addIndexColumn()
            ->addColumn('created_at', function ($model) {
                return $model->created_at->diffForHumans();
            })
            ->addColumn('user_name', function ($model) {
                return $model->user->name;
            })
            ->addColumn('auction', function ($model) {
                return $model->auction->name ?? null;
            })
            ->addColumn('payment_id', function ($model) {
                return $model->payment->payment_id;
            })



            ->rawColumns(['created_at', 'auction', 'user_name'])
            ->make(true);
    }


    public function show($edit)
    {
        $edit = false;

        $users = User::query()->where('status', 1)->get(['id', 'first_name', 'last_name'])->pluck('name', 'id');

        return view('dashboard.wallet.form', compact('edit', 'users'));
    }
}

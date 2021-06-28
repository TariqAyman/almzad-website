<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\RefundRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RefundRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view-refund-request');
        $this->middleware('permission:create-refund-request', ['only' => ['create', 'store']]);
        $this->middleware('permission:update-refund-request', ['only' => ['edit', 'update']]);
        $this->middleware('permission:destroy-refund-request', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.refund-request.index');
    }

    public function getDatatable()
    {
        return DataTables::of(RefundRequest::orderBy('updated_at', 'desc')->whereHas('user')->get())
            ->addIndexColumn()
//            ->addColumn('action', function ($model) {
//                $edit = '<a href="' . route('admin.slider.edit', $model->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.edit') . '</a> ';
//                $delete = '<button id="deleteButton" data-id="' . $model->id . '" type="button" class="btn btn-sm btn-danger">' . trans('app.delete') . '</button>';
//                return $edit . ' ' . $delete;
//            })
            ->addColumn('user', function ($model) {
                return $model->user->name;
            })
            ->addColumn('created_at', function ($model) {
                return $model->created_at->diffForHumans();
            })
            ->addColumn('updated_at', function ($model) {
                return $model->updated_at->diffForHumans();
            })
            ->rawColumns(['action', 'created_at', 'updated_at', 'user'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

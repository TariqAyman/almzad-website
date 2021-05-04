<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\TypeRequest;
use App\Models\Type;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:type-category');
        $this->middleware('permission:type-category', ['only' => ['create', 'store']]);
        $this->middleware('permission:type-category', ['only' => ['edit', 'update']]);
        $this->middleware('permission:type-category', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.type.index');
    }

    public function getDatatable()
    {
        return DataTables::of(Type::orderBy('updated_at', 'desc')->get())
            ->addIndexColumn()
            ->addColumn('action', function ($model) {
                $edit = '<a href="' . route('admin.type.edit', $model->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.edit') . '</a> ';
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

        return view('dashboard.type.form', compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TypeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeRequest $request)
    {
        $data = $request->all();

        Type::create($data);

        return redirect()->route('admin.type.index')->withSuccess(trans('app.successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param Type $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        $edit = true;

        return view('dashboard.type.form', compact('edit', 'type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(TypeRequest $request, Type $type)
    {
        $type->update($request->all());
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
        Type::find($request->id)->delete();
        return response()->json(['message' => 'success']);
    }
}

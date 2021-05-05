<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view-slider');
        $this->middleware('permission:create-slider', ['only' => ['create', 'store']]);
        $this->middleware('permission:update-slider', ['only' => ['edit', 'update']]);
        $this->middleware('permission:destroy-slider', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.slider.index');
    }

    public function getDatatable()
    {
        return DataTables::of(Slider::orderBy('updated_at', 'desc')->get())
            ->addIndexColumn()
            ->addColumn('action', function ($model) {
                $edit = '<a href="' . route('admin.slider.edit', $model->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.edit') . '</a> ';
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

        return view('dashboard.slider.form', compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();


        Slider::create($data);

        return redirect()->route('admin.slider.index')->withSuccess('Slider created successfully!');
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
    public function edit(Slider $slider)
    {
        $edit = true;
        return view('dashboard.slider.form', compact('edit', 'slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Slider $slider)
    {
        $slider->update($request->all());
        return redirect()->back()->withSuccess('Slider updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Slider::find($request->id)->delete();
        return response()->json(['message' => 'success']);
    }
}

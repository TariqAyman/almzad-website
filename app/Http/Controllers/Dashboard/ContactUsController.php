<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Yajra\DataTables\Facades\DataTables;

class ContactUsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view-contactus');
        $this->middleware('permission:show-contactus', ['only' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.contactus.index');
    }

    public function getDatatable()
    {
        return DataTables::of(ContactUs::orderBy('updated_at', 'desc')->get())
            ->addIndexColumn()
            ->addColumn('created_at', function ($model) {
                return $model->created_at->diffForHumans();
            })
            ->addColumn('full_name', function ($model) {
                return $model->user->name;
            })
            ->rawColumns(['created_at','full_name'])
            ->make(true);
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;
use Yajra\DataTables\DataTables;

class ActivitylogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        activity('activity')->causedBy(Auth::user())->log('view');

        return view('dashboard.activity.index');
    }

    public function getDatatable()
    {
        return Datatables::of(Activity::orderBy('created_at', 'desc')->get())
            ->addIndexColumn()
            ->addColumn('properties', function ($activity) {
                return $activity->properties;
            })
            ->addColumn('created_at', function ($activity) {
                return $activity->created_at->diffForHumans();
            })
            ->rawColumns(['created_at','properties'])
            ->make(true);
    }

}

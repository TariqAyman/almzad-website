<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\UploadFile;
use App\Http\Controllers\Controller;
use App\Http\Requests\ADminStoreRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Models\Admin;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    use UploadFile;

    public function __construct()
    {
        $this->middleware('permission:view-admin');
        $this->middleware('permission:create-admin', ['only' => ['create', 'store']]);
        $this->middleware('permission:update-admin', ['only' => ['edit', 'update']]);
        $this->middleware('permission:destroy-admin', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admins.index');
    }

    public function getDatatable()
    {
        return DataTables::of(Admin::orderBy('updated_at', 'desc')->get())
            ->addIndexColumn()
            ->addColumn('action', function ($model) {
                $edit = '<a href="' . route('admin.admins.edit', $model->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.edit') . '</a> ';
                $delete = '<button id="deleteButton" data-id="' . $model->id . '" type="button" class="btn btn-sm btn-danger">' . trans('app.delete') . '</button>';
                return $edit . ' ' . $delete;
            })
            ->addColumn('profile_photo', function ($model) {
                $profile_photo = asset($model->profile_photo);
                return $model->profile_photo ? "<img alt='Image placeholder' class='avatar avatar-sm rounded-circle' data-toggle='tooltip' data-original-title='{$model->name}' src='{$profile_photo}'>" :
                    '<i class="far avatar avatar-sm rounded-circle fa-user"></i>';
            })
            ->addColumn('status', function ($model) {
                return $model->status ? '<span class="badge badge-pill badge-lg badge-success">Active</span>' : '<span class="badge badge-pill badge-lg badge-danger">Disabled</span>';
            })
            ->addColumn('email_verified_at', function ($model) {
                return $model->email_verified_at ? $model->email_verified_at->diffForHumans() : trans('app.email_verified_at_yet');
            })
            ->addColumn('created_at', function ($model) {
                return $model->created_at->diffForHumans();
            })
            ->addColumn('updated_at', function ($model) {
                return $model->updated_at->diffForHumans();
            })
            ->rawColumns(['action', 'created_at', 'updated_at', 'status', 'profile_photo'])
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

        $roles = Role::pluck('name', 'id');
        return view('dashboard.admins.form', compact('roles', 'edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ADminStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminStoreRequest $request)
    {
        $userData = $request->except(['role', 'profile_photo']);

        if ($request->profile_photo) {
            $userData['profile_photo'] = $this->uploadFile($request, 'profile_photo', 'admins');
        }

        $user = Admin::create($userData);
        $user->assignRole($request->role);

        return redirect()->route('admin.admins.index')->withsuccess('User created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param Admin $admin
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        $roles = Role::pluck('name', 'id');

        return view('dashboard.users.show', compact('admin', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Admin $admin
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        $edit = true;

        $roles = Role::pluck('name', 'id');
        return view('dashboard.admins.form', compact('admin', 'roles', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AdminUpdateRequest $request
     * @param Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUpdateRequest $request, Admin $admin)
    {
        $userData = $request->except(['role', 'profile_photo']);

        if ($request->profile_photo) {
            $userData['profile_photo'] = $this->uploadFile($request, 'profile_photo', 'admins');
        }

        $admin->update($userData);
        $admin->syncRoles($request->role);

        return redirect()->route('admin.admins.index')->withSuccess('User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $admin = Admin::find($request->id);

        if ($request->id == Auth::user()->id) {
            return response()->json(['message' => 'You can not delete logged in user!']);
        }

        $admin->delete();

        return response()->json(['message' => 'User deleted successfully!']);
    }
}

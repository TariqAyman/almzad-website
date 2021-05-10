<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\UploadFile;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUpdateRequest;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Models\Admin;
use App\Models\User;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    use UploadFile;

    public function __construct()
    {
        $this->middleware('permission:view-user');
        $this->middleware('permission:create-user', ['only' => ['create', 'store']]);
        $this->middleware('permission:update-user', ['only' => ['edit', 'update']]);
        $this->middleware('permission:destroy-user', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.user.index');
    }

    public function getDatatable()
    {
        return DataTables::of(User::orderBy('updated_at', 'desc')->get())
            ->addIndexColumn()
            ->addColumn('action', function ($model) {
                $edit = '<a href="' . route('admin.user.edit', $model->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.edit') . '</a> ';
                $delete = '<button id="deleteButton" data-id="' . $model->id . '" type="button" class="btn btn-sm btn-danger">' . trans('app.delete') . '</button>';
                return $edit . ' ' . $delete;
            })
            ->addColumn('profile_photo', function ($model) {
                $profile_photo = asset($model->profile_photo);
                return $model->profile_photo ? "<img height='100px' alt='Image placeholder' class='avatar avatar-sm rounded-circle' data-toggle='tooltip' data-original-title='{$model->name}' src='{$profile_photo}'>" :
                    '<i class="far avatar avatar-sm rounded-circle fa-user"></i>';
            })
            ->addColumn('status', function ($model) {
                return $model->status ? '<span class="badge badge-pill badge-lg badge-success">مفعل</span>' : '<span class="badge badge-pill badge-lg badge-danger">معطل</span>';
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
            ->addColumn('balance', function ($model) {
                return $model->actual_balance;
            })
            ->rawColumns(['action', 'created_at', 'updated_at', 'status', 'profile_photo','balance'])
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

        return view('dashboard.user.form', compact( 'edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $userData = $request->except(['role', 'profile_photo']);

        if ($request->profile_photo) {
            $userData['profile_photo'] = $this->uploadFile($request, 'profile_photo', 'admins');
        }

        $user = User::create($userData);

        return redirect()->route('admin.user.index')->withsuccess('User created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('dashboard.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $edit = true;

        return view('dashboard.user.form', compact('user',  'edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AdminUpdateRequest $request
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $userData = $request->except(['role', 'profile_photo']);

        if ($request->profile_photo) {
            $userData['profile_photo'] = $this->uploadFile($request, 'profile_photo', 'admins');
        }

        $user->update($userData);

        return redirect()->route('admin.user.index')->withSuccess('User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $user = User::find($request->id);

        if ($request->id == Auth::user()->id) {
            return response()->json(['message' => 'You can not delete logged in user!']);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted successfully!']);
    }
}

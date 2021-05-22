<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view-permission');
        $this->middleware('permission:create-permission', ['only' => ['create', 'store']]);
        $this->middleware('permission:update-permission', ['only' => ['edit', 'update']]);
        $this->middleware('permission:destroy-permission', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        activity('permission')->causedBy(Auth::user())->log('view');

        $roles = Role::all();
        $permissions = Permission::all();
        return view('dashboard.permissions.index', compact('roles', 'permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        activity('permission')->causedBy(Auth::user())->log('create');

        $edit = false;
        return view('dashboard.permissions.form', compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z0-9\-_\.]+$/|unique:permissions,name',
            'display_name' => "required"
        ]);

        activity('permission')->causedBy(Auth::user())->log('created');

        Permission::create($request->only(['name', 'display_name']) + ['guard_name' => 'admin']);

//        foreach (explode(',', $request->name) as $perm) {
//            $permission = Permission::create(['name' => $perm]);
//            $permission->assignRole('super-admin');
//        }

        return redirect()->route('admin.permissions.index')->withSuccess(trans('app.Permission created successfully!'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $edit = true;
        $permission = Permission::find($id);
        return view('dashboard.permissions.form', compact('edit', 'permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|regex:/^[a-zA-Z0-9\-_\.]+$/|unique:roles,name,' . $id,
            'display_name' => "required"
        ]);

        Permission::find($id)->update($request->only(['name', 'display_name']));
        return redirect()->route('admin.permissions.index')->withSuccess(trans('app.permission_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Permission::find($id)->delete();
        return redirect()->route('admin.permissions.index')->withSuccess(trans('app.permission_deleted_successfully'));
    }

    /**
     * Update permissions for each role.
     *
     * @param Request $request
     * @return mixed
     */
    public function saveRolePermissions(Request $request)
    {
        $roles = $request->get('roles');
        $allRoles = Role::pluck('id', 'id');
        foreach ($allRoles as $roleId) {
            $permissions = \Arr::get($roles, $roleId, []);
            $role = Role::find($roleId);
            $role->syncPermissions($permissions);

            $admins = Admin::role($roleId)->get();

            foreach ($admins as $admin){
                $admin->syncPermissions($permissions);
            }
        }
        Artisan::call('permission:cache-reset');

        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        Cache::flush();
        return redirect()->route('admin.permissions.index')->withSuccess(trans('app.success_update'));
    }

}

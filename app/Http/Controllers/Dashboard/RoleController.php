<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view-role');
        $this->middleware('permission:create-role', ['only' => ['create', 'store']]);
        $this->middleware('permission:update-role', ['only' => ['edit', 'update']]);
        $this->middleware('permission:destroy-role', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        activity('role')->causedBy(Auth::user())->log('view');

        $roles = Role::all();
        return view('dashboard.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        activity('role')->causedBy(Auth::user())->log('create');

        $edit = false;

        return view('dashboard.roles.form', compact('edit'));
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
            'name' => 'required|regex:/^[a-zA-Z0-9\-_\.]+$/|unique:roles,name',
            'display_name' => "required"
        ]);

        activity('role')->causedBy(Auth::user())->log('created');

        Role::create($request->only('name', 'display_name') + ['guard_name' => 'admin']);

        return redirect()->route('admin.roles.index')->withSuccess('Role created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Role $role
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Role $role)
    {

        activity('role')->causedBy(Auth::user())->log('Edit');

        $edit = true;
        $role = Role::find($role->id);

        return view('dashboard.roles.form', compact('edit', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z0-9\-_\.]+$/|unique:roles,name,' . $role->id . '|max:255',
            'display_name' => "required"
        ]);

        activity('role')->causedBy(Auth::user())->log('updated');

        $role->update(['name' => $request->name, 'display_name' => $request->display_name]);

        return redirect()->route('admin.roles.index')->withsuccess('Role updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $role = Role::find($request->get('id'));

        if ($role->id == 1 || $role->name == 'super-admin') {
            return response()->json(['message' => 'Super admin role can not be deleted!', 'type' => 'warning']);
        }

        activity('role')->causedBy(Auth::user())->log('destroy');

        $role->delete();
        Cache::flush();
        return response()->json(['message' => 'success']);
    }
}

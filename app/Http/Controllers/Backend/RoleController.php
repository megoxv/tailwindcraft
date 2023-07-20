<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:roles-create', ['only' => ['create', 'store']]);
        $this->middleware('can:roles-read',   ['only' => ['show', 'index']]);
        $this->middleware('can:roles-update',   ['only' => ['edit', 'update']]);
        $this->middleware('can:roles-delete',   ['only' => ['delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles =  Role::orderBy('id', 'DESC')->paginate();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => "required|unique:roles,name",
            'display_name' => "required|min:3",
        ]);

        $role = Role::create([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'description' => $request->description,
        ]);

        $role->syncPermissions($request->permissions);

        toast()->success(__('main.created_successfully'))->push();
        return redirect()->route('admin.roles.index');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => "required|unique:roles,name," . $role->id,
            'display_name' => "required|min:3",
        ]);

        $role->update([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'description' => $request->description,
        ]);

        $role->syncPermissions($request->permissions);

        toast()->success(__('main.updated_successfully'))->push();
        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

        toast()->success(__('main.deleted_successfully'))->push();
        return redirect()->route('admin.roles.index');
    }
}

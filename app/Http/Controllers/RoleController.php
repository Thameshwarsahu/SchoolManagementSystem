<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RoleController extends Controller
{
    // 🔹 LIST
    public function index()
    {
        $roles = Role::with('permissions')->get();
        return view('backend.role.index', compact('roles'));
    }

    // 🔹 CREATE
    public function create()
    {
        $permissions = Permission::all();
        return view('backend.role.create', compact('permissions'));
    }

    // 🔹 STORE
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'required'
        ]);

        $role = Role::create(['name' => $request->name]);

        $role->syncPermissions($request->permissions);

        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        return redirect()->route('role.index')->with('success', 'Role & Permission Created');
    }

    // 🔹 EDIT
    public function edit($id)
    {
        $role = Role::findById($id);
        $permissions = Permission::all();
        $rolePermissions = $role->permissions->pluck('name')->toArray();

        return view('backend.role.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    // 🔹 UPDATE
    public function update(Request $request, $id)
    {
        $role = Role::findById($id);

        $request->validate([
            'name' => 'required',
            'permissions' => 'required'
        ]);

        $role->update(['name' => $request->name]);

        $role->syncPermissions($request->permissions);

        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        return redirect()->route('role.index')->with('success', 'Role & Permission Updated');
    }

    // 🔹 DELETE
    public function destroy($id)
    {
        Role::findById($id)->delete();
        return back()->with('success', 'Role & Permission Deleted');
    }
}

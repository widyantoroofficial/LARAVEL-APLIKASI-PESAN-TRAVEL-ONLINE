<?php

namespace App\Http\Controllers\Backend\Admin\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $role = Role::all();
        $permission = Permission::all();
        return view('backend.admin.role.index', compact('role', 'permission'));
    }
    public function tambah(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name',
            'permissions' => 'nullable|array',
        ]);

        // Membuat role baru
        $role = Role::create([
            'name' => $request->name,
        ]);

        // Menyinkronkan permissions ke role
        $role->syncPermissions($request->permissions);

        return redirect()->route('backend.role.index')->with('success', 'Role baru berhasil ditambahkan!');
    }
    public function edit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'permissions' => 'required|array',
        ]);

        $role = Role::findOrFail($id);
        $role->update(['name' => $request->name]);

        // Menghapus semua permission lama dan menambahkan yang baru
        $role->syncPermissions($request->permissions);

        return redirect()->route('backend.role.index')->with('success', 'Role berhasil diperbarui!');
    }
    public function hapus($id)
    {
        // Cari role berdasarkan ID
        $role = Role::findOrFail($id);

        // Hapus hubungan role dengan permissions
        $role->permissions()->detach();

        // Hapus role
        $role->delete();

        // Redirect atau memberikan feedback
        return redirect()->route('backend.role.index')->with('success', 'Role dan permissions terkait berhasil dihapus');
    }
}

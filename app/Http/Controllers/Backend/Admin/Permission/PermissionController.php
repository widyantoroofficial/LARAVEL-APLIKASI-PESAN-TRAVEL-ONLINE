<?php

namespace App\Http\Controllers\Backend\Admin\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permission = Permission::all();
        return view('backend.admin.permission.index', compact('permission'));
    }
    public function tambah(Request $request)
    {
        Permission::create([
            'name' => $request->name,
            'guard_name' => $request->guard_name
        ]);
        return redirect()->back()->with('success', 'Melakukan Tambah Permission');
    }
    public function edit(Request $request, $id)
    {
        $permission = Permission::find($id);
        $permission->update([
            'name' => $request->name,
            'guard_name' => $request->guard_name
        ]);
        return redirect()->back()->with('success', 'Melakukan Edit Permission');
    }
    public function hapus($id)
    {
        // Pastikan model Permission diimpor dengan benar
        $permission = Permission::find($id);
        if (!$permission) {
            return redirect()->back()->with('error', 'Permission tidak ditemukan');
        }
        // Hapus permission
        $permission->delete();

        return redirect()->back()->with('success', 'Melakukan Hapus Permission');
    }
}

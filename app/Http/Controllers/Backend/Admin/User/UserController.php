<?php

namespace App\Http\Controllers\Backend\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $user = User::with('roles')->get();
        $roles = Role::all();
        $permissions = Permission::all();
        $user->map(function ($user) use ($permissions) {
            // Ambil permissions yang sudah dimiliki melalui role
            $rolePermissions = $user->roles->flatMap(function ($role) {
                return $role->permissions;
            })->pluck('name')->toArray();

            // Ambil permissions yang dimiliki langsung oleh user tanpa role
            $userDirectPermissions = $user->permissions->pluck('name')->toArray();

            // Filter permissions yang belum dimiliki melalui role
            $user->filteredPermissions = $permissions->filter(function ($permission) use ($rolePermissions) {
                return !in_array($permission->name, $rolePermissions);
            })->map(function ($permission) use ($userDirectPermissions) {
                // Tandai apakah permission sudah dimiliki langsung oleh user
                $permission->isOwned = in_array($permission->name, $userDirectPermissions);
                return $permission;
            });
        });
        return view('backend.admin.user.index', compact('user', 'roles'));
    }
    public function tambah()
    {
        return view('backend.admin.user.tambah');
    }
    public function simpan(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email tidak valid',
            'password.required' => 'Password wajib diisi',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->assignRole($request->role);
        return redirect()->route('backend.user.index')->with('success', 'User Berhasil Ditambahkan');
    }
    public function hapus($id)
    {
        $user = User::findOrFail($id);
        if ($user->roles()->exists()) {
            $user->syncRoles([]);
        }
        $user->delete();
        return redirect()->back()->with('success', 'Berhasil Hapus User');
    }
}

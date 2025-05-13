<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('ManageUser.index', compact('users'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('ManageUser.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|in:admin,guru_bk,wali_kelas,siswa',
            'kelas_id' => 'required_if:role,siswa,wali_kelas|exists:kelas,id',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'kelas_id' => $request->kelas_id,
        ]);
        $user->assignRole($request->role);
        return redirect()->route('muser.index')->with('success', 'User Berhasil ditambahkan');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $kelas = Kelas::all();
        return view('ManageUser.edit', compact('user', 'kelas'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role' => 'required|in:admin,guru_bk,wali_kelas,siswa',
            'kelas_id' => 'required_if:role,siswa,wali_kelas|exists:kelas,id',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->syncRoles($request->role);
        $user->kelas_id = $request->kelas_id;
        $user->save();

        return redirect()->route('muser.index')->with('success', 'User Berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete(); // Hanya set deleted_at
        return back()->with('success', 'Akun dipindahkan ke trash');
    }

    public function reactivate(User $user)
    {
        $user->update(['is_active' => true]);

        return back()->with('success', 'User berhasil diaktifkan');
    }

    // Nonaktifkan akun tanpa soft delete
    public function deactivate($id)
    {
        $user = User::findOrFail($id);
        $user->update(['is_active' => false]);
        return back()->with('success', 'Akun dinonaktifkan');
    }

    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore(); // Hapus deleted_at
        $user->update(['is_active' => true]); // Aktifkan
        return redirect()->route('muser.index')->with('success', 'Akun diaktifkan kembali');
    }
}

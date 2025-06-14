<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    // List users
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(15);
        $roles = ['Admin', 'User', 'Moderator']; // Tambah sesuai kebutuhan
        return view('admin.users.index', compact('users', 'roles'));
    }

    // Edit user form
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = ['Admin', 'User', 'Moderator']; // Sesuaikan jika ada role lain
        $membership_types = ['Free', 'Premium', 'VIP']; // Contoh, sesuaikan dengan value yang ada di DB
        $payment_statuses = ['Paid', 'Pending', 'Failed']; // Contoh
        return view('admin.users.edit', compact('user', 'roles', 'membership_types', 'payment_statuses'));
    }

    // Update user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $roles = ['Admin', 'User', 'Moderator'];
        $membership_types = ['Free', 'Premium', 'VIP'];
        $payment_statuses = ['Paid', 'Pending', 'Failed'];

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email,$id",
            'role' => 'required|in:' . implode(',', $roles),
            'membership_type' => 'nullable|in:' . implode(',', $membership_types),
            'expired_at' => 'nullable|date',
            'payment_status' => 'nullable|in:' . implode(',', $payment_statuses),
        ]);

        $user->update($validated);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil diupdate!');
    }

    // Delete user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if (auth()->id() == $user->id) {
            return back()->with('error', 'Tidak bisa menghapus akun sendiri!');
        }
        $user->delete();
        return back()->with('success', 'User berhasil dihapus!');
    }
}

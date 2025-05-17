<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash; // Jangan lupa tambahkan ini

class UserController extends Controller // Perhatikan huruf kapital di awal
{
    public function create()
    {
        $roles = Role::all();
        return view('admin.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|exists:roles,name'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Perbaikan: Password harus di-hash
        ]);

        $user->assignRole($request->role);

        return redirect()->route('siswa.create') // Sesuaikan dengan nama route
               ->with('success', 'User berhasil dibuat!');
    }
}
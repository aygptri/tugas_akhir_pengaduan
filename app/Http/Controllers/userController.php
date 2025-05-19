<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function create()
    {
        $user = User::get();
        return view('admin.create', compact('user'));
    }

public function store(Request $request)
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
        'password' => ['required', Rules\Password::defaults()],
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return redirect()->route('admin.create')->with('success', 'Siswa berhasil ditambahkan.');
}



    public function edit($id){
        $user = User::find($id);
        return view('admin.edit', compact('user'));
    }

    public function update(Request $request, $id){
        $user = User::find($id);
                $user->name = $request->name; 
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->update();
        
        return redirect()->route('admin.create');
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
                return redirect()->route('admin.create');
    }
}

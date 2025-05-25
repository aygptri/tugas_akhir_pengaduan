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
        $roles = Role::all();
        $user = User::get();
        return view('admin.create', compact('user','roles'));
    }

public function store(Request $request)
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
        'password' => ['required', Rules\Password::defaults()],
        'role' => ['required', 'exists:roles,name']
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password)
    ]);

    $user->assignRole($request->role);

    return redirect()->route('admin.create')->with('success', 'User berhasil ditambahkan.');
}

    public function edit($id){
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.edit', compact('user', 'roles'));
    }

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,'.$id,
        'password' => 'nullable|confirmed', 
        'role' => 'required|exists:roles,name'
    ]);

    $user = User::findOrFail($id);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = $request->password;
    
    if(!empty($request->password)){
        $user->password = Hash::make($request->password);
    }
    
    $user->save();
    
    $user->syncRoles([$request->role]);
    $user->syncPermissions($request->permissions);

    
    return redirect()->route('admin.rolemanagement')    ;
}


    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        
        return redirect()->route('admin.rolemanagement')->with('success', 'User berhasil dihapus.');

    }
}

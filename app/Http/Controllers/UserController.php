<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\RoleHasPermission;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
    //   $users = User::whereHas('roles', function($query){
    //             $query->where('name', 'admin');
    //           })->get();

    $users = User::all();
      return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::get(['id', 'name']);
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $user = User::create([
                  'name'      =>  $request->name,
                  'email'     =>  $request->email,
                  'password'  =>  Hash::make($request->password),
                //   'role'      =>  $request->role,
                ]);

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')->with('success', 'User created succssfully.');
    }

    public function show($id)
    {
        $user = User::find($id);

        return view('admin.users.show',compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::get(['id', 'name']);
        $userRoles = $user->roles->pluck('id')->toArray();

        return view('admin.users.edit', compact('user', 'roles', 'userRoles'));
    }

    public function update(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $user->update(['name' => $request->name]);
        $user->syncRoles($request->input('roles'));

        return redirect()->route('users.index')->with('success', 'User updated succssfully.');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');

    }
}

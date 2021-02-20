<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    //
    public function create(){
        $roles=Role::get();
        $users=User::get();
        return view('permissions.user.index',[
            'roles'=>$roles,
            'users'=>$users,
        ]);
    }

    public function store(){
        // dd('passed');
        $user= User::where('email', request('email'))->first();
        $user->assignRole(request('roles'));
        return back();
    }

    public function edit(User $user){

        return view ('permissions.user.edit',[
            'user'=>$user,
            'roles'=>Role::get(),
            'users'=>User::get(),

        ]);

    }

    public function update(User $user){
        $user->syncRoles(request('roles'));
        return redirect()->route('assign.user.create');
    }
}

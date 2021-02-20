<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Assign;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AssignController extends Controller
{
    //
    public function index(){

        return view('permissions.assign.index',[
            'roles'=>Role::get(),
            'permissions'=>Permission::get(),
        ]);
    }
    public function store(){

        request()->validate([
            'role'=>'required',
            'permissions'=>'array|required',
        ]);

        $role = Role::find(request('role'));
        $role->givePermissionTo(request('permissions'));

        return back()->with('success','permission has benn assigned to the role');


    }

    public function edit(Role $role){
        return view('permissions.assign.edit',[
            'role'=>$role,
            'roles'=>Role::get(),
            'permissions'=>Permission::get(),
        ]);
    }

    public function update(Role $role){
        request()->validate([
            'role'=>'required',
            'permissions'=>'array|required',
        ]);

        $role->syncPermissions(request('permissions'));
        return redirect()->route('assign.index')->with('success','sukses');
    }
}

<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    //
    public function index(){

        $permissions=Permission::get();
        $permission = new Permission;
        return view('permissions.permission.index', compact('permissions','permission'));
    }

    public function store(){
        request()->validate([
            'name'=>'required'

        ]);

        Permission::create([
            'name'=>request('name'),
            'guard_name'=>request('guard_name') ?? 'web',
        ]);
        return back()->with('success','succes add permission');
    }

    public function edit(Permission $permission){
        return view('permissions.permission.edit',[
            'permission'=>$permission,
            'submit'=>'update'


        ]);

    }
    public function update(Permission $permission){
        request()->validate([
            'name'=>'required'

        ]);

        $permission->update([
            'name'=>request('name'),
            'guard_name'=>request('guard_name') ?? 'web',

        ]);
        return redirect()->route('permissions.permission.index')->with('success', 'success add update permission');
    }

    public function destroy(Permission $permission){
     $permission->delete();
     return redirect()->route('permission.index');
    }
}

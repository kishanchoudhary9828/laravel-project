<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function roleadd(){
        return view('backend.Role.addrole');
    }

    public function storerole(Request $request){
       
        $data=Role::create([
            'name'=>$request->name,
        ]);
        return back()->with('success','Role successfully Add');
    }

    public function roleview(){
       
        $role=Role::all();
        $permission=Permission::all();
        return view('backend.Role.role_permission',compact('role','permission'));
    }

    public function addpermission(){
        return view('backend.Permission.addpermission');
    }

    public function permistore(Request $request){
   
        $data=Permission::create([
            'name'=>$request->name,
        ]);
        // dd('done');
    }
    public function save_permission(Request $request){
        // dd($request->all());
          $role = Role::where('name',$request->role)->first();
          // $permission=Permission::where('name',$request->permission)->first();
          // dd($role);
           $role->givePermissionTo($request->permission);
        dd('done');     
        }
        
}

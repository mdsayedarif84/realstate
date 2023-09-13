<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\GroupName;


class RoleController extends Controller
{
    Public function AllPermission(){
        $permission = Permission::all();
        return view('backend.pages.permission.all_permission',compact('permission'));
    }
    public function AddPermission(){
        $groupNames     =   GroupName::select('*')->where('status',1)->get();
        return view('backend.pages.permission.add_permission',compact('groupNames'));
    }
     public function StorePermission(Request $request){
        $request->validate([
            'name'  =>  'required',   
            'group_name'  =>  'required'    
        ]);
        $permission = Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);
        $notification       =   array(
            'message'       => 'Permission Data Add Successfully!!',
            'alert-type'    => 'success'
        );
        return redirect()->route('add_permission')->with($notification);
    }
}

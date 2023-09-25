<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PermissionExport;
use App\Imports\PermissionImport;

use App\Models\GroupName;
use DB;

class RoleController extends Controller{
    Public function AllPermission(){
        $permission = Permission::all();
        return view('backend.pages.permission.all_permission',compact('permission'));
    }
    public function GroupNames(){
        // $groupNames     =   GroupName::select('*')->where('status',1)->get();
        $groupNames   =  GroupName::where('status',1)->get();
        return $groupNames;
    }//this function use is huge for globally
    public function AddPermission(){
        $groupNames     =   $this->GroupNames();
        return view('backend.pages.permission.add_permission',compact('groupNames'));
    }
    protected function ValidData($request){
        $this->validate($request,
            [
                'name'  =>  'required|unique:permissions|regex:/^[a-zA-Z\s\w]+$/',  
                'g_name_val'  =>  'required',    
                'group_name'  =>  'required' ,   
                'status'  =>  'required' ,   
            ],
            [
            'name.required' => 'Please Input Name!',
            'name.regex' => 'Letter,Underscore,Dot & Space only Accepted!', 
            'group_name.required' => 'Fillup the group name!',
            ]
        );
    }
     public function StorePermission(Request $request){
        $this->validData($request);
        $permission              =   new Permission();
        $permission->name  =   $request->name;
        $permission->g_name_val      =   $request->g_name_val;
        $permission->group_id      =   $request->group_id;
        $permission->status      =   $request->status;
        $permission->save();
       
        $notification       =   array(
            'message'       => 'Permission Data Add Successfully!!',
            'alert-type'    => 'success'
        );
        return redirect()->route('add_permission')->with($notification);
    }
    public function EditPermission($id){
        $permission   =   Permission::findOrFail($id);
        // return $permission;
        $groupNames     =   $this->GroupNames();
        // return $groupNames;
        return view('backend.pages.permission.edit_permission',compact('permission','groupNames'));
    }
    public function UpdatePermission(Request $request){
        $pById   =   Permission::find($request->pId);
        $pById->name  =   $request->name;
        $pById->g_name_val        =   $request->g_name_val;
        $pById->group_id        =   $request->group_id;
        $pById->status        =   $request->status;
        $pById->save();
        $notification       =   array(
            'message'       => 'Permission Data Update Successfully!!',
            'alert-type'    => 'success'
        );
        return redirect()->route('all_permission')->with($notification);
    }
    Public function ImportPermission(){
        return view('backend.pages.permission.import_permission');
    }
    Public function Export(){
        return Excel::download(new PermissionExport, 'permission.xlsx');
    }
    Public function Import(Request $request){
        Excel::import(new PermissionImport, $request->file('import_file'));
        $notification       =   array(
            'message'       => 'Permission Data Import Successfully!!',
            'alert-type'    => 'success'
        );
        return redirect()->back()->with($notification);
    }
    Public function AllRoles(){
        $roles  = Role::all();
        return view('backend.pages.roles.all_roles',compact('roles'));
    }
    Public function AddRoles(){
        return view('backend.pages.roles.add_roles');
    }
    public function StoreRoles(Request $request){
        $role              =   new Role();
        $role->name  =   $request->name;
        $role->status      =   $request->status;
        $role->save();
       
        $notification       =   array(
            'message'       => 'Role Data Add Successfully!!',
            'alert-type'    => 'success'
        );
        return redirect()->route('all_roles')->with($notification);
    }
}

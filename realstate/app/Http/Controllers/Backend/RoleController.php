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
use App\Models\User;
use DB;

class RoleController extends Controller{
    Public function AllPermission(){
        $permission = Permission::all();
        return view('backend.pages.permission.all_permission',compact('permission'));
    }
    public function GroupNames(){
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
                'name'  =>  'required|unique:permissions|regex:/^[a-zA-Z\s\-_\.]+$/',
                'g_name_val'  =>  'required',    
                'group_id'  =>  'required' ,   
                'status'  =>  'required' ,   
            ],
            [
            'name.required' => 'Please Input Name!',
            'name.regex' => 'Only Letter,hypen,underscore,Space & Dots Accepted!', 
            'group_id.required' => 'Fillup the group name!',
            ]
        );
    }
     public function StorePermission(Request $request){
        $this->validData($request);
        $permission                 =   new Permission();
        $permission->name           =   $request->name;
        $permission->g_name_val     =   $request->g_name_val;
        $permission->group_id       =   $request->group_id;
        $permission->status         =   $request->status;
        $permission->save();
       
        $notification       =   array(
            'message'       => 'Permission Data Add Successfully!!',
            'alert-type'    => 'success'
        );
        return redirect()->route('add_permission')->with($notification);
    }
    public function EditPermission($id){
        $permission     =   Permission::findOrFail($id);
        $groupNames     =   $this->GroupNames();
        return view('backend.pages.permission.edit_permission',compact('permission','groupNames'));
    }
    public function UpdatePermission(Request $request){
        $this->validate($request,
            [
                'name'  =>  'required|regex:/^[a-zA-Z\s\-_\.]+$/',
                'g_name_val'  =>  'required',    
                'group_id'  =>  'required' ,   
                'status'  =>  'required' ,   
            ],
            [
            'name.required' => 'Please Input Name!',
            'name.regex' => 'Only letters, spaces,Hypen,Underscore and dots are allowed.', 
            'group_id.required' => 'Fillup the group name!',
            ]
        );
        $pById              =   Permission::find($request->pId);
        $pById->name        =   $request->name;
        $pById->g_name_val  =   $request->g_name_val;
        $pById->group_id    =   $request->group_id;
        $pById->status      =   $request->status;
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

    /// Role ///
    Public function AllRoles(){
        $roles  = Role::all();
        return view('backend.pages.roles.all_roles',compact('roles'));
    }
    Public function AddRoles(){
        return view('backend.pages.roles.add_roles');
    }
    public function StoreRoles(Request $request){
        $this->validate($request,
            [
                'name'  =>  'required|unique:users|regex:/^[a-zA-Z\s]+$/',  
                'status'  =>  'required' ,   
            ],
            [
            'name.required' => 'Please Input Name!',
            'name.regex' => 'Letter, Space only Accepted!', 
            'status.required' => 'Fillup the group name!',
            ]
        );

        $role           =   new Role();
        $role->name     =   $request->name;
        $role->status   =   $request->status;
        $role->save();
       
        $notification       =   array(
            'message'       => 'Role Data Add Successfully!!',
            'alert-type'    => 'success'
        );
        return redirect()->route('all_roles')->with($notification);
    }

    public function EditRoles($id){
        $roles   =   Role::findOrFail($id);
        return view('backend.pages.roles.edit_roles',compact('roles'));
    }
    public function UpdateRoles(Request $request){
        $this->validate($request,
            [
                'name'  =>  'required|regex:/^[a-zA-Z\s]+$/',  
                'status'  =>  'required' ,   
            ],
            [
            'name.required' => 'Please Input Name!',
            'name.regex' => 'Letter, Space only Accepted!', 
            'status.required' => 'Fillup the group name!',
            ]
        );
        $rById              =   Role::find($request->rId);
        $rById->name        =   $request->name;
        $rById->status      =   $request->status;
        $rById->save();

        $notification       =   array(
            'message'       => 'Role Data Update Successfully!!',
            'alert-type'    => 'success'
        );
        return redirect()->route('all_roles')->with($notification);
    }
    public function DeleteRoles($id){
        $type   =   Role::findOrFail($id)->delete();
        $notification       =   array(
            'message'       => 'Property Data Delete Successfully!!',
            'alert-type'    => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function AddRolesPermission(){ 
        $roles  = Role::all();
        $permission = Permission::all();
        $permission_groups  =   User::groupPermissions();
        return view('backend.pages.rolesSetup.add_roles_permission',compact('roles','permission','permission_groups'));

    }
}

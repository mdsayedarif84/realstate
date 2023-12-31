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
use Illuminate\Support\Facades\DB;

class RoleController extends Controller{
    Public function AllPermission(){
        // $permission = Permission::all();
        $permission = DB::table('permissions')
            ->select('permissions.*')
            ->orderBy('id', 'DESC')
            ->get();
        // return $permission;
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
                'group_name'  =>  'required' ,   
                'status'  =>  'required' ,   
            ],
            [
            'name.required' => 'Please Input Name!',
            'name.regex' => 'Only Letter,hypen,underscore,Space & Dots Accepted!', 
            'group_name.required' => 'Fillup the group name!',
            ]
        );
    }
     public function StorePermission(Request $request){
        $this->validData($request);
        $permission                 =   new Permission();
        $permission->name           =   $request->name;
        $permission->g_name_val     =   $request->g_name_val;
        $permission->group_name       =   $request->group_name;
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
                'group_name'  =>  'required' ,   
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
        $pById->group_name    =   $request->group_name;
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
        $permission_groups  =   User::groupPermissions();
        return view('backend.pages.rolesSetup.add_roles_permission',compact('roles','permission_groups'));
    }
    public function StoreRolesPermission(Request $request){
        $data = [];
        $permissions =  $request->permission;
        foreach($permissions as $key => $item){
            $data['role_id']= $request->role_id;
            $data['permission_id']= $item;
            DB::table('role_has_permissions')->insert($data);
        } 
        $notification       =   array(
            'message'       => 'Role Permission data Successfully!!',
            'alert-type'    => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function AllRolesPermission(){
        $roles  = Role::all();
        return view('backend.pages.rolesSetup.all_roles_permission',compact('roles'));
    }
    public function AdminRolesEdit($id){
        $role   =   Role::findOrFail($id);
        // return $role;
        $permission_groups  =   User::groupPermissions();
        return view('backend.pages.rolesSetup.edit_roles_permission',compact('role','permission_groups')); 
    }
    public function AdminRolesUpdate(Request $request){
        $rById              =   Role::findOrFail($request->rId);
        $permission        =   $request->permission;
        if(!empty($permission)){
            $rById->syncPermissions($permission);
        }
        $notification       =   array(
            'message'       => 'Add Permission Role Data Update Successfully!!',
            'alert-type'    => 'success'
        );
        return redirect()->route('all_roles_permission')->with($notification);
    }
    public function AdminRoleDelete($id){
        $role=   Role::findOrFail($id);
        if(!is_null($role)){
            $role->delete();
        }
        $notification       =   array(
            'message'       => 'Admin  Data Delete Successfully!!',
            'alert-type'    => 'success'
        );
        return redirect()->back()->with($notification);
    }
}

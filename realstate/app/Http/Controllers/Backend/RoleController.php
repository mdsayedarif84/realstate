<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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
                'group_name'  =>  'required'    
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
        $permission->group_name      =   $request->group_name;
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
        $pById->group_name        =   $request->group_name;
        $pById->save();
        $notification       =   array(
            'message'       => 'Permission Data Update Successfully!!',
            'alert-type'    => 'success'
        );
        return redirect()->route('all_permission')->with($notification);
    }
}

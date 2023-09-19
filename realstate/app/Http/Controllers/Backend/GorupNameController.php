<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GroupName;


class GorupNameController extends Controller
{
    public function AllGroupName(){
        $groupNames   =   GroupName::latest()->get();
        return view('backend.groupName.all_group_name',compact('groupNames'));
    }
    public function AddGroupName(){
        return view('backend.groupName.add_group_name');
    }
    public function StoreGroupName(Request $request){
        $request->validate([
            'g_name'  =>  'required|unique:group_names|max:200',   
            'g_name_value'  =>  'required',    
            'status'  =>  'required',    
        ]);
        GroupName::insert([
            'g_name'  =>  $request->g_name,   
            'g_name_value'  =>  $request->g_name_value,   
            'status'  =>  $request->status  
        ]);
        $notification       =   array(
            'message'       => 'Group Data Add Successfully!!',
            'alert-type'    => 'success'
        );
        return redirect()->route('add_group_name')->with($notification);
    }
    public function EditGroupName($id){
        $groupName   =   GroupName::findOrFail($id);
        return view('backend.groupName.edit_group_name',compact('groupName'));
    }
     public function UpdateGroupName(Request $request){
        $gId    =   $request->gId;
        GroupName::findOrFail($gId)->update([
            'g_name'  =>  $request->g_name,   
            'g_name_value'  =>  $request->g_name_value,   
            'status'  =>  $request->status  
        ]);
        $notification       =   array(
            'message'       => 'Group Data Update Successfully!!',
            'alert-type'    => 'success'
        );
        return redirect()->route('all_group_name')->with($notification);
    }
     public function DeleteGroupName($id){
        GroupName::findOrFail($id)->delete();
        $notification       =   array(
            'message'       => 'Property Data Delete Successfully!!',
            'alert-type'    => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function InactiveGroupName($id){
        $groupName       =   GroupName::find($id);
        $groupName->status   =   0;
        $groupName->save();
        $notification       =   array(
            'message'       => 'Group Data Inactive Successfully!!',
            'alert-type'    => 'success'
        );
        return redirect()->route('all_group_name')->with($notification);
    }
    public function ActiveGroupName($id){
        $groupName       =   GroupName::find($id);
        $groupName->status   =   1;
        $groupName->save();
        $notification       =   array(
            'message'       => 'Group Data Active Successfully!!',
            'alert-type'    => 'success'
        );
        return redirect()->route('all_group_name')->with($notification);
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use App\Models\PropertyType;
class PropertyTypeController extends Controller
{
    public function AllType(){
       $types   =   PropertyType::latest()->get();
       return view('backend.type.all_type',compact('types'));
    }
    public function AddType(){
        return view('backend.type.add_type');
     }
     public function StoreType(Request $request){
        $request->validate([
            'type_name'  =>  'required|unique:property_types|max:200',   
            'type_icon'  =>  'required'    
         ]);
        PropertyType::insert([
            'type_name'  =>  $request->type_name,   
            'type_icon'  =>  $request->type_icon  
        ]);
        $notification       =   array(
            'message'       => 'Property Data Add Successfully!!',
            'alert-type'    => 'success'
        );
        return redirect()->route('all_type')->with($notification);
    }
    public function EditType($id){
        $type   =   PropertyType::findOrFail($id)->first();
        return view('backend.type.edit_type',compact('type'));
    }
    public function UpdateType(Request $request){
        $pId    =   $request->pId;
        PropertyType::findOrFail($pId)->update([
            'type_name'  =>  $request->type_name,   
            'type_icon'  =>  $request->type_icon  
        ]);
        $notification       =   array(
            'message'       => 'Property Data Add Successfully!!',
            'alert-type'    => 'success'
        );
        return redirect()->route('all_type')->with($notification);
    }
    public function DeleteType($id){
        $type   =   PropertyType::findOrFail($id)->delete();
        $notification       =   array(
            'message'       => 'Property Data Delete Successfully!!',
            'alert-type'    => 'success'
        );
        return redirect()->back()->with($notification);
    }
}

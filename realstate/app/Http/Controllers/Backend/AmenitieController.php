<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Amenities;
class AmenitieController extends Controller
{
    public function AllAmenitie(){
        $amenities   =   Amenities::latest()->get();
        return view('backend.amenitie.all_amenitie',compact('amenities'));
     }
     public function AddAmenitie(){
         return view('backend.amenitie.add_amenitie');
      }
      public function StoreAmenitie(Request $request){
         $request->validate([
                'amenities_name'  =>  'required|unique:amenities|max:200',   
                'status'  =>  'required'    
            ],
            [
                'amenities_name.unique' => 'The Name Have Already Taken!',
                'status.required' => 'Please select status!',
            ]
        );
        $amenity   =   new Amenities();
        $amenity->amenities_name   = $request->amenities_name;
        $amenity->status   = $request->status;
        $amenity->save() ;
         $notification       =   array(
             'message'       => 'Amenity Data Add Successfully!!',
             'alert-type'    => 'success'
         );
         return redirect()->route('all_amenitie')->with($notification);
     }
     public function EditAmenitie($id){
         $ameniti   =   Amenities::findOrFail($id);
         return view('backend.amenitie.edit_amenitie',compact('ameniti'));
     }
     public function UpdateAmenitie(Request $request){
         $ameId    =   $request->ameId;
         Amenities::findOrFail($ameId)->update([
             'amenities_name'  =>  $request->amenities_name,   
             'status'  =>  $request->status  
         ]);
         $notification       =   array(
             'message'       => 'Ameniti Data Update Successfully!!',
             'alert-type'    => 'success'
         );
         return redirect()->route('all_amenitie')->with($notification);
     }
     public function DeleteAmenitie($id){
        Amenities::findOrFail($id)->delete();
        $notification       =   array(
            'message'       => 'Ameniti Data Delete Successfully!!',
            'alert-type'    => 'success'
        );
        return redirect()->back()->with($notification);
     }
}

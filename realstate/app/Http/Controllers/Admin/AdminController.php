<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    public function adminDashboard(){
        // return view('admin.admin_dashboard');
        return view('admin.body.index');
    }
    public function adminLogin(){
        return view('admin.login.admin_login');
    }
    public function adminLogout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }
    public function adminProfile(){
        $userId         =   Auth::user()->id;
        $profileData    =   User::find($userId);
        return view('admin.profile.profile',compact('profileData'));
    }
    public function profileDataImage($request){
        $file           =   $request->file('photo');
        $filetype       =   $file->getClientOriginalExtension();
        $imageName      =   $request->name.'.'.$filetype;
        $filename       =   date('YmdHi').'.'.$imageName;
        $directory      =   'upload/admin_images/';
        $imageUrl       =   $file->move($directory,$filename);
        return $imageUrl;
    }
    public function profileUpdateData($data,$request,$imageUrl = null){
        $data->username =   $request->username;
        $data->name     =   $request->name;
        $data->email    =   $request->email;
        $data->phone    =   $request->phone;
        if($imageUrl){
            $data->photo=   $imageUrl;
        }
        $data->address  =   $request->address;
        $data->save();
    }
    public function profileFinalUpdateInfo(Request $request){
        $imageFile      =   $request->file('photo');
        $userId         =   Auth::user()->id;
        $data           =   User::find($userId);
        if ($imageFile) {
            unlink($data->photo);
            $imageUrl = $this->profileDataImage($request);
            $this->profileUpdateData($data,$request, $imageUrl);
        } else {
            $this->profileUpdateData($data,$request);
        }
        $notification            =   array(
            'message'       => 'Admin data update successfully',
            'alert-type'    => 'success'
        );
        return redirect()->back()->with($notification);
    }
    // public function adminProfileStore(Request $request){
    //     $userId         =   Auth::user()->id;
    //     $data           =   User::find($userId);
    //     $data->username =   $request->username;
    //     $data->name     =   $request->name;
    //     $data->email    =   $request->email;
    //     $data->phone    =   $request->phone;
    //     $data->address  =   $request->address;
    //     $dataImage = $request->file('photo');
    //     if($dataImage){
    //         @unlink(public_path('upload/admin_images'.$data->photo));
    //         $filetype = $file->getClientOriginalExtension();
    //         $imageName = $request->name.'.'.$filetype;
    //         $filename   =   date('YmdHi').'.'.$imageName;
    //         $file->move(public_path('upload/admin_images'),$filename);
    //         $data['photo']= $filename;    
    //     }
    //     // return $data;
    //     $data->save();
    //     return redirect()->back();
    // }
}

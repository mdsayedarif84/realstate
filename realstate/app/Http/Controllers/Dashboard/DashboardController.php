<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class DashboardController extends Controller
{
    public function adminDashboard(){
        $allUsers  = User::all();
        return view('admin.body.index',compact('allUsers'));
    }
}

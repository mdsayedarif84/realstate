<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class DashboardController extends Controller
{
    public function adminDashboard(){
        $allUsers  = User::select('*')
            ->orderBy('id', 'DESC')
            ->get();
        return view('admin.body.index',compact('allUsers'));
    }
}

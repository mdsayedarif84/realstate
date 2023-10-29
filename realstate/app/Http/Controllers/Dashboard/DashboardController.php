<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DB;


class DashboardController extends Controller
{
    public function tableData(){
        $totals = [
            'users'     => DB::table('users')->count(),
            // 'customers' => DB::table('customers')->count(),
            // 'categories' => DB::table('categories')->count()
        ];
        return $totals;
    }
    public function adminDashboard(){
        $dataCount = $this->tableData();
        $allUsers  = User::select('*')
            ->orderBy('id', 'DESC')
            ->get();
        return view('admin.body.index',compact('allUsers','dataCount'));
    }
}

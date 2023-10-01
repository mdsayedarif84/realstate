<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class GroupName extends Model
{
    use HasFactory;
    protected $guarded = [];
    public static function GetGroupNames(){
        $GetGroupNames    = DB::table('permissions')
            ->select('*')
            ->get();
    return $GetGroupNames;
        // $groupNames   =  GroupName::where('status',1)->get();
        // return $groupNames;
    }

}

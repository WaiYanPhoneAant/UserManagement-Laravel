<?php

namespace App\Helpers;

use App\Models\role_permissions;
use Hamcrest\Type\IsBoolean;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\BinaryOp\BooleanOr;
use PhpParser\Node\Expr\Cast\Bool_;
use SebastianBergmann\Type\ObjectType;

class permissionHelpers{
    // get user permission
    public static function permissions()
    {
        $permissions=role_permissions::select('permissions.name as permissions','features.name as feature')
        ->where('role_id',Auth::user()->role_id)
        ->leftJoin('permissions','permissions.id','role_permissions.permissions_id')
        ->leftJoin('features','features.id','permissions.feature_id')
        ->get();
        return $permissions;

    }
    public static function checkPermission(String $feature,String $permission): bool
    {

        $AuthUserpermissions= self::permissions();
         if(Auth::user()->role_id==1){
            return true;
         }
        foreach($AuthUserpermissions as $p){

            if($p->permissions==$permission && $p->feature==$feature ){
              return true;
            }
        }
        return false;
    }
}



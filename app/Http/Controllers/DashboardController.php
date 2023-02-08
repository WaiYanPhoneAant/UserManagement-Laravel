<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\roles;
use Illuminate\Http\Request;
use App\Helpers\permissionHelpers;
use App\Models\customers;
use App\Models\role_permissions;
use PhpParser\Node\Stmt\Foreach_;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function dashboardView()
    {
        $rolecount=roles::count();
        $usercount=User::count();
        $customercount=customers::count();
        return view('App.dashboard',compact('rolecount','usercount','customercount'));
    }

}

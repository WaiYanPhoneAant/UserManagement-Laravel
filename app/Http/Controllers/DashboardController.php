<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\roles;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function dashboardView()
    {
        # code...
        $rolecount=roles::count();
        $usercount=User::count();
        return view('Users.dashboard',compact('rolecount','usercount'));
    }
}

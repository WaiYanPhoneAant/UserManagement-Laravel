<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ActiveCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $user=User::where('username',$request->username)->first();
        if($user){
            $pwVerify=Hash::check($request->password,$user->password);
            if($pwVerify){
                if(!$user->is_active){
                    return back()->with('error','Your account is inactive');
                }
            }
        }
        // dd($user);
        return $next($request);
    }
}

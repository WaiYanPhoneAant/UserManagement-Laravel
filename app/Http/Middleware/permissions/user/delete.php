<?php

namespace App\Http\Middleware\permissions\user;

use Closure;
use Illuminate\Http\Request;
use App\Helpers\permissionHelpers;

class delete
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
        if(permissionHelpers::checkPermission('user','delete')){
            return $next($request);
        }else{
            return abort(403);
        };
    }
}

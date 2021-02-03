<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Redirect;
use App\User;
use App\Role;
class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $role  = Role::find(Auth::user()->role);

        if ($role->role=='admin') {
          return $next($request);          
        }  else if ($role->role=='user') {
          return Redirect::to('user');
        }  else{
          return Redirect::to('');
        }
    }
}

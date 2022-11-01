<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeyActorMiddleware
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
        if(Auth::check()){
            if(Auth::user()->role == '3'){ //1 = Super Admin, 2 = admin, 3 = key actors, 0 = normal user
                return $next($request);
            }
            else{
                return redirect('/home')->with('status', 'Access Denied! You are not a Key Actor.');
            }
        }
        else{
            return redirect('/login')->with('status', 'Please Login first.');
        }
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$userType): Response
    {
        if(auth()->check()){
            if(auth()->user()->isAdmin == $userType){
                return $next($request);
            }else {
                abort(403);
            }
        }
        // if(auth()->check()){
        //     if(auth()->user()->isAdmin == 1 || auth()->user()->isAdmin == 2 ){
        //         return $next($request);
        //     }elseif(auth()->user()->isAdmin == $userType){
        //         return $next($request);

        //     }
        //     else {
        //         abort(403);
        //     }
        // }
           
    }
}

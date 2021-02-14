<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnershipMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$type='')
    {

        if (Auth::user()->type == $type){
            return $next($request);
        }

        return redirect()->route('dashboard')->with([
            'message'=>'Access restricted!',
            'error'=>true
        ]);


    }
}

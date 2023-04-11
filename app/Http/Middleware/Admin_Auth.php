<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Admin_Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(!empty(Auth::user())){
            if(url()->current()==route('login#page')|| url()->current()==route('register#page')){
                return back();
            }

            if(Auth::user()->role=='user'){
                return back();
            }
            return $next($request);
        }

        return $next($request);
    }
}
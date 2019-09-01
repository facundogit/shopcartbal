<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent; 

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)        
    {
       $agent = new Agent();

        if ($agent->isDesktop()) {   
            if (Auth::guard($guard)->check()) {
            return redirect('/');
        }        
            
        }

         if ($agent->isMobile()) {
            if (Auth::guard($guard)->check()) {
            return redirect('home');        }                  
            
        }


        

        return $next($request);
    }
}

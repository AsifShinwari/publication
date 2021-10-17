<?php

namespace App\Http\Middleware;

use Closure;
use DB;
class Localization
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
        if(session('language')==null){
            session(['language'=>'not-selected']);
        }
        
        \App::setlocale(session('language'));
        
        return $next($request);
    }
}

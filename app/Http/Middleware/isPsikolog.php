<?php

namespace App\Http\Middleware;

use Closure;

class isPsikolog
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
        if(auth()->user() && auth()->user()->roles == 2) {
            return $next($request);
        }
        
        return redirect('/no-access-forbidden');
    }
}

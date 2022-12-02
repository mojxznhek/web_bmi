<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ChildMiddleware
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
      
        if(auth()->child()->isActive == 1) { 
            return $next($request);
        }
         return redirect('parent-home')->with('error','You have not admin access');
        //  if (! $request->expectsJson()) {
        //     return route('');
        // }
    }
}

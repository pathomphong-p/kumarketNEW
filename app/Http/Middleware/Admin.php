<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
    if(auth()->user() == null)
    {
    //return $next($request);
    return redirect('home')->with('error','You have not admin access');
    }
    elseif (auth()->user()->isAdmin == 1) {
      return $next($request);
    }
    elseif (auth()->user()->isAdmin == null) {
      return redirect('home')->with('error','You have not admin access');
    }
    //return redirect('home')->with('error','You have not admin access');
    }


}

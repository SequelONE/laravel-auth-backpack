<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if (! \Auth::user()->hasRole('administrator') || ! \Auth::user()->hasRole('developer') || ! \Auth::user()->hasRole('manager') )
            return response(trans('backpack::base.unauthorized'),401);
        return $next($request);
    }
}

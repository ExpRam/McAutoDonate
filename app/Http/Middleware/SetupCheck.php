<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetupCheck
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->path() == 'setup' || $request->path() == 'setup_process') {
            if (env('SETUP_DONE')) return to_route('index');
            return $next($request);
        } elseif (!env('SETUP_DONE')) {
            return to_route('setup');
        }
        return $next($request);
    }
}

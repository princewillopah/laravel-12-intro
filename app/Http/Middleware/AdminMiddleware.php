<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() || Auth::user()->user_type !== 'admin') {
            return back()->with('error', 'Access Denied');
        }
        return $next($request);
        ////OR
        // if (Auth::check() && Auth::user()->isAdmin()) {
        //     return $next($request);
        // }
    
        // return redirect()->route('coders.index')->with('error', 'Access Denied');
    }
}

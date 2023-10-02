<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->user_type == 'admin') {
            // dd(auth()->user());
            return $next($request);
        } else if (auth()->user()->user_type == 'teacher') {
            return redirect()->route("teacher.home");
        } else if (auth()->user()->user_type == 'parent') {
            // same as teacher write here
        } else if (auth()->user()->user_type == 'student') {
            // same as teacher write here
        } else {
            return redirect()->route("home");
        }
    }
}

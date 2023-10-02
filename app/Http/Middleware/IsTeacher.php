<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsTeacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->user_type == 'teacher' || auth()->user()->user_type == 'admin' ) {
            return $next($request);
        } else if (auth()->user()->user_type == 'parent' || auth()->user()->user_type == 'admin') {
            // same as teacher write here
            return $next($request);

        } else if (auth()->user()->user_type == 'student'|| auth()->user()->user_type == 'admin') {
            // same as teacher write here
            return $next($request);

        } else {
            return redirect()->route("home");
        }
    }
}

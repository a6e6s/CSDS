<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated AND has type 'admin'
        if (Auth::check() && Auth::user()->type === 'admin') {
            return $next($request);
        }

        // Redirect non-admins with error message
        return redirect('login')->with('error', 'Unauthorized access!');
    }
}

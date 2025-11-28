<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
     public function handle(Request $request, Closure $next): Response
    {
        // Check if user session exists
        if ($request->session()->has('user_id')) {
            // If not logged in, redirect to login page
            return redirect('admin/dashboard');
        }

        // If session exists, continue to next middleware or controller
        return $next($request);
    }
}

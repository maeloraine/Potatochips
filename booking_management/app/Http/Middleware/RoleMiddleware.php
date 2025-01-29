<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Check if the user is authenticated and has the required role
        if (!Auth::check() || Auth::user()->role !== $role) {
            // If not, abort with a 403 Forbidden error
            abort(403, 'Unauthorized action.');
        }
    
        // If the user is authenticated and has the required role, proceed to the next middleware or controller
        return $next($request);
    }
}

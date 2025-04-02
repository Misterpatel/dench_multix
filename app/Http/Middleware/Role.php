<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    // public function handle(Request $request, Closure $next, $role)
    // {
    //     if ($request->user() && $request->user()->role_id == $role) {
    //         return $next($request);
    //     }

    //     return response()->json(['error' => 'Unauthorized.'], 403);
    // }
    public function handle(Request $request, Closure $next, $role = null)
    {
        $user = $request->user();

        // Check if the user is authenticated and has a non-null role_id
        if ($user && $user->role_id !== null) {
            // If a role is provided, check if the user's role matches
            if ($role === null || $user->role_id == $role) {
                return $next($request);
            }
        }

        return response()->json(['error' => 'Unauthorized.'], 403);
    }
}

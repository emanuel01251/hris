<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!$request->user()) {
            abort(403);
        }

        foreach ($roles as $role) {
            // Check if the user has the required role directly
            if ($request->user()->role === $role) {
                return $next($request);
            }
            
            // Also try the method approach as fallback
            $methodName = 'is' . ucfirst($role);
            if (method_exists($request->user(), $methodName) && $request->user()->$methodName()) {
                return $next($request);
            }
        }

        abort(403);
    }
}
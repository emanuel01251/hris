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
            if ($request->user()->{"is".ucfirst($role)}()) {
                return $next($request);
            }
        }

        abort(403);
    }
}
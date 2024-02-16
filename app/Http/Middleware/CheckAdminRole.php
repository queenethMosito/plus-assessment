<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CheckAdminRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();
       
        if ($user && !$user->isAdmin()) {
            return new Response('Unauthorized.', 403);
        }

        return $next($request);
    }
}
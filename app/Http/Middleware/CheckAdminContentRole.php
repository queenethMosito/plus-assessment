<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CheckAdminContentRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if ($user && !$user->isAdmin() && !$user->isContentManager()) {
            return redirect('/pages');
        }

        return $next($request);
    }
}
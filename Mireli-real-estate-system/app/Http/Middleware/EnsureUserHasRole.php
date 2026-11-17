<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Interface I1. Limits a route to one or more roles.
 *
 *   Route::middleware(['auth', 'role:client'])->group(...);
 *   Route::middleware(['auth', 'role:management,admin'])->group(...);
 *
 * Not logged in  -> sent to the login page.
 * Wrong role     -> sent to their own dashboard with a message.
 */
class EnsureUserHasRole
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $user = $request->user();

        if (! $user) {
            return redirect()->route('login');
        }

        if (! in_array($user->role, $roles, true)) {
            return redirect()
                ->route($user->dashboardRoute())
                ->with('error', 'You do not have access to that page.');
        }

        return $next($request);
    }
}

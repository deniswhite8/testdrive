<?php

namespace App\Http\Middleware;

use Closure;
use Zizaco\Entrust\Middleware\EntrustRole;

/**
 * Role middleware
 *
 * @package App\Http\Middleware
 */
class Role extends EntrustRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Closure $next
     * @param  $roles
     * @param  $redirect
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $roles, $redirect = null)
    {
        if (!$this->auth->guest() && $request->user()->hasRole(explode('|', $roles))) {
            return $next($request);
        }

        if ($redirect) {
            return redirect($redirect);
        } else {
            abort(403);
        }
    }
}

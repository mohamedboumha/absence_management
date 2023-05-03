<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if ($role == 'admin' && auth()->user()->role != 'admin' ) {
            abort(404);
        }
        if ($role == 'director' && auth()->user()->role != 'director' ) {
            abort(404);
        }
        return $next($request);
    }
}

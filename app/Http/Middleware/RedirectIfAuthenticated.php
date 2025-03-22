<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // Verificar si el usuario está autenticado
        if (Auth::check()) {
            return redirect()->route('home')->with('info', 'Ya estás autenticado.');
        }

        return $next($request);
    }
}
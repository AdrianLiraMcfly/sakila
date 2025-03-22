<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para acceder a esta página.');
        }

        // Verificar si el usuario ha completado la verificación de 2FA
        $user = Auth::user();
        if ($user->two_factor_code) {
            return redirect()->route('2fa.verify')->with('message', 'Introduce tu código de verificación.');
        }

        return $next($request);
    }
}
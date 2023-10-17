<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }
    public function handle($request, Closure $next, ...$guards)
{
    if (auth()->check()) {
        // Utilisateur authentifié, pas besoin de rediriger
        return $next($request);
       
    }

    // Effectuer la redirection ici
    return redirect('/login');
}


}

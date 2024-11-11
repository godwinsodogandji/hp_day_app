<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VerifyCsrfToken
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    // app/Http/Middleware/VerifyCsrfToken.php

protected $except = [
    'register',  // Ajoutez cette ligne pour exclure la route "register",
    '/users/friends'
];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        dd("jkhj");
        // Vérifier si la méthode HTTP est sécurisée ou si l'URI est exclue de la vérification CSRF
        if ($this->isSafeMethod($request) || in_array($request->route()->uri(), $this->except)) {
            return $next($request);
        }
        

        // Vérification CSRF manuelle si la méthode n'est pas sécurisée
        if ($this->tokensMatch($request)) {
            return $next($request);
        }

        // Si les tokens ne correspondent pas, vous pouvez lancer une exception ou une erreur personnalisée
        abort(419, 'Page Expired');
    }

    /**
     * Vérifie si la méthode HTTP est considérée comme "sécurisée" (GET, HEAD, etc.)
     *
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    protected function isSafeMethod(Request $request)
    {
        return in_array($request->method(), ['GET', 'HEAD', 'OPTIONS']);
    }

    /**
     * Vérifie si le token CSRF correspond à celui dans la session.
     *
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    protected function tokensMatch(Request $request)
    {
        return $request->session()->token() === $request->input('_token');
    }
}

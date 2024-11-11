<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class EncryptCookies
{
    /**
     * Les cookies qui doivent être chiffrés.
     *
     * @var array
     */
    protected $cookies = [];

    /**
     * Appliquer le chiffrement des cookies.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Chiffrement des cookies spécifiés
        foreach ($this->cookies as $cookie) {
            if ($request->hasCookie($cookie)) {
                $value = Cookie::get($cookie);
                Cookie::queue($cookie, encrypt($value), 0);
            }
        }

        return $next($request);
    }
}

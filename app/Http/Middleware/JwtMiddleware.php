<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use JWTAuth;
use Exception;
use Illuminate\Support\Facades\Http;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            if ($token = $request->cookie('token'))
                $request->headers->set('Authorization', 'Bearer ' . $token);
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            // Redirect to login if doesn't have any token or expired
            return redirect()->route('login');
        }

        return $next($request);
    }
}
